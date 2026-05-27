<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'noticias';
$sql = "SELECT *
        FROM noticias
        ORDER BY id_noticia DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Noticias | Admin</title>
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
                Gestión de Noticias
            </h1>
            <a href="agregar_noticia.php"
               class="btn">
                <i class="fa-solid fa-plus"></i>
                Nueva Noticia
            </a>
        </div>

        <!-- TABLA -->
        <div class="admin-tabla-container">
            <table class="admin-tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($noticias as $noticia){ ?>

                    <tr>
                        <td>
                            <?php echo $noticia['id_noticia']; ?>
                        </td>
                        <td>

                            <img src="../assets/img/admin/noticias/<?php echo $noticia['imagen']; ?>"
                                 class="tabla-img">
                        </td>
                        <td>
                            <?php echo $noticia['titulo']; ?>
                        </td>
                        <td>
                            <?php echo $noticia['categoria']; ?>
                        </td>
                        <td>
                            <?php echo $noticia['fecha_publicacion']; ?>
                        </td>
                        <td>
                            <div class="acciones-admin">

                                <!-- EDITAR -->
                                <a href="editar_noticia.php?id=<?php echo $noticia['id_noticia']; ?>"
                                   class="btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <!-- ELIMINAR -->
                                <a href="process/eliminar_noticia.php?id=<?php echo $noticia['id_noticia']; ?>"
                                   class="btn-delete"
                                   onclick="return confirm('¿Deseas eliminar esta noticia?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>