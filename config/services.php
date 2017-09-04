<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

//    'stripe' => [
//        'model'  => SME\User::class,
//        'key'    => env('STRIPE_KEY'),
//        'secret' => env('STRIPE_SECRET'),
//    ],

    'paypal' => [
        'client_id' => 'AZfvF0uWrlz5rvxT_IzNe91E55Kk8O6bj3wIEFWRKpXytdTlilx2JivgFgAtT5Ymk7kMIBOb3T2RxneR',
        'secret' => 'EGLChjidPqVKDSr69G7Cf2pTb87Boco0cjMf_4yrMsHz09mFoltq_d49tozxtsjahmGFz6KwmLa0rpBy'
    ],
    
];
