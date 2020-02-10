<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PaypalSetting as PaypalSetting;
use Validator;

class PaypalSettingsController extends Controller {

    /**
     * PaypalSetting Model
     * @var PaypalSetting
     */
    protected $paypalsetting;

    /**
     * Inject the models.
     * @param PaypalSetting $paypalsetting
     */
    public function __construct(PaypalSetting $paypalsetting) {
        $this->paypalsetting = $paypalsetting;
    }

    /**
     * Display a listing of paypalsettings
     *
     * @return Response
     */
    public function index() {

        // Grab all the paypalsettings
        $paypalsettings = PaypalSetting::first();
            
        if($paypalsettings){
            return redirect()->route('paypalsettings.edit',$paypalsettings->id);
        }else{
            return redirect()->route('paypalsettings.create');
        }
    }

    /**
     * Show the form for creating a new paypalsetting
     *
     * @return Response
     */
    public function create() {
        $paypalsettings = PaypalSetting::first();
            
        if($paypalsettings){
            return redirect()->route('paypalsettings.edit',$paypalsettings->id);
        }else{
            return view('admin.paypalsettings');
        }
        
    }

    /**
     * Store a newly created paypalsetting in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $rules = array(
            'mode' => 'required',
            'client_id_sandbox' => 'required',
            'secret_sandbox' => 'required',
            'client_id_live' => 'required',
            'secret_live' => 'required',
        );
        $data = $request->all();
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $paypalsetting = PaypalSetting::create($data);
        $lastInsertId = $paypalsetting->id;
        
        return redirect()->route('paypalsettings.edit',$lastInsertId)->with('success_message', trans('admin/paypalSettings.paypal_settings_add_message'));
    }

    /**
     * Show the form for editing the specified paypalsetting.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $paypalsetting = PaypalSetting::find($id);
        if ($paypalsetting) {
            return view('admin/paypalsettings', compact('paypalsetting'));
        } else {
            return redirect(ADMIN_SLUG.'/paypalsettings')->with('error_message', trans('admin/paypalSettings.paypal_settings_invalid_message'));
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
            'mode' => 'required',
            'client_id_sandbox' => 'required',
            'secret_sandbox' => 'required',
            'client_id_live' => 'required',
            'secret_live' => 'required',
        );
        $paypalsetting = PaypalSetting::findOrFail($id);
        $data = $request->all();
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $paypalsetting->update($data);
        
        return redirect()->back()->with('success_message', trans('admin/paypalSettings.paypal_settings_update_message'));
    }
}
