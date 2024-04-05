<?php
// Archivo: router.php

// Incluir los controladores
include 'controllers/ClienteController.php';
include 'controllers/CuentaController.php';
include 'controllers/MovimientoController.php';
include 'controllers/AuditoriaController.php';
include 'controllers/AdministradorController.php';

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
    // Llamar al método correspondiente del controlador basado en el método HTTP
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $controller_name::index();
            break;
        case 'POST':
            $controller_name::store();
            break;
        case 'PUT':
            $controller_name::update();
            break;
        case 'DELETE':
            $controller_name::destroy();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Método no permitido']);
            break;
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Ruta no encontrada']);
}
?>