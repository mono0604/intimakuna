<?php
require 'config/database.php';

/* ========================= */
/* IMAGENES */
/* ========================= */
$sql_img = "SELECT * FROM galeria_imagenes
            ORDER BY id_imagen DESC";
$stmt_img = $conexion->prepare($sql_img);
$stmt_img->execute();
$imagenes = $stmt_img->fetchAll(PDO::FETCH_ASSOC);

/* ========================= */
/* VIDEOS */
/* ========================= */
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
    <title>Galería | Fundación Intimakuna</title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<!-- HEADER -->
<?php include 'includes/header.php'; ?>

<!-- HERO -->
<section class="hero-general"
style="background-image:url('assets/img/galeria/portada_galeria.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>Galería Multimedia</h1>
        <p>
            Explora fotografías, videos y experiencias
            culturales de la Fundación Intimakuna.
        </p>
    </div>
</section>

<!-- VIDEOS -->
<section class="galeria-videos">
    <div class="titulo">
        <h2>Videos Destacados</h2>
        <p>
            Descubre actividades, recorridos y experiencias
            audiovisuales de nuestra comunidad.
        </p>
    </div>
    <div class="videos-galeria-grid">
        <?php foreach($videos as $index => $video): ?>
        <div class="video-card extra-video <?php echo $index >= 2 ? 'oculto' : ''; ?>">
            <iframe src="<?php echo $video['url_video']; ?>"
                    title="<?php echo $video['titulo']; ?>"
                    allowfullscreen></iframe>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="btn-ver-mas-container">
        <button class="btn"
                onclick="mostrarVideos()"
                id="btnVideos">
            Ver más videos
        </button>
    </div>
</section>

<!-- GALERIA IMAGENES -->
<section class="imagenes-galeria">
    <div class="titulo">
        <h2>Galería Fotográfica</h2>
        <p>
            Momentos, cultura, territorio y experiencias
            compartidas por nuestra comunidad.
        </p>
    </div>
    <div class="imagenes-grid" id="imagenesContainer">
        <?php foreach($imagenes as $index => $img): ?>
        <div class="imagen-item extra-imagen <?php echo $index >= 6 ? 'oculto' : ''; ?>">
            <img src="assets/img/admin/galeria/<?php echo $img['imagen']; ?>"
                 alt="">
            <div class="imagen-overlay">
                <h3>
                    <?php echo $img['titulo']; ?>
                </h3>
            </div>
        </div>
        <?php endforeach; ?>
    </div>  
    <div class="btn-ver-mas-container">
        <button class="btn"
                onclick="mostrarImagenes()"
                id="btnImagenes">
            Ver más imágenes
        </button>
    </div>
</section>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>

<script>

/* ========================= */
/* VIDEOS */
/* ========================= */
const videos = document.querySelectorAll('.video-card');
const btnVideos = document.getElementById('btnVideos');
function mostrarVideosIniciales(){
    videos.forEach((video, index) => {
        if(index < 3){
            video.classList.remove('video-oculto');
        }else{
            video.classList.add('video-oculto');
        }
    });
}
mostrarVideosIniciales();
btnVideos.addEventListener('click', () => {
    const expandido = btnVideos.dataset.expandido === 'true';
    if(!expandido){
        videos.forEach(video => {
            video.classList.remove('video-oculto');
        });
        btnVideos.innerHTML = 'Ver menos videos';
        btnVideos.dataset.expandido = 'true';
    }else{
        mostrarVideosIniciales();
        btnVideos.innerHTML = 'Ver más videos';
        btnVideos.dataset.expandido = 'false';
    }
});

/* ========================= */
/* IMAGENES */
/* ========================= */

const imagenes = document.querySelectorAll('.imagen-item');
const btnImagenes = document.getElementById('btnImagenes');

function mostrarImagenesIniciales(){
    imagenes.forEach((img, index) => {
        if(index < 6){
            img.classList.remove('imagen-oculta');
        }else{
            img.classList.add('imagen-oculta');
        }
    });
}
mostrarImagenesIniciales();
btnImagenes.addEventListener('click', () => {
    const expandido = btnImagenes.dataset.expandido === 'true';
    if(!expandido){
        imagenes.forEach(img => {
            img.classList.remove('imagen-oculta');
        });
        btnImagenes.innerHTML = 'Ver menos imágenes';
        btnImagenes.dataset.expandido = 'true';
    }else{
        mostrarImagenesIniciales();
        btnImagenes.innerHTML = 'Ver más imágenes';
        btnImagenes.dataset.expandido = 'false';
    }
});

</script>


</body>
</html>