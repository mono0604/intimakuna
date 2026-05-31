<?php
session_start();
require '../../config/database.php';
$id = $_POST['id_evento'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha_evento'];

/* ========================= */
/* OBTENER EVENTO ACTUAL */
/* ========================= */
$sql_old = "SELECT imagen
            FROM eventos
            WHERE id_evento = :id";
$stmt_old = $conexion->prepare($sql_old);
$stmt_old->bindParam(':id', $id);
$stmt_old->execute();
$evento_old = $stmt_old->fetch(PDO::FETCH_ASSOC);
$imagen_actual = $evento_old['imagen'];

/* ========================= */
/* VALIDAR NUEVA IMAGEN */
/* ========================= */
if($_FILES['imagen']['name'] != ""){
    $nueva_imagen = time() . "_" . $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];
    move_uploaded_file(
        $tmp,
        "../assets/img/eventos/" . $nueva_imagen
    );

    /* ELIMINAR IMAGEN ANTERIOR */
    if(file_exists("../assets/img/eventos/" . $imagen_actual)){
        unlink("../assets/img/eventos/" . $imagen_actual);

    }
}else{
    $nueva_imagen = $imagen_actual;
}

/* ========================= */
/* ACTUALIZAR EVENTO */
/* ========================= */
$sql = "UPDATE eventos
        SET titulo = :titulo,
            descripcion = :descripcion,
            fecha_evento = :fecha_evento,
            imagen = :imagen
        WHERE id_evento = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':descripcion', $descripcion);
$stmt->bindParam(':fecha_evento', $fecha);
$stmt->bindParam(':imagen', $nueva_imagen);
$stmt->bindParam(':id', $id);
$stmt->execute();

/* REDIRECT */
header("Location: ../eventos.php");
exit();
?>