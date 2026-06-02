<?php
require 'config/database.php';
$sql = "SELECT * FROM eventos
        ORDER BY fecha_evento DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Eventos | Fundación Intimakuna</title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>



<!-- HERO -->
<section class="hero-general"
style="background-image:url('assets/img/eventos/portada_eventos.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>Eventos</h1>
        <p>
            Actividades culturales, comunitarias y turísticas.
        </p>
    </div>
</section>

<!-- EVENTOS -->
<section class="eventos-page">
    <div class="titulo">
        <h2>Próximos Eventos</h2>
        <p>
            Participa activamente de nustros eventos
        </p>
    </div>
    <div class="eventos-grid">
        <?php foreach($eventos as $evento): ?>
        <div class="evento-card">
            <img src="admin/assets/img/eventos/<?php echo $evento['imagen']; ?>"
                class="img-evento"
                onclick="abrirImagen(this.src)">
            <div class="evento-content"><br>
                <span class="fecha">
                    <i class="fa-solid fa-calendar-days"></i>
                    <?php echo $evento['fecha_evento']; ?>
                </span>
                <h3>
                    <?php echo $evento['titulo']; ?>
                </h3>
                <p>
                    <?php echo $evento['resumen']; ?>
                </p><br>
                <a href="detalle_evento.php?id=<?php echo $evento['id_evento']; ?>"
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