<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(isset($_SESSION['admin'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet"
          href="../assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<section class="login-admin">
    <div class="login-container">
        <!-- IZQUIERDA -->
        <div class="login-info">
            <img src="../assets/img/login.jpg" alt="">
            <div class="login-overlay"></div>
            <div class="login-texto">
                <h1>
                    Panel Administrativo
                </h1>
                <p>
                    Fundación Indígena Intimakuna
                </p>
            </div>
        </div>

        <!-- DERECHA -->
        <div class="login-form-container">
            <form action="process/login_process.php"
                  method="POST"
                  class="login-form">
                <h2>Iniciar Sesión</h2>
                <input type="text"
                       name="usuario"
                       placeholder="Usuario"
                       required>
                <input type="password"
                       name="password"
                       placeholder="Contraseña"
                       required>
                <button type="submit" class="btn">
                    Ingresar
                </button>
            </form>
        </div>
    </div>
</section>

</body>
<a href="../index.php" class="btn-back">
    <i class="fa-solid fa-arrow-left"></i>
    Volver al sitio
</a>
</html>