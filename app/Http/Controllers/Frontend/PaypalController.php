<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaction;
use Paypal;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\PaymentMail;

class PaypalController extends Controller {

    protected $auth;
    private $_apiContext;

    public function __construct() {
        $this->auth = auth()->guard('user');
        $this->_apiContext = PayPal::ApiContext(
                        config('services.paypal.client_id'), config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => config('services.paypal.mode'),
            'service.EndPoint' => config('services.paypal.endpoint'),
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));
    }
    
    public function index() {
        return view('frontend.credit');
    }

    public function getPaypal() {
        return view('frontend.paypal');
    }

    public function postPaypal(Request $request) {
        
        $rules = array(
            'no_of_credit' => 'required|numeric|min:1',
        );
        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $totalCredit = $request->get('no_of_credit');
        $amount = config('settings.payment.price');
        $totalAmount = $totalCredit * $amount;
        $currency = config('settings.payment.currency');
        
        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $amount = PayPal:: Amount();
        $amount->setCurrency($currency);
        $amount->setTotal($totalAmount);

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($totalCredit);

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl(route('credit.success'));
        $redirectUrls->setCancelUrl(route('credit.cancel'));

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;

        return redirect()->to($redirectUrl);
    }

    public function getSuccess(Request $request) {
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = PayPal::getById($id, $this->_apiContext);

        $paymentExecution = PayPal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);
        
//        echo "<pre>";
//        print_r($executePayment);
//        exit;
        
        $purchaseCredit = $executePayment->transactions[0]->description;
        $amount = $executePayment->transactions[0]->amount->total;
        $currency = $executePayment->transactions[0]->amount->currency;
        $paymentStatus = 'success';
        
        $transData = array();
        //store transaction details
        $transData['user_id'] = $this->auth->user()->id;
        $transData['trans_id'] = $id;
        $transData['payment_method'] = 'paypal';
        $transData['credit'] = $purchaseCredit;
        $transData['amount'] = $amount;
        $transData['currency'] = $currency;
        $transData['status'] = $paymentStatus;
        $transaction = Transaction::create($transData);
        //end code
        
        //update user credit
        $user_id = $this->auth->user()->id;
        $credit = $this->auth->user()->credit;
        $newCredit = $credit + $purchaseCredit;
        User::where('id', $user_id)->update(array('credit' => $newCredit));
        //end code
        
        //send payment mail to user and bcc to admin
        Mail::to($this->auth->user()->email)
                ->bcc(config('settings.admin.email'))
                ->send(new PaymentMail($transaction));
        
        return redirect()->route('credit.paypal')->with('success_message',trans('user/credit.paypal_success_message').$id);
    }

    public function getCancel() {
        return redirect()->route('credit.paypal')->with('error_message',trans('user/credit.paypal_error_message'));
    }
}
