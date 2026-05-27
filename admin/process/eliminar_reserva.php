<?php
session_start();
require '../../config/database.php';
$id = $_GET['id'];

/* ========================= */
/* OBTENER RESERVA */
/* ========================= */
$sqlReserva = "SELECT *
               FROM reservas
               WHERE id_reserva = :id";
$stmtReserva = $conexion->prepare($sqlReserva);
$stmtReserva->bindParam(':id', $id);
$stmtReserva->execute();
$reserva = $stmtReserva->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* DEVOLVER CUPOS */
/* ========================= */
if($reserva['estado_reserva'] != 'cancelado'){
    $sqlCupos = "UPDATE disponibilidad_experiencias
    SET cupos_disponibles = cupos_disponibles + :cantidad
    WHERE experiencia = :destino
    AND fecha_disponible = :fecha";
    $stmtCupos = $conexion->prepare($sqlCupos);
    $stmtCupos->bindParam(':cantidad', $reserva['cantidad_personas']);
    $stmtCupos->bindParam(':destino', $reserva['destino']);
    $stmtCupos->bindParam(':fecha', $reserva['fecha_reserva']);
    $stmtCupos->execute();
}

/* ========================= */
/* ELIMINAR */
/* ========================= */
$sql = "DELETE FROM reservas
        WHERE id_reserva = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header("Location: ../reservas.php");
exit();
?>