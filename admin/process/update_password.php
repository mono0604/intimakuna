<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../../config/database.php';
if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}
$usuario = $_SESSION['admin'];
$actual = $_POST['actual'];
$nueva = $_POST['nueva'];
$confirmar = $_POST['confirmar'];

/* VALIDAR */
if($nueva !== $confirmar){
    header("Location: ../change_password.php?error=1");
    exit();
}

/* BUSCAR ADMIN */
$sql = "SELECT *
        FROM administradores
        WHERE usuario = :usuario";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

/* VALIDAR PASSWORD */
if(!$admin){
    die("Administrador no encontrado");
}

/* PASSWORD VERIFY */
if(!password_verify($actual, $admin['password'])){
    die("La contraseña actual no coincide");
}

/* NUEVO HASH */
$nuevo_hash = password_hash($nueva, PASSWORD_DEFAULT);

/* UPDATE */
$sql_update = "UPDATE administradores
               SET password = :password
               WHERE usuario = :usuario";
$stmt_update = $conexion->prepare($sql_update);
$stmt_update->bindParam(':password', $nuevo_hash);
$stmt_update->bindParam(':usuario', $usuario);
$stmt_update->execute();

/* REDIRECT */
header("Location: ../change_password.php?success=1");
exit();
?>