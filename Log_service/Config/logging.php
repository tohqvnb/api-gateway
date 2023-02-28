<?php
return [
    'default' => env('LOG_CHANNEL', 'stack'),

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['info', 'warning'],
        ],
        'login' => [
            'driver' => 'single',
            'path' => storage_path('logs/login.log'),
            'level' => 'info',
        ],

    ],

];
