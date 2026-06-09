<?php
require 'config/database.php';
$id = $_GET['id'];

/* ========================= */
/* EVENTO */
/* ========================= */
$sql = "SELECT *
        FROM eventos
        WHERE id_evento = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* ARCHIVOS PDF */
/* ========================= */
$sqlArchivos = "SELECT *
                FROM archivos_eventos
                WHERE id_evento = :id";
$stmtArchivos = $conexion->prepare($sqlArchivos);
$stmtArchivos->bindParam(':id', $id);
$stmtArchivos->execute();
$archivos = $stmtArchivos->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $evento['titulo']; ?>
    </title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>


<!-- HERO -->
<section class="hero-general"
style="background-image:url('admin/assets/img/eventos/<?php echo $evento['imagen']; ?>');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>
            <?php echo $evento['titulo']; ?>
        </h1>
        <p>
            <?php echo $evento['fecha_evento']; ?>
        </p>
    </div>
</section>

<!-- DETALLE -->
<section class="detalle-evento">
    <div class="detalle-container">

        <!-- DESCRIPCION -->
        <div class="detalle-texto">
            <h1>
                <strong><?php echo $evento['resumen']; ?></strong>
            </h1>
            <img src="admin/assets/img/eventos/<?php echo $evento['imagen']; ?>"
                class="img-evento"
                onclick="abrirImagen(this.src)">
            <h2>
                Información del Evento
            </h2>
            <p>
                <?php echo $evento['descripcion']; ?>
            </p>
        </div>
        <!-- ARCHIVOS -->
        <?php if(count($archivos) > 0): ?>
        <div class="documentos-evento">
            <h2>
                Archivos y Formularios
            </h2>
            <div class="documentos-grid">
                <?php foreach($archivos as $archivo): ?>
                <div class="documento-card">
                    <i class="fa-solid fa-file-pdf"></i>
                    <h3>
                        <?php echo $archivo['nombre_archivo']; ?>
                    </h3>
                    <a href="admin/assets/docs/eventos/<?php echo $archivo['archivo_pdf']; ?>"
                       target="_blank">
                        Ver Documento
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
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