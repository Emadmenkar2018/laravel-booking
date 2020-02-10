<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/{id?}/{id1?}/{id2?}', function(){
    return view('frontend.maintenance');
});*/
/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
defined('ADMIN_SLUG') or define('ADMIN_SLUG', 'admin');

Route::group(array('prefix' => ADMIN_SLUG), function() {

    Route::get('/', 'Admin\LoginController@getIndex')->middleware('guest.admin')->name(ADMIN_SLUG);
    Route::get('logout', array('uses' => 'Admin\LoginController@doLogout'));
    Route::post('login', array('uses' => 'Admin\LoginController@doLogin'));
        
    // Password Reset Routes...
    Route::get('password/reset', array('uses'=>'Admin\ForgotPasswordController@showLinkRequestForm', 'as'=>ADMIN_SLUG.'.password.email'));
    Route::post('password/email', array('uses'=>'Admin\ForgotPasswordController@sendResetLinkEmail', 'as'=>ADMIN_SLUG.'.password.email'));
    Route::get('password/reset/{token}', array('uses'=>'Admin\ResetPasswordController@showResetForm', 'as'=>ADMIN_SLUG.'.password.reset'));
    Route::post('password/reset', array('uses'=>'Admin\ResetPasswordController@reset', 'as'=>ADMIN_SLUG.'.password.reset'));

    //after login
    Route::group(array('middleware' => 'auth.admin'), function() {

        Route::get('dashboard', 'Admin\DashboardController@index')->name(ADMIN_SLUG.'.dashboard');
       
        #Settings Management
        Route::resource('settings', 'Admin\SettingsController');
        
        #paypal settings management
        Route::resource('paypalsettings', 'Admin\PaypalSettingsController');
        
        #currency management
        Route::get('currency/CurrencyData', 'Admin\CurrencyController@getCurrencyData');
        Route::post('currency/changeStatus', 'Admin\CurrencyController@changeCurrencyStatus');
        Route::resource('currency', 'Admin\CurrencyController');
        
        #payment settings management
        Route::resource('paymentsettings', 'Admin\PaymentSettingsController');
       
        #Admin Profile Management
        Route::resource('profile', 'Admin\ProfileController');
        
        #Admin password change
        Route::get('password/change', array('uses' => 'Admin\ProfileController@changePassword', 'as' => ADMIN_SLUG.'.password.change'));
        Route::post('password/change', array('uses' => 'Admin\ProfileController@updatePassword', 'as' => ADMIN_SLUG.'.password.change'));
        
        #Services Management
        Route::get('services/ServicesData', 'Admin\ServicesController@getServicesData');
        Route::post('services/changeStatus', 'Admin\ServicesController@changeServiceStatus');
        Route::resource('services','Admin\ServicesController');
        
        #Booking Management
        Route::get('booking/export', 'Admin\BookingController@export');
        Route::any('booking/search', array('uses' => 'Admin\BookingController@index', 'as' => ADMIN_SLUG.'.booking.search'));
        Route::post('booking/changeStatus', 'Admin\BookingController@changeBookingStatus');
        Route::resource('booking','Admin\BookingController');
        
        #Transaction Management
        Route::get('transaction/export', 'Admin\TransactionController@export');
        Route::any('transaction/search', array('uses' => 'Admin\TransactionController@index', 'as' => ADMIN_SLUG.'.transaction.search'));
        Route::resource('transaction','Admin\TransactionController');
        
        #User Management
        Route::post('users/updateCredit', 'Admin\UserController@updateCredit');
        Route::get('users/UserData', 'Admin\UserController@getUserData');
        Route::post('users/changeStatus', 'Admin\UserController@changeUserStatus');
        Route::resource('users', 'Admin\UserController');
        
        Route::resource('users.booking', 'Admin\BookingController');
        Route::resource('users.transaction', 'Admin\TransactionController');
        
        #chat Management
        Route::get('chatboard/history/{id}', 'Admin\ChatController@history');
        Route::get('chatboard/{id}', 'Admin\ChatController@index');
        Route::post('chatboard/store', 'Admin\ChatController@store');
        Route::post('chatboard/notificationCount', 'Admin\ChatController@getNotificationCount');
        Route::resource('chatboard', 'Admin\ChatController');
        
        #Enquiry Management
        Route::get('enquiry/EnquiryData', 'Admin\EnquiryController@getEnquiryData');
        Route::post('enquiry/changeStatus', 'Admin\EnquiryController@changeEnquiryStatus');
        Route::resource('enquiry','Admin\EnquiryController');
        
    });
});

