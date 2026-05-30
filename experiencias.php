<?php
require 'config/database.php';
$sql = "SELECT * FROM experiencias
        ORDER BY titulo DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$experiencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>experiencias | Fundación Intimakuna</title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<?php include 'includes/header.php'; ?>

<!-- HERO -->
<section class="hero-general"
style="background-image:url('assets/img/experiencias/experiencias_portada.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>experiencias</h1>
        <p>
            Actividades culturales, comunitarias y turísticas.
        </p>
    </div>
</section>

<!-- EXPERIENCIAS -->
<section class="eventos-page">
    <div class="titulo">
        <h2>Experiencias</h2>
        <p>
            Descubre nuestras actividades y experiencias.
        </p>
    </div>
    <div class="eventos-grid">
        <?php foreach($experiencias as $experiencia): ?>
        <div class="evento-card">
            <img src="admin/assets/img/experiencias/<?php echo $experiencia['imagen']; ?>"
                class="img-evento"
                onclick="abrirImagen(this.src)">
            <div class="evento-content"><br>
                <span class="fecha">
                    <?php echo $experiencia['titulo']; ?>
                </span>
                <a>
                    <?php echo $experiencia['resumen']; ?>
                </a>
                <h3>
                    Duracion: <?php echo $experiencia['duracion']; ?>
                </h3>
                <h3>
                    $ <?php echo number_format($experiencia['precio'], 0, ',', '.'); ?>
                </h3>
                <a href="detalle_experiencia.php?id=<?php echo $experiencia['id_experiencia']; ?>"
                class="btn">
                    Ver Más
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