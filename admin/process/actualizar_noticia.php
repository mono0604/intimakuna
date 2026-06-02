<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

require '../../config/database.php';
/* ========================= */
/* DATOS */
/* ========================= */

$id = $_POST['id_noticia'];
$titulo = $_POST['titulo'];
$resumen = $_POST['resumen'];
$contenido = $_POST['contenido'];
$categoria = $_POST['categoria'];
$fecha_publicacion = $_POST['fecha_publicacion'];
/* ========================= */
/* OBTENER IMAGEN ACTUAL */
/* ========================= */
$sql_img = "SELECT imagen
            FROM noticias
            WHERE id_noticia = :id";
$stmt_img = $conexion->prepare($sql_img);
$stmt_img->bindParam(':id', $id);
$stmt_img->execute();
$noticia = $stmt_img->fetch(PDO::FETCH_ASSOC);
$imagen_actual = $noticia['imagen'];

/* ========================= */
/* VALIDAR NUEVA IMAGEN */
/* ========================= */

if(!empty($_FILES['imagen']['name'])){
    $imagen = time() . "_" . $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];
    move_uploaded_file(
        $tmp,
        "../assets/img/noticias/" . $imagen
    );
    /* ELIMINAR ANTERIOR */
    $ruta_anterior = "../assets/img/noticias/" . $imagen_actual;
    if(file_exists($ruta_anterior)){
        unlink($ruta_anterior);
    }
}else{
    $imagen = $imagen_actual;
}

/* ========================= */
/* ACTUALIZAR */
/* ========================= */

$sql = "UPDATE noticias
        SET titulo = :titulo,
            resumen = :resumen,
            contenido = :contenido,
            categoria = :categoria,
            imagen = :imagen,
            fecha_publicacion = :fecha_publicacion
        WHERE id_noticia = :id";

$stmt = $conexion->prepare($sql);

$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':resumen', $resumen);
$stmt->bindParam(':contenido', $contenido);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':fecha_publicacion', $fecha_publicacion);
$stmt->bindParam(':id', $id);

$stmt->execute();

header("Location: ../noticias.php?editado=1");
exit();
?>