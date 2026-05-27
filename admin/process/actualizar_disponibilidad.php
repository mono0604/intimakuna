<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

require '../../config/database.php';

/* ========================= */
/* OBTENER DATOS */
/* ========================= */

$id = $_POST['id_disponibilidad'];

$experiencia = $_POST['experiencia'];

$fecha = $_POST['fecha_disponible'];

$cupos_totales = $_POST['cupos_totales'];

$cupos_disponibles = $_POST['cupos_disponibles'];

/* ========================= */
/* ACTUALIZAR */
/* ========================= */
$sql = "UPDATE disponibilidad_experiencias
SET
    experiencia = :experiencia,
    fecha_disponible = :fecha,
    cupos_totales = :cupos_totales,
    cupos_disponibles = :cupos_disponibles
WHERE id_disponibilidad = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':experiencia', $experiencia);
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':cupos_totales', $cupos_totales);
$stmt->bindParam(':cupos_disponibles', $cupos_disponibles);
$stmt->bindParam(':id', $id);
$stmt->execute();

/* ========================= */
/* REDIRECCIONAR */
/* ========================= */
header("Location: ../disponibilidad.php");
exit();
?>