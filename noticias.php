<?php
require 'config/database.php';
$sql = "SELECT *
        FROM noticias
        ORDER BY fecha_publicacion DESC";
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
    <title>Noticias | Fundación Intimakuna</title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<?php include 'includes/header.php'; ?>

<!-- HERO -->
<section class="hero-general"
style="background-image:url('assets/img/admin/noticias/portada_noticias.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>
            Noticias y Convocatorias
        </h1>
        <p>
            Mantente informado sobre actividades,
            convocatorias y novedades institucionales.
        </p>
    </div>
</section>

<!-- NOTICIAS -->
<section class="noticias-page">
    <div class="titulo">
        <h2>
            Últimas Publicaciones
        </h2>
    </div>

    <div class="noticias-grid">
        <?php foreach($noticias as $noticia): ?>
        <div class="noticia-card">
            <img src="assets/img/admin/noticias/<?php echo $noticia['imagen']; ?>"
                 alt="">
            <div class="noticia-content">
                <span class="categoria-noticia">
                    <?php echo $noticia['categoria']; ?>
                </span>
                <h3>
                    <?php echo $noticia['titulo']; ?>
                </h3>
                <p>
                    <?php echo $noticia['resumen']; ?>
                </p>
                <a href="noticia.php?id=<?php echo $noticia['id_noticia']; ?>"
                   class="btn">
                    Leer Más
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>