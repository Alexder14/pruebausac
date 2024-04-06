<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// Asegúrate de que este script se ejecute en el entorno de la aplicación de Laravel
// para que las funciones de Hash y DB estén disponibles.

// Obtén todos los clientes
$clientes = DB::table('clientes')->select('id', 'contraseña')->get();

foreach ($clientes as $cliente) {
    // Hashea la contraseña actual del cliente asumiendo que está en texto plano
    $hashedPassword = Hash::make($cliente->contraseña);

    // Actualiza la contraseña del cliente con la nueva contraseña hasheada
    DB::table('clientes')
        ->where('id', $cliente->id)
        ->update(['contraseña' => $hashedPassword]);
}

echo "Las contraseñas de los clientes han sido actualizadas correctamente.\n";