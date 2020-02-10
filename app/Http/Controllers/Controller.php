<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public static function getSettings() {
        $setting = \App\Setting::first();
        if ($setting) {
            \App::setLocale($setting->language);
            \Config::set('settings.title', $setting->site_title);
            \Config::set('settings.logo', $setting->logo);
            \Config::set('settings.email', $setting->email);
            \Config::set('settings.phone', $setting->phone);
            \Config::set('settings.map', $setting->map);
            \Config::set('settings.address', $setting->address);
            \Config::set('settings.facebook', $setting->facebook);
            \Config::set('settings.twitter', $setting->twitter);
            \Config::set('settings.linkedin', $setting->linkedin);
            \Config::set('settings.googleplus', $setting->googleplus);
            
        }
        return $setting;
    }
    
    public static function getAdminSettings() {
        $admin = \App\Admin::first();
        $appName = \Config::get('app.name');
        if ($admin) {
            \Config::set('mail.from.address', $admin->email);
            \Config::set('mail.from.name', $appName);
            
            \Config::set('settings.admin.email', $admin->email);
            \Config::set('settings.admin.name', $admin->firstname.' '.$admin->lastname);
            \Config::set('settings.admin.image', $admin->image);
        }
        return $admin;
    }
    
    public static function getPaypalSettings() {
        $paypalsetting = \App\PaypalSetting::first();
        if ($paypalsetting) {
            if($paypalsetting->mode=='live'){
                \Config::set('services.paypal.mode', $paypalsetting->mode);
                \Config::set('services.paypal.client_id', $paypalsetting->client_id_live);
                \Config::set('services.paypal.secret', $paypalsetting->secret_live);
                \Config::set('services.paypal.endpoint', 'https://api.paypal.com');
            }else{
                \Config::set('services.paypal.mode', $paypalsetting->mode);
                \Config::set('services.paypal.client_id', $paypalsetting->client_id_sandbox);
                \Config::set('services.paypal.secret', $paypalsetting->secret_sandbox);
                \Config::set('services.paypal.endpoint', 'https://api.sandbox.paypal.com');
            }
        }
        return $paypalsetting;
    }
    
    public static function getPaymentSettings() {
        $paymentsetting = \App\PaymentSetting::first();
        if ($paymentsetting) {
            \Config::set('settings.payment.currency', $paymentsetting->currency->code);
            \Config::set('settings.payment.price', $paymentsetting->price);
        }
        return $paymentsetting;
    }
    
    public static function getMetadata(){
        \Config::set('settings.title', config('settings.title'));
        \Config::set('settings.metaTitle', config('settings.metaTitle'));
        \Config::set('settings.metaKeywords', config('settings.metaKeywords'));
        \Config::set('settings.metaDescription', config('settings.metaDescription'));
    }
}

Controller::getSettings();
Controller::getAdminSettings();
Controller::getPaypalSettings();
Controller::getPaymentSettings();
Controller::getMetadata();