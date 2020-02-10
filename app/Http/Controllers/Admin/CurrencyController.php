<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Datatable\SSP;

use App\Currency;

use Validator;

class CurrencyController extends Controller {

    /**
     * Currency Model
     * @var Currency
     */
    protected $currency;
    protected $pageLimit;

    /**
     * Inject the models.
     * @param Currency $currency
     */
    public function __construct(Currency $currency) {
        $this->currency = $currency;
        $this->pageLimit = config('settings.pageLimit');
    }

    /**
     * Display a listing of currency
     *
     * @return Response
     */
    public function index() {

        // Grab all the currency
        $currency = Currency::paginate($this->pageLimit);

        // Show the currency
        return view('admin/currencyList', compact('currency'));
    }

    /**
     * Show the form for creating a new currency
     *
     * @return Response
     */
    public function create() {
        return view('admin.currency');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = array(
            'name' => 'required',
            'code' => 'required|unique:currencies',
        );
        
        $data = $request->all();
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $currency = Currency::create($data);
        $lastInsertId = $currency->id;
        
        return redirect()->route('currency.index')->with('success_message', trans('admin/currency.currency_add_message'));
    }

    /**
     * Show the form for editing the specified currency.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $currency = Currency::find($id);
        
        if ($currency) {
            return view('admin/currency', compact('currency'));
        } else {
            return redirect(ADMIN_SLUG.'/currency')->with('error_message', trans('admin/currency.currency_invalid_message'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $rules = array(
            'name' => 'required',
            'code' => 'required|unique:currencies,code,'.$id,
        );
        $currency = Currency::findOrFail($id);
        $data = $request->all();
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $currency->update($data);
        
        return redirect()->route('currency.index')->with('success_message', trans('admin/currency.currency_update_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        Currency::destroy($id);

        $array = array();
        $array['success'] = true;
        $array['message'] = trans('admin/currency.currency_delete_message');
        echo json_encode($array);
    }

    public function changeCurrencyStatus(Request $request) {
        $data = $request->all();

        $currency = Currency::find($data['id']);
        
        if ($currency->status) {
            $currency->status = '0';
        } else {
            $currency->status = '1';
        }
        $currency->save();

        $array = array();
        $array['success'] = true;
        $array['message'] = trans('admin/currency.currency_status_message');
        echo json_encode($array);
    }

    public function getCurrencyData() {

        /*
         * DataTables example server-side processing script.
         *
         * Please note that this script is intentionally extremely simply to show how
         * server-side processing can be implemented, and probably shouldn't be used as
         * the basis for a large complex system. It is suitable for simple use cases as
         * for learning.
         *
         * See http://datatables.net/usage/server-side for full details on the server-
         * side processing requirements of DataTables.
         *
         * @license MIT - http://datatables.net/license_mit
         */

        /*         * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * Easy set variables
         */

        // DB table to use
        $table = 'currencies';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array('db' => 'name', 'dt' => 0, 'field' => 'title'),
            array('db' => 'code', 'dt' => 1, 'field' => 'currency_type'),
            array('db' => 'status', 'dt' => 2, 'formatter' => function( $d, $row ) {
                    if ($row['status']) {
                        return '<a href="javascript:;" class="btn btn-success status-btn" id="' . $row['id'] . '" title="'.trans('admin/common.click_to_inactive').'" data-toggle="tooltip">'.trans('admin/common.active').'</a>';
                    } else {
                        return '<a href="javascript:;" class="btn btn-danger status-btn" id="' . $row['id'] . '" title="'.trans('admin/common.click_to_active').'" data-toggle="tooltip">'.trans('admin/common.inactive').'</a>';
                    }
                }, 'field' => 'status'),
            array('db' => 'id', 'dt' => 3, 'formatter' => function( $d, $row ) {
                    $operation = '<a href="currency/' . $d . '/edit" class="btn btn-primary" title="'.trans('admin/common.edit').'" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>&nbsp;';
                    $operation .='<a href="javascript:;" id="' . $d . '" class="btn btn-danger delete-btn" title="'.trans('admin/common.delete').'" data-toggle="tooltip"><i class="fa fa-times"></i></a>&nbsp;';
                    return $operation;
                }, 'field' => 'id')
        );

        // SQL server connection information
        $sql_details = array(
            'user' => config('database.connections.mysql.username'),
            'pass' => config('database.connections.mysql.password'),
            'db' => config('database.connections.mysql.database'),
            'host' => config('database.connections.mysql.host')
        );

        $joinQuery = NULL;
        $extraWhere = "";
        $groupBy = "";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy)
        );
    }

}
