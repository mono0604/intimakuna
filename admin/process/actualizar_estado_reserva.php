<?php
session_start();
require '../../config/database.php';
$id = $_POST['id_reserva'];
$nuevoEstado = $_POST['estado_reserva'];

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
/* CANCELAR Y ELIMINAR */
/* ========================= */
if($nuevoEstado == 'cancelado'){
    /* DEVOLVER CUPOS */
    $sqlCupos = "UPDATE disponibilidad_experiencias
    SET cupos_disponibles = cupos_disponibles + :cantidad
    WHERE experiencia = :destino
    AND fecha_disponible = :fecha";
    $stmtCupos = $conexion->prepare($sqlCupos);
    $stmtCupos->bindParam(':cantidad', $reserva['cantidad_personas']);
    $stmtCupos->bindParam(':destino', $reserva['destino']);
    $stmtCupos->bindParam(':fecha', $reserva['fecha_reserva']);
    $stmtCupos->execute();

    /* ELIMINAR RESERVA */
    $sqlDelete = "DELETE FROM reservas
                  WHERE id_reserva = :id";
    $stmtDelete = $conexion->prepare($sqlDelete);
    $stmtDelete->bindParam(':id', $id);
    $stmtDelete->execute();
}else{

    /* ACTUALIZAR NORMAL */
    $sql = "UPDATE reservas
            SET estado_reserva = :estado
            WHERE id_reserva = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':estado', $nuevoEstado);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
header("Location: ../reservas.php");
exit();
?>