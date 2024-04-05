<?php
// Archivo: controllers/ClienteController.php

class ClienteController {
    public static function index() {
        include 'config/database.php';
        try {
            // Obtener todos los clientes
            $sql = "SELECT * FROM Cliente";
            $stmt = $pdo->query($sql);
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($clientes);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error al obtener los clientes: ' . $e->getMessage()]);
        }
    }

    public static function store() {
        include 'config/database.php';
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $nombres = $data['nombres'];
            $apellidos = $data['apellidos'];
            // Agregar más campos según sea necesario

            // Insertar nuevo cliente
            $sql = "INSERT INTO Cliente (nombres, apellidos) VALUES (:nombres, :apellidos)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['nombres' => $nombres, 'apellidos' => $apellidos]);
            echo json_encode(['message' => 'Cliente creado exitosamente']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error al crear el cliente: ' . $e->getMessage()]);
        }
    }

    // Implementar métodos update() y destroy() para actualizar y eliminar clientes
}
?>