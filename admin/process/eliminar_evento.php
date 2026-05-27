<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../../config/database.php';
if(!isset($_GET['id'])){
    die("ID no recibido");
}
$id = $_GET['id'];
/* ========================= */
/* OBTENER IMAGEN */
/* ========================= */
$sql_img = "SELECT * FROM eventos
            WHERE id_evento = :id";
$stmt_img = $conexion->prepare($sql_img);
$stmt_img->bindParam(':id', $id);
$stmt_img->execute();
$evento = $stmt_img->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* ELIMINAR IMAGEN */
/* ========================= */
if($evento){
    $ruta_imagen = "../../assets/img/admin/eventos/" . $evento['imagen'];
    if(file_exists($ruta_imagen)){
        unlink($ruta_imagen);
    }
}

/* ========================= */
/* ELIMINAR EVENTO */
/* ========================= */
$sql = "DELETE FROM eventos
        WHERE id_evento = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
if($stmt->execute()){
    header("Location: ../eventos.php");
}else{
    echo "Error al eliminar";
}
?>