<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting as Setting;
use App\Helpers\Common as Common;

use Validator;
use File;

class SettingsController extends Controller {

    /**
     * Setting Model
     * @var Setting
     */
    protected $setting;

    /**
     * Inject the models.
     * @param Setting $setting
     */
    public function __construct(Setting $setting) {
        $this->setting = $setting;
    }

    /**
     * Display a listing of settings
     *
     * @return Response
     */
    public function index() {

        // Grab all the settings
        $settings = Setting::first();
            
        if($settings){
            return redirect()->route('settings.edit',$settings->id);
        }else{
            return redirect()->route('settings.create');
        }
    }

    /**
     * Show the form for creating a new setting
     *
     * @return Response
     */
    public function create() {
        $settings = Setting::first();
            
        if($settings){
            return redirect()->route('settings.edit',$settings->id);
        }else{
            return view('admin.settings');
        }
        
    }

    /**
     * Store a newly created setting in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $rules = array(
            'language' => 'required',
            'site_title' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif,bmp|max:3072'
        );
        $data = $request->all();
        
        //add http/https to url
        $data['facebook'] = $data['facebook'] != "" ? Common::addScheme($data['facebook']) : "";
        $data['twitter'] = $data['twitter'] != "" ? Common::addScheme($data['twitter']) : "";
        $data['linkedin'] = $data['linkedin'] != "" ? Common::addScheme($data['linkedin']) : "";
        $data['googleplus'] = $data['googleplus'] != "" ? Common::addScheme($data['googleplus']) : "";
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $setting = Setting::create($data);
        $lastInsertId = $setting->id;
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $filename = 'logo' . '.' . $ext;
                $targetPath = LOGO_PATH;
                $file->move($targetPath, $filename);
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $setting->logo = $filename;
            $setting->save();
        }
        
        return redirect()->route('settings.edit',$lastInsertId)->with('success_message', trans('admin/generalSettings.settings_add_message'));
    }

    /**
     * Show the form for editing the specified setting.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $setting = Setting::find($id);
        if ($setting) {
            return view('admin/settings', compact('setting'));
        } else {
            return redirect(ADMIN_SLUG.'/settings')->with('error_message', trans('admin/generalSettings.settings_invalid_message'));
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
            'language' => 'required',
            'site_title' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif,bmp|max:3072'
        );
        $setting = Setting::findOrFail($id);
        $data = $request->all();
        
        //add http/https to url
        $data['facebook'] = $data['facebook'] != "" ? Common::addScheme($data['facebook']) : "";
        $data['twitter'] = $data['twitter'] != "" ? Common::addScheme($data['twitter']) : "";
        $data['linkedin'] = $data['linkedin'] != "" ? Common::addScheme($data['linkedin']) : "";
        $data['googleplus'] = $data['googleplus'] != "" ? Common::addScheme($data['googleplus']) : "";
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                
                $oldFile = LOGO_PATH.$setting->logo;
                
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                
                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $filename = 'logo.'. $ext;
                $targetPath = LOGO_PATH;
                $file->move($targetPath, $filename);

            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data['logo'] = $filename;
        }else{
            $data['logo'] = $setting->logo;
        }
        $setting->update($data);
        
        return redirect()->back()->with('success_message', trans('admin/generalSettings.settings_update_message'));
    }
}
