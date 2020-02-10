<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Admin login screen title
    |--------------------------------------------------------------------------
    | 
    | You can change the default title of your admin login screen from here
    |  
    */
    'sitename' => 'Master Admin',
    
    /*
    |--------------------------------------------------------------------------
    | Number of record display per page admin side
    |--------------------------------------------------------------------------
    |
    | Your application is set with default page limits of record diplay. 
    | You can change the default page limit from here
    |  
    */
    'pageLimit' => 10,
    
     /*
    |--------------------------------------------------------------------------
    | Number of record display per page on frontend side
    |--------------------------------------------------------------------------
    |
    | Your application is set with default page limits of record diplay. 
    | You can change the default page limit from here
    |  
    */
    'pageLimitFront' => 10,
    
    /*
    |--------------------------------------------------------------------------
    | Logo frontend side
    |--------------------------------------------------------------------------
    |
    | Your application is set with default logo is empty. 
    | You can set default application logo from here
    |  
    */
    'logo' => '',
    
    /*
    |--------------------------------------------------------------------------
    | Default metadata
    |--------------------------------------------------------------------------
    |
    | Your application is set with default metadata tags. 
    | i.e. title, meta title, keywords, description
    |  
    */
    'title' => 'Laravel Booking System with Live Chat',
    'metaTitle' => 'Laravel Booking System with Live Chat',
    'metaKeywords' => 'laravel booking, laravel appointment, laravel calendar, laravel reservation, laravel scheduler, laravel chat, booking, booking system, appointment, calendar, reservation, service reservation, service booking, live chat, responsive admin',
    'metaDescription' => 'Laravel Booking System with Live Chat is great for booking and make appointments or schedule appointments for all professional and business entrepreneur',
    
    
    /*
    |--------------------------------------------------------------------------
    | Default admin setttings
    |--------------------------------------------------------------------------
    |
    | Your application is set with default settings. 
    | i.e. email, phone, map, address, facebook, twitter, linkedin, googleplus
    |  
    */
    'email' => '',
    'phone' => '',
    'map' => '',
    'address' => '',
    'facebook' => '#',
    'twitter' => '#',
    'linkedin' => '#',
    'googleplus' => '#',
    
    'admin' => [
        'email' => 'admin@admin.com',
        'name' => 'Admin',
        'image' => 'default.png',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Payment settings for purchase credit
    |--------------------------------------------------------------------------
    | 
    | You can change the default currency and price to purchase credit from here
    |  
    */
    'payment' => [
        'currency' => 'USD',
        'price' => '1',
    ]
    
];