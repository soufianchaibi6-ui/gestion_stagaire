<?php

return [

    'defaults' => [
        'guard'     => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'web' => [
            'driver'   => 'session',
            'provider' => 'users',
        ],

        // 👇 Guard pour encadreurs
        'enca' => [
            'driver'   => 'session',
            'provider' => 'en_logins',
        ],
    ],

    'providers' => [
        // Provider pour stagiaires
        'users' => [
            'driver' => 'eloquent',
            'model'  => App\Models\Login::class,
        ],

        // 👇 Provider pour encadreurs
        'en_logins' => [
            'driver' => 'eloquent',
            'model'  => App\Models\en_logine::class, // 👈 ton model encadreur
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table'    => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire'   => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];