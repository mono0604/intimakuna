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
        <?php foreach($videos as $video): ?>
        <div class="video-card">
            <iframe src="<?php echo $video['url_video']; ?>"
                    title="<?php echo $video['titulo']; ?>"
                    allowfullscreen></iframe>
        </div>
        <?php endforeach; ?>
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
    <div class="imagenes-grid">
        <?php foreach($imagenes as $img): ?>
        <div class="imagen-item">
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
</section>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>

</body>
</html>