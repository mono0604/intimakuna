<?php
session_start();
require '../../config/database.php';

/* ========================= */
/* DATOS */
/* ========================= */
$titulo = $_POST['titulo'];
$resumen = $_POST['resumen'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha_evento'];

/* ========================= */
/* IMAGEN */
/* ========================= */
$imagen = $_FILES['imagen']['name'];
$tmp = $_FILES['imagen']['tmp_name'];
move_uploaded_file(
    $tmp,
    "../assets/img/eventos/" . $imagen
);

/* ========================= */
/* GUARDAR EVENTO */
/* ========================= */
$sql = "INSERT INTO eventos(
            titulo,
            resumen,
            descripcion,
            fecha_evento,
            imagen
        )
        VALUES(
            :titulo,
            :resumen,
            :descripcion,
            :fecha_evento,
            :imagen
        )
        RETURNING id_evento";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':resumen', $resumen);
$stmt->bindParam(':descripcion', $descripcion);
$stmt->bindParam(':fecha_evento', $fecha);
$stmt->bindParam(':imagen', $imagen);
$stmt->execute();

/* ========================= */
/* OBTENER ID EVENTO */
/* ========================= */
$id_evento = $stmt->fetchColumn();

/* ========================= */
/* SUBIR PDFs */
/* ========================= */
if(!empty($_FILES['archivos']['name'][0])){
    foreach($_FILES['archivos']['name'] as $key => $archivoNombre){
        $tmpArchivo = $_FILES['archivos']['tmp_name'][$key];

        /* MOVER PDF */
        move_uploaded_file(
            $tmpArchivo,
            "../assets/docs/eventos/" . $archivoNombre
        );

        /* GUARDAR EN BD */
        $sqlArchivo = "INSERT INTO archivos_eventos(
                            id_evento,
                            nombre_archivo,
                            archivo_pdf
                        )
                        VALUES(
                            :id_evento,
                            :nombre_archivo,
                            :archivo_pdf
                        )";

        $stmtArchivo = $conexion->prepare($sqlArchivo);
        $stmtArchivo->bindParam(':id_evento', $id_evento);
        $stmtArchivo->bindParam(':nombre_archivo', $archivoNombre);
        $stmtArchivo->bindParam(':archivo_pdf', $archivoNombre);
        $stmtArchivo->execute();
    }
}

/* ========================= */
/* REDIRECCION */
/* ========================= */
header("Location: ../eventos.php");
exit();
?>