<?php
session_start();
require '../../config/database.php';
$titulo = $_POST['titulo'];
$imagen = $_FILES['imagen']['name'];
$tmp = $_FILES['imagen']['tmp_name'];
move_uploaded_file(
    $tmp,
    "../assets/img/galeria/" . $imagen
);

$sql = "INSERT INTO galeria_imagenes(
            titulo,
            imagen
        )
        VALUES(
            :titulo,
            :imagen
        )";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':imagen', $imagen);
$stmt->execute();
header("Location: ../galeria.php");