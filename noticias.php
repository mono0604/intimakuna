<?php
require 'config/database.php';
$sql = "SELECT *
        FROM noticias
        ORDER BY fecha_publicacion DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include 'includes/header.php'; ?>
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


<!-- HERO -->
<section class="hero-general"
style="background-image:url('assets/img/noticias/portada_noticias.jpg');">
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
        <div class="evento-card">
            <img src="admin/assets/img/noticias/<?php echo $noticia['imagen']; ?>"
                 alt=""
                 onclick="abrirImagen(this.src)">
            <div class="evento-content"><br>
                <span class="categoria-noticia">
                    <?php echo $noticia['categoria']; ?>
                </span>
                <h3>
                    <?php echo $noticia['titulo']; ?>
                </h3>
                <p>
                    <?php echo $noticia['resumen']; ?>
                </p><br>
                <a href="detalle_noticia.php?id=<?php echo $noticia['id_noticia']; ?>"
                   class="btn">
                    Leer Más
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php include 'includes/footer.php'; ?>

<!-- MODAL IMAGEN -->
<div id="modalImagen" class="modal-imagen">
    <span class="cerrar-modal"
          onclick="cerrarImagen()">
        &times;
    </span>
    <img id="imagenExpandida">
</div>
<script>
function abrirImagen(src){
    document.getElementById("modalImagen").style.display = "flex";
    document.getElementById("imagenExpandida").src = src;
}
function cerrarImagen(){
    document.getElementById("modalImagen").style.display = "none";
}
</script>

</body>
</html>