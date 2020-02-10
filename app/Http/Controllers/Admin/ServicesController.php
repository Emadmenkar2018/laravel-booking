<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Datatable\SSP;
use App\Helpers\Common;

use App\Service as Service;
use App\Schedule as Schedule;
use Validator;
use File;

class ServicesController extends Controller {

    /**
     * Service Model
     * @var Service
     */
    protected $service;
    protected $pageLimit;

    /**
     * Inject the models.
     * @param Service $service
     */
    public function __construct(Service $service) {
        $this->service = $service;
        $this->pageLimit = config('settings.pageLimit');
    }

    /**
     * Display a listing of services
     *
     * @return Response
     */
    public function index() {

        // Grab all the services
        $services = Service::paginate($this->pageLimit);

        // Show the service
        return view('admin/servicesList', compact('services'));
    }

    /**
     * Show the form for creating a new service
     *
     * @return Response
     */
    public function create() {
        return view('admin.services');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->all();
        
        $startTimeRequired = $endTimeRequired = '';
        if($data['service_type']!='weekly'){
            $startTimeRequired = $endTimeRequired = 'required';
        }
        
        $rules = array(
            'title' => 'required|unique:services',
            'price' => 'required|numeric',
            'duration' => 'required',
            'service_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => $startTimeRequired,
            'end_time' => $endTimeRequired,
        );
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $data['start_time'] = $data['end_time'] = NULL;
        
        $data['start_date'] =  date('Y-m-d',strtotime($request->get('start_date')));
        $data['end_date'] =  date('Y-m-d',strtotime($request->get('end_date')));
        
        if ($request->get('service_type') != 'weekly') {
            $data['start_time'] =  date('H:i:s',strtotime($request->get('start_time')));
            $data['end_time'] =  date('H:i:s',strtotime($request->get('end_time')));
        }
        
        $service = Service::create($data);
        $lastInsertId = $service->id;
        
        //store weekly schedule
        if ($request->get('service_type')=='weekly') {
            for($i=0;$i<7;$i++){
                if($data['start_time_'.$i]!="" && $data['end_time_'.$i]!=""){
                    $start_time =  date('H:i:s',strtotime($data['start_time_'.$i]));
                    $end_time =  date('H:i:s',strtotime($data['end_time_'.$i]));
                    $c = new Schedule;
                    $c->service_id = $lastInsertId;
                    $c->week_number = $i;
                    $c->start_time = $start_time;
                    $c->end_time = $end_time;
                    $c->save();
                }
            }
        }
        //end code
        
        return redirect()->route('services.index')->with('success_message', trans('admin/service.service_add_message'));
    }

    /**
     * Display the specified service.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $service = Service::findOrFail($id);

        return view('admin.services.serviceDetail', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $service = Service::find($id);
        
        if ($service) {
            return view('admin/services', compact('service'));
        } else {
            return redirect(ADMIN_SLUG.'/services')->with('error_message', trans('admin/service.service_invalid_message'));
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
        $service = Service::findOrFail($id);
        $data = $request->all();
        
        $startTimeRequired = $endTimeRequired = '';
        
        if($data['service_type']!='weekly'){
            $startTimeRequired = $endTimeRequired = 'required';
        }
        
        $rules = array(
            'title' => 'required|unique:services,title,'.$id,
            'price' => 'required|numeric',
            'duration' => 'required',
            'service_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => $startTimeRequired,
            'end_time' => $endTimeRequired,
        );
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $data['start_time'] = $data['end_time'] = NULL;
        
        $data['start_date'] =  date('Y-m-d',strtotime($request->get('start_date')));
        $data['end_date'] =  date('Y-m-d',strtotime($request->get('end_date')));
        
        if ($request->get('service_type') != 'weekly') {
            $data['start_time'] =  date('H:i:s',strtotime($request->get('start_time')));
            $data['end_time'] =  date('H:i:s',strtotime($request->get('end_time')));
        }
        
        $service->update($data);
        
        //store weekly schedule
        if ($request->get('service_type')=='weekly') {
            
            Schedule::where('service_id',$id)->delete();
            
            for($i=0;$i<7;$i++){
                if($data['start_time_'.$i]!="" && $data['end_time_'.$i]!=""){
                    $start_time =  date('H:i:s',strtotime($data['start_time_'.$i]));
                    $end_time =  date('H:i:s',strtotime($data['end_time_'.$i]));
                    $c = new Schedule;
                    $c->service_id = $id;
                    $c->week_number = $i;
                    $c->start_time = $start_time;
                    $c->end_time = $end_time;
                    $c->save();
                }
            }
        }
        //end code
        
        return redirect()->route('services.index')->with('success_message', trans('admin/service.service_update_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Schedule::where('service_id',$id)->delete();
        Service::destroy($id);

        $array = array();
        $array['success'] = true;
        $array['message'] = trans('admin/service.service_delete_message');
        echo json_encode($array);
    }

    public function changeServiceStatus(Request $request) {
        $data = $request->all();

        $service = Service::find($data['id']);
        
        if ($service->status) {
            $service->status = '0';
        } else {
            $service->status = '1';
        }
        $service->save();

        $array = array();
        $array['success'] = true;
        $array['message'] = trans('admin/service.service_status_message');
        echo json_encode($array);
    }

    public function getServicesData() {

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
        $table = 'services';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array('db' => 'title', 'dt' => 0, 'field' => 'title'),
            array('db' => 'service_type', 'dt' => 1, 'formatter' => function( $d, $row ) {
                        return trans('admin/service.'.$d);
                }, 'field' => 'service_type'),
            array('db' => 'price', 'dt' => 2, 'field' => 'price'),
            array('db' => 'duration', 'dt' => 3, 'formatter' => function( $d, $row ) {
                        if($d<60){
                            return $d.' '.trans('admin/service.minutes');
                        }else{
                            return ($d/60).' '.trans('admin/service.hours');
                        }
                }, 'field' => 'duration'),
            array('db' => 'status', 'dt' => 4, 'formatter' => function( $d, $row ) {
                    if ($row['status']) {
                        return '<a href="javascript:;" class="btn btn-success status-btn" id="' . $row['id'] . '" title="'.trans('admin/common.click_to_inactive').'" data-toggle="tooltip">'.trans('admin/common.active').'</a>';
                    } else {
                        return '<a href="javascript:;" class="btn btn-danger status-btn" id="' . $row['id'] . '" title="'.trans('admin/common.click_to_active').'" data-toggle="tooltip">'.trans('admin/common.inactive').'</a>';
                    }
                }, 'field' => 'status'),
            array('db' => 'id', 'dt' => 5, 'formatter' => function( $d, $row ) {
                    $operation = '<a href="services/' . $d . '/edit" class="btn btn-primary" title="'.trans('admin/common.edit').'" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>&nbsp;';
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
