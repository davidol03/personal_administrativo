<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users', // Asegúrate de que esto coincida
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users', // Debe coincidir con el nombre de tu provider
        ],
        'usuario' => [
            'driver' => 'session',
            'provider' => 'usuario', // Asegúrate de que el provider coincida
        ],
    ],

    'providers' => [
        'users' => [ // Cambiado a User::class
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Apunta al modelo correcto
        ],

        'usuario' => [ // Este es el provider para el guard 'usuario'
            'driver' => 'eloquent',
            'model' => App\Models\Usuario::class, // Modelo Usuario
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
