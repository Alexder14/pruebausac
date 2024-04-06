<?php

use App\Models\Cliente;

return [

    // ...

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'clientes'), // Cambiado de 'users' a 'clientes'
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'clientes', // Cambiado de 'users' a 'clientes'
        ],

        // ...
    ],

    'providers' => [
        'clientes' => [ // Cambiado de 'users' a 'clientes'
            'driver' => 'eloquent',
            'model' => Cliente::class, // Actualizado para apuntar al modelo Cliente
        ],

        // ...
    ],

    'passwords' => [
        'clientes' => [ // Cambiado de 'users' a 'clientes'
            'provider' => 'clientes', // Asegúrate de que esto coincida con el proveedor definido arriba
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_resets'),
            'expire' => 60,
            'throttle' => 60,
        ],

        // ...
    ],

    // ...

];