/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

//Route::get('register', array('uses'=>'Frontend\UserController@create','as' => 'frontend.users.create'));

#before login
Route::get('/', 'Frontend\HomeController@index')->name('frontend.index');

Route::post('contact', array('uses' => 'Frontend\HomeController@submitEnquiry', 'as' => 'contact'));

#login user
Route::post('login', array('uses' => 'Frontend\LoginController@doLogin', 'as' => 'frontend.login'));
Route::resource('users', 'Frontend\UserController');

// Password Reset Routes...
Route::get('password/reset', array('uses'=>'Frontend\ForgotPasswordController@showLinkRequestForm', 'as'=>'password.email'));
Route::post('password/email', array('uses'=>'Frontend\ForgotPasswordController@sendResetLinkEmail', 'as'=>'password.email'));
Route::get('password/reset/{token}', array('uses'=>'Frontend\ResetPasswordController@showResetForm', 'as'=>'password.reset'));
Route::post('password/reset', array('uses'=>'Frontend\ResetPasswordController@reset', 'as'=>'password.reset'));

//after login
Route::group(array('middleware' => 'auth.user'), function() {
    
    Route::get('dashboard', 'Frontend\DashboardController@index');
    
    Route::get('profile', 'Frontend\UserController@index');
    
    #user password change
    Route::get('password/change', array('uses' => 'Frontend\UserController@changePassword', 'as' => 'password.change'));
    Route::post('password/change', array('uses' => 'Frontend\UserController@updatePassword', 'as' => 'password.change'));
    
    #logout user
    Route::get('logout', 'Frontend\LoginController@doLogout');
    
    #chat
    Route::get('chat/show', 'Frontend\ChatController@show');
    Route::post('chat/store', 'Frontend\ChatController@store');
    Route::get('chat', 'Frontend\ChatController@index');
    
    #reservation
    Route::get('reservation/{id}/{day}', 'Frontend\ReservationController@getSpots');
    Route::get('getServices', 'Frontend\ReservationController@getServices');
    Route::resource('reservation', 'Frontend\ReservationController');
    
    #booking
    Route::any('booking', array('uses' => 'Frontend\BookingController@index', 'as' => 'booking.search'));
    Route::get('booking/export', 'Frontend\BookingController@export');
    Route::post('booking/store', array('uses' => 'Frontend\BookingController@store', 'as' => 'booking.store'));
    
    #buy credit
    Route::get('credit', 'Frontend\PaypalController@index');
    Route::get('credit/paypal', 'Frontend\PaypalController@getPaypal');
    Route::post('credit/paypal', array('uses' => 'Frontend\PaypalController@postPaypal', 'as' => 'credit.paypal'));
    Route::get('credit/success', array('uses' => 'Frontend\PaypalController@getSuccess', 'as' => 'credit.success'));
    Route::get('credit/cancel', array('uses' => 'Frontend\PaypalController@getCancel', 'as' => 'credit.cancel'));
    
    #transaction
    Route::any('transaction', array('uses' => 'Frontend\TransactionController@index', 'as' => 'transaction.search'));
    Route::get('transaction/export', 'Frontend\TransactionController@export');
});


//cron job
Route::get('/cron/bookingstatus', 'Frontend\BookingController@cronBookingStatus');

/** ------------------------------------------
 *  GLOBAL variable define
 *  ------------------------------------------
 */
defined('LOGO_PATH') or define('LOGO_PATH', base_path() . '/uploads/logo/');
defined('LOGO_ROOT') or define('LOGO_ROOT', URL('uploads/logo') . '/');

defined('ADMIN_IMAGE_PATH') or define('ADMIN_IMAGE_PATH', base_path() . '/uploads/admin/');
defined('ADMIN_IMAGE_ROOT') or define('ADMIN_IMAGE_ROOT', URL('uploads/admin') . '/');

defined('USER_IMAGE_PATH') or define('USER_IMAGE_PATH', base_path() . '/uploads/user/');
defined('USER_IMAGE_ROOT') or define('USER_IMAGE_ROOT', URL('uploads/user') . '/');