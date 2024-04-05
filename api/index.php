<?php
// Archivo: index.php

// Incluir el archivo de enrutamiento
include 'router.php';

// Obtener la ruta de la solicitud
$request_uri = $_SERVER['REQUEST_URI'];

// Definir las rutas para las tablas
$routes = [
    '/clientes' => 'ClienteController',
    '/cuentas' => 'CuentaController',
    '/movimientos' => 'MovimientoController',
    '/auditorias' => 'AuditoriaController',
    '/administradores' => 'AdministradorController'
];

// Enrutamiento de la solicitud a los controladores correspondientes
if (array_key_exists($request_uri, $routes)) {
    $controller_name = $routes[$request_uri];
    include "controllers/$controller_name.php";
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Ruta no encontrada']);
}
?>
