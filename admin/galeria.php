<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'galeria';
/* IMAGENES */
$sql_img = "SELECT * FROM galeria_imagenes
            ORDER BY id_imagen DESC";
$stmt_img = $conexion->prepare($sql_img);
$stmt_img->execute();
$imagenes = $stmt_img->fetchAll(PDO::FETCH_ASSOC);

/* VIDEOS */
$sql_vid = "SELECT * FROM galeria_videos
            ORDER BY id_video DESC";
$stmt_vid = $conexion->prepare($sql_vid);
$stmt_vid->execute();
$videos = $stmt_vid->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Galería Admin</title>
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
                Gestión de Galería
            </h1>
        </div>

        <!-- SUBIR IMAGEN -->
        <div class="admin-form-box">
            <h2>Agregar Imagen</h2>
            <form action="process/guardar_imagen.php"
                  method="POST"
                  enctype="multipart/form-data"
                  class="admin-form">
                <input type="text"
                       name="titulo"
                       placeholder="Título imagen"
                       required>
                <input type="file"
                       name="imagen"
                       required>
                <button type="submit" class="btn">
                    Subir Imagen
                </button>
            </form>
        </div>

        <!-- AGREGAR VIDEO -->
        <div class="admin-form-box">
            <h2>Agregar Video YouTube</h2>
            <form action="process/guardar_video.php"
                  method="POST"
                  class="admin-form">
                <input type="text"
                       name="titulo"
                       placeholder="Título video"
                       required>
                <input type="text"
                       name="url_video"
                       placeholder="URL embed YouTube"
                       required>
                <button type="submit" class="btn">
                    Guardar Video
                </button>
            </form>
        </div>

        <!-- IMAGENES -->
<div class="table-container">
    <h2>Imágenes</h2>
    <div id="contenedorImagenesAdmin">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($imagenes as $index => $img): ?>
                <tr class="fila-imagen-admin <?php echo $index >= 5 ? 'imagen-oculta' : ''; ?>">
                    <td>
                        <?php echo $img['id_imagen']; ?>
                    </td>
                    <td>
                        <img src="assets/img/galeria/<?php echo $img['imagen']; ?>"
                             class="admin-img">
                    </td>
                    <td>
                        <?php echo $img['titulo']; ?>
                    </td>
                    <td>
                        <a href="process/eliminar_imagen.php?id=<?php echo $img['id_imagen']; ?>"
                           class="btn-delete">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if(count($imagenes) > 5): ?>
    <div class="btn-ver-mas-container">
        <button id="btnImagenesAdmin"
                class="btn"
                data-expandido="false">
            Ver más imágenes
        </button>
    </div>
    <?php endif; ?>
</div>

        <!-- VIDEOS -->
<div class="table-container">
    <h2>Videos</h2>
    <div id="contenedorVideosAdmin">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>URL</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($videos as $index => $video): ?>
                <tr class="fila-video-admin <?php echo $index >= 5 ? 'video-oculto' : ''; ?>">
                    <td>
                        <?php echo $video['id_video']; ?>
                    </td>
                    <td>
                        <?php echo $video['titulo']; ?>
                    </td>
                    <td>
                        <?php echo $video['url_video']; ?>
                    </td>
                    <td>
                        <a href="process/eliminar_video.php?id=<?php echo $video['id_video']; ?>"
                           class="btn-delete">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if(count($videos) > 5): ?>
    <div class="btn-ver-mas-container">
        <button id="btnVideosAdmin"
                class="btn"
                data-expandido="false">   
            Ver más videos
        </button>
    </div>
    <?php endif; ?>
</div>
</main>
</div>

<script>
/* ========================= */
/* VIDEOS ADMIN */
/* ========================= */

const filasVideos = document.querySelectorAll('.fila-video-admin');
const btnVideosAdmin = document.getElementById('btnVideosAdmin');
if(btnVideosAdmin){
    btnVideosAdmin.addEventListener('click', () => {
        const expandido = btnVideosAdmin.dataset.expandido === 'true';
        if(!expandido){
            filasVideos.forEach(fila => {
                fila.classList.remove('video-oculto');
            });
            btnVideosAdmin.innerHTML = 'Ver menos videos';
            btnVideosAdmin.dataset.expandido = 'true';
        }else{
            filasVideos.forEach((fila, index) => {
                if(index >= 5){
                    fila.classList.add('video-oculto');
                }
            });
            btnVideosAdmin.innerHTML = 'Ver más videos';
            btnVideosAdmin.dataset.expandido = 'false';
        }
    });
}

/* ========================= */
/* IMAGENES ADMIN */
/* ========================= */
const filasImagenes = document.querySelectorAll('.fila-imagen-admin');
const btnImagenesAdmin = document.getElementById('btnImagenesAdmin');
if(btnImagenesAdmin){
    btnImagenesAdmin.addEventListener('click', () => {
        const expandido = btnImagenesAdmin.dataset.expandido === 'true';
        if(!expandido){
            filasImagenes.forEach(fila => {
                fila.classList.remove('imagen-oculta');
            });
            btnImagenesAdmin.innerHTML = 'Ver menos imágenes';
            btnImagenesAdmin.dataset.expandido = 'true';
        }else{
            filasImagenes.forEach((fila, index) => {
                if(index >= 5){
                    fila.classList.add('imagen-oculta');
                }
            });
            btnImagenesAdmin.innerHTML = 'Ver más imágenes';
            btnImagenesAdmin.dataset.expandido = 'false';
        }
    });
}

</script>
</body>
</html>