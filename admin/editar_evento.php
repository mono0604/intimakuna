<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'eventos';
$id = $_GET['id'];

/* ========================= */
/* OBTENER EVENTO */
/* ========================= */
$sql = "SELECT *
        FROM eventos
        WHERE id_evento = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$evento = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$evento){
    die("Evento no encontrado");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
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
                Editar Evento
            </h1>
        </div>

        <!-- FORM -->

        <div class="form-admin-container">
            <form action="process/actualizar_evento.php"
                  method="POST"
                  enctype="multipart/form-data">

                <!-- ID -->
                <input type="hidden"
                       name="id_evento"
                       value="<?php echo $evento['id_evento']; ?>">

                <!-- TITULO -->
                <div class="form-group">
                    <label>
                        Título
                    </label>
                    <input type="text"
                           name="titulo"
                           value="<?php echo $evento['titulo']; ?>"
                           required>
                </div>
                <div class="form-group">
                    <label>Resumen</label>
                    <input type="text"
                            name="resumen"
                            rows="3"
                            value="<?php echo $evento['resumen']; ?>"
                            required>
                </div>
                <!-- DESCRIPCION -->
                <div class="form-group">
                    <label>
                        Descripción
                    </label>
                    <textarea name="descripcion"
                            id="editor"
                            rows="6"
                            required><?php echo $evento['descripcion']; ?></textarea>
                </div>

                <!-- FECHA -->
                <div class="form-group">

                    <label>
                        Fecha del Evento
                    </label>

                    <input type="date"
                           name="fecha_evento"
                           value="<?php echo $evento['fecha_evento']; ?>"
                           required>

                </div>

                <!-- IMAGEN ACTUAL -->
                <div class="form-group">
                    <label>
                        Imagen Actual
                    </label>

                    <br><br>
                    <img src="assets/img/eventos/<?php echo $evento['imagen']; ?>"
                         class="preview-admin-img">
                </div>

                <!-- NUEVA IMAGEN -->
                <div class="form-group">
                    <label>
                        Cambiar Imagen
                    </label>

                    <input type="file"
                           name="imagen">

                </div>

                <!-- BOTON -->
                <button type="submit"
                        class="btn">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Actualizar Evento
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