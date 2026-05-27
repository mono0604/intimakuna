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
$titulo = $_POST['titulo'];
$resumen = $_POST['resumen'];
$contenido = $_POST['contenido'];
$categoria = $_POST['categoria'];

/* ========================= */
/* SUBIR IMAGEN */
/* ========================= */
$imagen = $_FILES['imagen']['name'];
$tmp = $_FILES['imagen']['tmp_name'];
$ruta = "../../assets/img/admin/noticias/" . $imagen;
move_uploaded_file($tmp, $ruta);

/* ========================= */
/* GUARDAR EN BD */
/* ========================= */
$sql = "INSERT INTO noticias(
            titulo,
            resumen,
            contenido,
            categoria,
            imagen
        )
        VALUES(
            :titulo,
            :resumen,
            :contenido,
            :categoria,
            :imagen
        )";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':resumen', $resumen);
$stmt->bindParam(':contenido', $contenido);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':imagen', $imagen);
$stmt->execute();

/* ========================= */
/* REDIRECCIONAR */
/* ========================= */
header("Location: ../noticias.php");
?>