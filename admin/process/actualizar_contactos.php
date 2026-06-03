<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

include '../../config/database.php';

/* ========================= */
/* VALIDAR DATOS */
/* ========================= */

$id_contacto = $_POST['id_contacto'];

$facebook  = trim($_POST['facebook']);
$instagram = trim($_POST['instagram']);
$youtube   = trim($_POST['youtube']);
$twitter   = trim($_POST['twitter']);

$telefono  = trim($_POST['telefono']);
$whatsapp  = trim($_POST['whatsapp']);
$direccion = trim($_POST['direccion']);
$correo    = trim($_POST['correo']);

/* ========================= */
/* ACTUALIZAR */
/* ========================= */

$sql = "UPDATE contactos
        SET
            facebook = :facebook,
            instagram = :instagram,
            youtube = :youtube,
            twitter = :twitter,
            telefono = :telefono,
            whatsapp = :whatsapp,
            direccion = :direccion,
            correo = :correo
        WHERE id_contacto = :id_contacto";

$stmt = $conexion->prepare($sql);

$stmt->bindParam(':facebook', $facebook);
$stmt->bindParam(':instagram', $instagram);
$stmt->bindParam(':youtube', $youtube);
$stmt->bindParam(':twitter', $twitter);

$stmt->bindParam(':telefono', $telefono);
$stmt->bindParam(':whatsapp', $whatsapp);
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':correo', $correo);

$stmt->bindParam(':id_contacto', $id_contacto);

if($stmt->execute()){

    header("Location: ../editar_contacto.php?success=1");
    exit();

}else{

    header("Location: ../editar_contacto.php?error=1");
    exit();

}
?>