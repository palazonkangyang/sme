<?php

return [

    'multi-auth' => [
        'admin' => [
            'driver' => 'eloquent',
            'model'  => SME\Http\Models\Admin::class,
            'email'  => 'email.admin.account.password.reset'
        ],
        'buyer' => [
            'driver' => 'eloquent',
            'model'  => SME\Http\Models\Buyer::class,
            'email'  => 'email.buyer.account.password.reset'
        ],
        "supplier" => [
            'driver' => 'eloquent',
            'model'  => SME\Http\Models\Supplier::class,
            'email'  => 'email.supplier.account.password.reset'
        ],
        "bus" => [
            'driver' => 'eloquent',
            'model'  => SME\Http\Models\Bus::class,
            'email'  => 'email.supplier.account.password.reset'
        ]
    ],

    'password' => [
        'table' => 'password_resets',
        'expire' => 60,
    ],
];
