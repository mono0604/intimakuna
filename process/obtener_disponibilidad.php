<?php

include '../config/database.php';

$destino = $_GET['destino'] ?? '';
$fecha = $_GET['fecha'] ?? '';

/* ========================= */
/* OBTENER FECHAS */
/* ========================= */

if($destino && !$fecha){

    $sql = "SELECT *
            FROM disponibilidad_experiencias
            WHERE id_experiencia = :destino
            AND cupos_disponibles > 0
            ORDER BY fecha_disponible ASC";

    $stmt = $conexion->prepare($sql);

    $stmt->bindParam(':destino', $destino);

    $stmt->execute();

    $fechas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');

    echo json_encode($fechas);

    exit();

}

/* ========================= */
/* OBTENER CUPOS */
/* ========================= */

if($destino && $fecha){

    $sql = "SELECT *
            FROM disponibilidad_experiencias
            WHERE id_experiencia = :destino
            AND fecha_disponible = :fecha
            LIMIT 1";

    $stmt = $conexion->prepare($sql);

    $stmt->bindParam(':destino', $destino);
    $stmt->bindParam(':fecha', $fecha);

    $stmt->execute();

    $dato = $stmt->fetch(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');

    echo json_encode($dato);

    exit();

}
?>