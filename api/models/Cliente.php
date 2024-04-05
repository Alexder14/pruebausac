<?php
// Archivo: models/Cliente.php

class Cliente {
    public static function all() {
        include 'config/database.php';
        try {
            // Obtener todos los clientes
            $sql = "SELECT * FROM Cliente";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar errores
            throw new Exception('Error al obtener los clientes: ' . $e->getMessage());
        }
    }

    public static function create($nombres, $apellidos) {
        include 'config/database.php';
        try {
            // Insertar nuevo cliente
            $sql = "INSERT INTO Cliente (nombres, apellidos) VALUES (:nombres, :apellidos)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['nombres' => $nombres, 'apellidos' => $apellidos]);
            return true;
        } catch (PDOException $e) {
            // Manejar errores
            throw new Exception('Error al crear el cliente: ' . $e->getMessage());
        }
    }

    // Implementar métodos update() y destroy() para actualizar y eliminar clientes
}
?>