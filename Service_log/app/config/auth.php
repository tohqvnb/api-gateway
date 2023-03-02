<?php

return [
    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'jwt' => [
        'secret' => env('JWT_SECRET'),
    ],

];
