<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
$pagina_actual = 'noticias';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Agregar Noticia</title>
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
        <div class="admin-topbar">
            <h1>
                Agregar Nueva Noticia
            </h1>
        </div>
        <!-- FORMULARIO -->
        <form action="process/guardar_noticia.php"
              method="POST"
              enctype="multipart/form-data"
              class="form-admin">

            <!-- TITULO -->
            <div class="form-group">
                <label>
                    Título
                </label>
                <input type="text"
                       name="titulo"
                       required>
            </div>

            <!-- RESUMEN -->
            <div class="form-group">
                <label>
                    Resumen
                </label>
                <textarea name="resumen"
                          rows="4"
                          required></textarea>
            </div>

            <!-- CONTENIDO -->
            <div class="form-group">
                <label>
                    Contenido Completo
                </label>
                <textarea name="contenido"
                          rows="10"
                          required></textarea>
            </div>

            <!-- CATEGORIA -->
            <div class="form-group">
                <label>
                    Categoría
                </label>

                <select name="categoria" required>
                    <option value="">
                        Seleccione una categoría
                    </option>
                    <option value="Noticia">
                        Noticia
                    </option>
                    <option value="Convocatoria">
                        Convocatoria
                    </option>
                </select>
            </div>

            <!-- IMAGEN -->
            <div class="form-group">
                <label>
                    Imagen
                </label>
                <input type="file"
                       name="imagen"
                       accept="image/*"
                       required>
            </div>

            <!-- BOTON -->
            <button type="submit"
                    class="btn">
                <i class="fa-solid fa-floppy-disk"></i>
                Publicar Noticia
            </button>
        </form>
    </main>
</div>
</body>
</html>