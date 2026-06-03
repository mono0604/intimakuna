<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'eventos';
$sql = "SELECT * FROM eventos ORDER BY id_evento DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Eventos Admin</title>
    <link rel="stylesheet"
          href="../assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
<div class="admin-panel">

    <!-- SIDEBAR -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- CONTENIDO -->
    <main class="admin-content">
        <!-- TOPBAR -->
        <div class="admin-topbar">
            <h1>
                Gestión de Eventos
            </h1>
            <a href="agregar_evento.php"
               class="btn">
                <i class="fa-solid fa-plus"></i>
                Nuevo Evento
            </a>
        </div>
     
        <!-- TABLA -->
        <div class="table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($eventos as $evento): ?>
                    <tr>
                        <td>
                            <?php echo $evento['id_evento']; ?>
                        </td>
                        <td>
                            <img src="assets/img/eventos/<?php echo $evento['imagen']; ?>"
                                 class="admin-img">
                        </td>
                        <td>
                            <?php echo $evento['titulo']; ?>
                        </td>
                        <td>
                            <?php echo $evento['resumen']; ?>
                        </td>
                        <td>
                            <?php echo $evento['fecha_evento']; ?>
                        </td>
                        <td>
                              <!-- EDITAR -->
                            <a href="editar_evento.php?id=<?php echo $evento['id_evento']; ?>"
                                class="btn">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <!-- ELIMINAR -->
                            <a href="process/eliminar_evento.php?id=<?php echo $evento['id_evento']; ?>"
                                class="btn-delete"
                                onclick="return confirm('¿Deseas eliminar estr evento?')">
                                <i class="fa-solid fa-trash"></i>
                            </a>    
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
<script src="includes/admin.js"></script>
</body>
</html>