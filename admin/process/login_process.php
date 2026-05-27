<?php
session_start();
require '../../config/database.php';
$usuario = $_POST['usuario'];
$password = $_POST['password'];

/* ========================= */
/* BUSCAR USUARIO */
/* ========================= */
$sql = "SELECT *
        FROM administradores
        WHERE usuario = :usuario";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* VALIDAR PASSWORD HASH */
/* ========================= */
if($admin && password_verify($password, $admin['password'])){
    $_SESSION['admin'] = $admin['usuario'];
    header("Location: ../dashboard.php");
    exit();
}else{
    header("Location: ../login.php?error=1");
    exit();
}
?>