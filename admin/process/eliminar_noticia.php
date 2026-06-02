<?php
session_start();
require '../../config/database.php';
$id = $_GET['id'];

/* ========================= */
/* OBTENER IMAGEN */
/* ========================= */
$sql_img = "SELECT imagen
            FROM noticias
            WHERE id_noticia = :id";
$stmt_img = $conexion->prepare($sql_img);
$stmt_img->bindParam(':id', $id);
$stmt_img->execute();
$noticia = $stmt_img->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* ELIMINAR IMAGEN */
/* ========================= */
if($noticia){
    $ruta = "../assets/img/noticias/" . $noticia['imagen'];
    if(file_exists($ruta)){
        unlink($ruta);
    }
}
/* ========================= */
/* ELIMINAR NOTICIA */
/* ========================= */
$sql = "DELETE FROM noticias
        WHERE id_noticia = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

/* ========================= */
/* REDIRECCION */
/* ========================= */
header("Location: ../noticias.php");
exit();
?>