<?php
session_start();
require '../../config/database.php';
$id = $_GET['id'];
$sql_img = "SELECT * FROM galeria_imagenes
            WHERE id_imagen = :id";
$stmt_img = $conexion->prepare($sql_img);
$stmt_img->bindParam(':id', $id);
$stmt_img->execute();
$img = $stmt_img->fetch(PDO::FETCH_ASSOC);
if($img){
    $ruta = "../assets/img/galeria/" . $img['imagen'];
    if(file_exists($ruta)){
        unlink($ruta);
    }
}
$sql = "DELETE FROM galeria_imagenes
        WHERE id_imagen = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header("Location: ../galeria.php");