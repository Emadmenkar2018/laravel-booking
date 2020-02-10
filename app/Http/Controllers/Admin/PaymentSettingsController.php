<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PaymentSetting as PaymentSetting;
use App\Currency;
use Validator;

class PaymentSettingsController extends Controller {

    /**
     * PaymentSetting Model
     * @var PaymentSetting
     */
    protected $paymentsetting;
    protected $currencyList;

    /**
     * Inject the models.
     * @param PaymentSetting $paymentsetting
     */
    public function __construct(PaymentSetting $paymentsetting) {
        $this->paymentsetting = $paymentsetting;
        $this->currencyList = Currency::active()->get()->toArray();
    }

    /**
     * Display a listing of paymentsettings
     *
     * @return Response
     */
    public function index() {

        // Grab all the paymentsettings
        $paymentsettings = PaymentSetting::first();
            
        if($paymentsettings){
            return redirect()->route('paymentsettings.edit',$paymentsettings->id);
        }else{
            return redirect()->route('paymentsettings.create');
        }
    }

    /**
     * Show the form for creating a new paymentsetting
     *
     * @return Response
     */
    public function create() {
        $paymentsettings = PaymentSetting::first();
        
        $currencyList = $this->currencyList;
        
        if($paymentsettings){
            return redirect()->route('paymentsettings.edit',$paymentsettings->id);
        }else{
            return view('admin.paymentsettings', compact('currencyList'));
        }
        
    }

    /**
     * Store a newly created paymentsetting in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $rules = array(
            'currency_id' => 'required',
            'price' => 'required|numeric',
        );
        $data = $request->all();
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $paymentsetting = PaymentSetting::create($data);
        $lastInsertId = $paymentsetting->id;
        
        return redirect()->route('paymentsettings.edit',$lastInsertId)->with('success_message', trans('admin/paymentSettings.payment_settings_add_message'));
    }

    /**
     * Show the form for editing the specified paymentsetting.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $paymentsetting = PaymentSetting::find($id);
        $currencyList = $this->currencyList;
        if ($paymentsetting) {
            return view('admin/paymentsettings', compact('paymentsetting','currencyList'));
        } else {
            return redirect(ADMIN_SLUG.'/paymentsettings')->with('error_message', trans('admin/paymentSettings.payment_settings_invalid_message'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $rules = array(
            'currency_id' => 'required',
            'price' => 'required|numeric',
        );
        $paymentsetting = PaymentSetting::findOrFail($id);
        $data = $request->all();
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $paymentsetting->update($data);
        
        return redirect()->back()->with('success_message', trans('admin/paymentSettings.payment_settings_update_message'));
    }
}
