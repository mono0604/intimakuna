<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
$pagina_actual = 'eventos';
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
        <div class="admin-form-box">
            <form action="process/guardar_evento.php"
                method="POST"
                enctype="multipart/form-data"
                class="admin-form">

                <!-- TITULO -->
                <input type="text"
                    name="titulo"
                    placeholder="Título del evento"
                    required>

                <!-- RESUMEN -->
                <textarea name="resumen"
                        placeholder="Resumen corto del evento"
                        required></textarea>

                <!-- DESCRIPCION COMPLETA -->
                <textarea name="descripcion"
                    id="editor"
                    placeholder="Descripción completa, reglas, criterios, cláusulas..."
                    rows="10"></textarea>
                        
                <!-- FECHA -->
                <input type="date"
                    name="fecha_evento"
                    required>

                <!-- IMAGEN -->
                <input type="file"
                    name="imagen"
                    required>

                <!-- PDFS -->
                <label>
                    Archivos PDF del evento
                </label>

                <input type="file"
                    name="archivos[]"
                    multiple
                    accept=".pdf">

                <button type="submit"
                        class="btn">
                    Crear Evento
                </button>
            </form>
        </div>
    </main>
</div>

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>

ClassicEditor
.create(document.querySelector('#editor'))
.catch(error => {
    console.error(error);
});

</script>
</body>
</html>