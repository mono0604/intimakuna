<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'dashboard';

/* ========================= */
/* CONTAR RESERVAS */
/* ========================= */

$sql_reservas = "SELECT COUNT(*) as total
                 FROM reservas";
$stmt_reservas = $conexion->prepare($sql_reservas);
$stmt_reservas->execute();
$total_reservas = $stmt_reservas->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* CONTAR MENSAJES */
/* ========================= */

$sql_mensajes = "SELECT COUNT(*) as total
                 FROM mensajes_contacto";
$stmt_mensajes = $conexion->prepare($sql_mensajes);
$stmt_mensajes->execute();
$total_mensajes = $stmt_mensajes->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* CONTAR EVENTOS */
/* ========================= */

$sql_eventos = "SELECT COUNT(*) as total
                FROM eventos";
$stmt_eventos = $conexion->prepare($sql_eventos);
$stmt_eventos->execute();
$total_eventos = $stmt_eventos->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* CONTAR IMAGENES */
/* ========================= */

$sql_imagenes = "SELECT COUNT(*) as total
                 FROM galeria_imagenes";
$stmt_imagenes = $conexion->prepare($sql_imagenes);
$stmt_imagenes->execute();
$total_imagenes = $stmt_imagenes->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* CONTAR VIDEOS */
/* ========================= */

$sql_videos = "SELECT COUNT(*) as total
               FROM galeria_videos";
$stmt_videos = $conexion->prepare($sql_videos);
$stmt_videos->execute();
$total_videos = $stmt_videos->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* CONTAR NOTICIAS */
/* ========================= */

$sql_noticias = "SELECT COUNT(*) as total
                 FROM noticias";
$stmt_noticias = $conexion->prepare($sql_noticias);
$stmt_noticias->execute();
$total_noticias = $stmt_noticias->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet"
          href="../assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
<div class="admin-panel">

  <?php include 'includes/sidebar.php'; ?>

    <!-- CONTENIDO -->
    <main class="admin-content">
        <div class="admin-topbar">
            <h1>
                Bienvenido, <?php echo $_SESSION['admin']; ?>
            </h1>
        </div>

        <!-- CARDS -->
        <div class="dashboard-cards">
            <!-- RESERVAS -->
            <div class="dashboard-card">
                <i class="fa-solid fa-calendar-check"></i>
                <h2>
                    <?php echo $total_reservas['total']; ?>
                </h2>
                <p>
                    Reservas
                </p>
            </div>

            <!-- MENSAJES -->
            <div class="dashboard-card">
                <i class="fa-solid fa-envelope"></i>
                <h2>
                    <?php echo $total_mensajes['total']; ?>
                </h2>
                <p>
                    Mensajes
                </p>
            </div>

            <!-- EVENTOS -->
            <div class="dashboard-card">
                <i class="fa-solid fa-calendar-days"></i>
                <h2>
                    <?php echo $total_eventos['total']; ?>
                </h2>
                <p>
                    Eventos
                </p>
            </div>

            <!-- IMAGENES -->
            <div class="dashboard-card">
                <i class="fa-solid fa-image"></i>
                <h2>
                    <?php echo $total_imagenes['total']; ?>
                </h2>
                <p>
                    Imágenes
                </p>
            </div>

            <!-- VIDEOS -->
            <div class="dashboard-card">
                <i class="fa-solid fa-video"></i>
                <h2>
                    <?php echo $total_videos['total']; ?>
                </h2>
                <p>
                    Videos
                </p>
            </div>

            <!-- NOTICIAS -->
            <div class="dashboard-card">
                <i class="fa-solid fa-newspaper"></i>
                <h2>
                    <?php echo $total_noticias['total']; ?>
                </h2>
                <p>
                    Noticias
                </p>
            </div>
        </div>
    </main>
</div>
<script src="includes/admin.js"></script>
</body>
</html>