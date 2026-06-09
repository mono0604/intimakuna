<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$id = $_GET['id'];

/* ========================= */
/* CONSULTAR NOTICIA */
/* ========================= */
$sql = "SELECT *
        FROM noticias
        WHERE id_noticia = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$noticia = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$noticia){
    header("Location: noticias.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Editar Noticia</title>
    <link rel="stylesheet"
          href="../assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
<div class="admin-panel">

    <?php include 'includes/sidebar.php'; ?>
    
    <main class="admin-content">
        <div class="admin-topbar">
            <h1>Editar Noticia</h1>
        </div>
        <div class="form-admin-container">
            <form action="process/actualizar_noticia.php"
                  method="POST"
                  enctype="multipart/form-data"
                  class="form-admin">
                <input type="hidden"
                       name="id_noticia"
                       value="<?php echo $noticia['id_noticia']; ?>">
                <!-- TITULO -->
                <div class="form-group">
                    <label>Título</label>
                    <input type="text"
                           name="titulo"
                           value="<?php echo $noticia['titulo']; ?>"
                           required>
                </div>
                <!-- RESUMEN -->
                <div class="form-group">
                    <label>Resumen</label>
                    <textarea name="resumen"
                              rows="3"
                              required><?php echo $noticia['resumen']; ?></textarea>
                </div>
                <!-- CONTENIDO -->
                <div class="form-group">
                    <label>Contenido</label>
                    <textarea name="contenido"
                              rows="8"
                              required><?php echo $noticia['contenido']; ?></textarea>
                </div>
                <!-- CATEGORIA -->
                <div class="form-group">
                    <label>Categoría</label>
                    <select name="categoria" required>
                        <option value="Noticias"
                            <?php if($noticia['categoria'] == 'Noticias') echo 'selected'; ?>>
                            Noticias
                        </option>
                        <option value="Convocatorias"
                            <?php if($noticia['categoria'] == 'Convocatorias') echo 'selected'; ?>>
                            Convocatorias
                        </option>
                    </select>
                </div>
                <!-- FECHA -->
                <div class="form-group">
                    <label>Fecha de Publicación</label>
                    <input type="date"
                           name="fecha_publicacion"
                           value="<?php echo $noticia['fecha_publicacion']; ?>"
                           required>
                </div>
                <!-- IMAGEN ACTUAL -->
                <div class="form-group">
                    <label>Imagen Actual</label>
                    <img src="assets/img/noticias/<?php echo $noticia['imagen']; ?>"
                         class="preview-admin-img">
                </div>

                <!-- NUEVA IMAGEN -->
                <div class="form-group">
                    <label>Nueva Imagen (Opcional)</label>
                    <input type="file"
                           name="imagen"
                           accept="image/*">
                </div>
                
                <!-- BOTON -->
                <button type="submit"
                        class="btn">
                    Actualizar Noticia
                </button>
            </form>
        </div>
    </main>
</div>
</body>
</html>