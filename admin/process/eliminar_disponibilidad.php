<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}
require '../../config/database.php';

/* ========================= */
/* VALIDAR ID */
/* ========================= */
if(!isset($_GET['id'])){

    header("Location: ../disponibilidad.php");
    exit();
}
$id = $_GET['id'];
/* ========================= */
/* ELIMINAR */
/* ========================= */

$sql = "DELETE FROM disponibilidad_experiencias
        WHERE id_disponibilidad = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

/* ========================= */
/* REDIRECCIONAR */
/* ========================= */
header("Location: ../disponibilidad.php");
exit();
?>