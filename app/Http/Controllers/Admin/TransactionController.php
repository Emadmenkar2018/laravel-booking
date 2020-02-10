<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Datatable\SSP;
use App\Helpers\Common;

use App\User;
use App\Transaction;

use Validator;
use DB;
class TransactionController extends Controller {

    /**
     * Transaction Model
     * @var Transaction
     */
    protected $transaction;
    protected $pageLimit;

    /**
     * Inject the models.
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction) {
        $this->transaction = $transaction;
        $this->pageLimit = config('settings.pageLimit');
        $this->userList = ['' => trans('admin/transaction.select_user')] + User::select(DB::raw("CONCAT(firstname, ' ',lastname) as name"),'id')->pluck('name', 'id')->toArray();
    }

    /**
     * Display a listing of transactions
     *
     * @return Response
     */
    public function index(Request $request) {
        //reset search
        if ($request->isMethod('post')) {
            $request->session()->forget('SEARCH');
        }
        if ($request->has('reset')) {
            $request->session()->forget('SEARCH');
            return redirect(ADMIN_SLUG.'/transaction');
        }
        //end code
        
        if ($request->get('search_by') != ''){
            session(['SEARCH.SEARCH_BY' => trim($request->get('search_by'))]);
        }
        
        if ($request->get('search_txt') != '') {
            session(['SEARCH.SEARCH_TXT' => trim($request->get('search_txt'))]);
        }
        
        if ($request->get('user_id') != '') {
            session(['SEARCH.USER_ID' => trim($request->get('user_id'))]);
        }
        
        if ($request->get('search_date') != '') {
            session(['SEARCH.SEARCH_DATE' => trim($request->get('search_date'))]);
        }
        
        $query = Transaction::select('*');
        if ($request->session()->get('SEARCH.SEARCH_BY') != '') {
            if ($request->session()->get('SEARCH.SEARCH_BY') == 'user') {
                $query->where('user_id', $request->session()->get('SEARCH.USER_ID'));
            }
            
            if ($request->session()->get('SEARCH.SEARCH_BY') == 'trans_id') {
                $query->where('trans_id', $request->session()->get('SEARCH.SEARCH_TXT'));
            }
            
            if ($request->session()->get('SEARCH.SEARCH_BY') == 'transaction_date') {
                $date = date('Y-m-d',strtotime($request->session()->get('SEARCH.SEARCH_DATE')));
                $query->where(DB::raw("date(created_at)"),'=',$date);
            }
            $transactions = $query->orderBy('created_at', 'desc')->paginate($this->pageLimit);
        }else{
            $userId = request()->segment(3);
            if($userId){
                $transactions = $query->userBy($userId)->orderBy('created_at','DESC')->paginate($this->pageLimit);
            }else{
                $transactions = $query->orderBy('created_at', 'desc')->paginate($this->pageLimit);
            }
        }
//        $transactions = $query->orderBy('created_at', 'DESC')->toSql();
//        echo $transactions;
//        $bindings = $query->getBindings();
//        dd($bindings);
        $userList = $this->userList;
        return view('admin/transactionList', compact('transactions','userList'));
    }
    
    /**
     * Display the specified transaction.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $transaction = Transaction::findOrFail($id);
        return view('admin/transactionDetails', compact('transaction'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Transaction::destroy($id);
        
        session()->flash('success_message', trans('admin/transaction.transaction_delete_message'));
        $array = array();
        $array['success'] = true;
        //$array['message'] = 'Transaction deleted successfully!';
        echo json_encode($array);
    }
    
    /**
     *  export transactions-list.csv
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=transactions-list.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Transaction ID', 'User Name', 'Payment Method', 'Credit', 'Amount', 'Transaction Date','Transaction Status'));
        $transactions = Transaction::orderBy('created_at', 'DESC')->get();
        foreach ($transactions as $data) {
            $amt = $data->amount.' '.$data->currency;
            $user = $data->user->firstname.' '.$data->user->lastname;
            $date = date('d-m-Y h:i:s A', strtotime($data->created_at));
            fputcsv($output, array(
                $data->trans_id,
                $user,
                $data->payment_method,
                $data->credit,
                $amt,
                $date,
                $data->status
                    )
            );
        }
        fclose($output);
        exit;
    }
}