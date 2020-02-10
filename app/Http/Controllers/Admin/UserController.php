<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Datatable\SSP;
use App\User;
use File;

class UserController extends Controller {

    /**
     * User Model
     * @var User
     */
    protected $user;
    protected $pageLimit;

    /**
     * Inject the models.
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
        $this->pageLimit = config('settings.pageLimit');
    }

    /**
     * Display a listing of user
     *
     * @return Response
     */
    public function index() {

        // Grab all the user
        $users = User::paginate($this->pageLimit);

        // Show the page
        return view('admin/userList', compact('users'));
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $user = User::findOrFail($id);
        return view('admin/userDetails', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        $oldFile = USER_IMAGE_PATH . $user->image;
        if (File::exists($oldFile)) {
            File::delete($oldFile);
        }
        User::destroy($id);

        $array = array();
        $array['success'] = true;
        $array['message'] = trans('admin/user.user_delete_message');
        echo json_encode($array);
    }

    public function changeUserStatus(Request $request) {
        $data = $request->all();
        $user = User::find($data['id']);
        
        if ($user->status) {
            $user->status = '0';
        } else {
            $user->status = '1';
        }
        $user->save();

        $array = array();
        $array['status'] = $user->status;
        $array['success'] = true;
        $array['message'] = trans('admin/user.user_status_message');
        echo json_encode($array);
    }
    
    /**
     * Change user credit of the specified user.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCredit(Request $request) {

        $data = $request->all();
        $data['credit'] = $data['value'];
        $user = User::find($data['userId']);
       
        $user->update($data);
        $array = array();
        $array['success'] = true;
        session()->flash('success_message', trans('admin/user.credit_update_message'));
        echo json_encode($array);
    }

    public function getUserData() {
        // DB table to use
        $table = 'users';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array('db' => 'users.firstname', 'dt' => 0, 'field' => 'firstname'),
            array('db' => 'users.lastname', 'dt' => 1, 'field' => 'lastname'),
            array('db' => 'users.email', 'dt' => 2, 'field' => 'email'),
            array('db' => 'users.credit', 'dt' => 3, 'formatter' => function( $d, $row ) {
                return '<span class="" data-toggle="tooltip" title="'.trans('admin/user.credit_info').'"><a class="credit_'.$row['id'].' credit-txt" data-userid="'.$row['id'].'">' .$d. '</a></span>';
            }, 'field' => 'credit'),
            array('db' => 'COALESCE(bk.total_bookings,0)', 'dt' => 4, 'formatter' => function( $d, $row ) {
                    return '<a href="users/' . $d.'/booking" class="btn btn-primary" id="' . $row['id'] . '" title="'.trans('admin/user.view_bookings').'" data-toggle="tooltip">'.$row['total_bookings'].'</a>';
            }, 'field' => 'id', 'as' => 'total_bookings'),
            array('db' => 'COALESCE(trans.total_transactions,0)', 'dt' => 5, 'formatter' => function( $d, $row ) {
                    return '<a href="users/' . $d.'/transaction" class="btn btn-primary" id="' . $row['id'] . '" title="'.trans('admin/user.view_transactions').'" data-toggle="tooltip">'.$row['total_transactions'].'</a>';
            }, 'field' => 'id', 'as' => 'total_transactions'),
            array('db' => 'users.id', 'dt' => 6, 'formatter' => function( $d, $row ) {
                return '<a href="chatboard/history/' . $d . '" class="btn btn-primary" title="'.trans('admin/user.view_chat').'" data-toggle="tooltip"><i class="fa fa-eye"></i></a>';
            }, 'field' => 'id'),
            array('db' => 'users.status', 'dt' => 7, 'formatter' => function( $d, $row ) {
                    if ($row['status']) {
                        return '<a href="javascript:;" class="btn btn-success status-btn" id="' . $row['id'] . '" title="'.trans('admin/common.click_to_inactive').'" data-toggle="tooltip">'.trans('admin/common.active').'</a>';
                    } else {
                        return '<a href="javascript:;" class="btn btn-danger status-btn" id="' . $row['id'] . '" title="'.trans('admin/common.click_to_active').'" data-toggle="tooltip">'.trans('admin/common.inactive').'</a>';
                    }
            }, 'field' => 'status'),
            array('db' => 'users.id', 'dt' => 8, 'formatter' => function( $d, $row ) {
                    $operation ='<a href="javascript:;" id="' . $d . '" class="btn btn-danger delete-btn" title="'.trans('admin/common.delete').'" data-toggle="tooltip"><i class="fa fa-times"></i></a>';
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
        
        $joinQuery = "LEFT JOIN (SELECT COUNT(*) AS total_bookings, user_id FROM bookings GROUP BY user_id ) as bk ON bk.user_id = users.id";
        $joinQuery .= " LEFT JOIN (SELECT COUNT(*) AS total_transactions, user_id FROM transactions GROUP BY user_id ) as trans ON trans.user_id = users.id";
        $extraWhere = "";
        $groupBy = "users.id";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy)
        );
    }
}
