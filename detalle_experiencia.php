<?php
include 'includes/config.php';
include 'config/database.php';
$id = $_GET['id'];

/* ========================= */
/* EXPERIENCIA */
/* ========================= */
$sql = "SELECT *
        FROM experiencias
        WHERE id_experiencia = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$experiencia = $stmt->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* ACTIVIDADES */
/* ========================= */
$sqlActividades = "SELECT *
                   FROM actividades_experiencias
                   WHERE id_experiencia = :id";
$stmtActividades = $conexion->prepare($sqlActividades);
$stmtActividades->bindParam(':id', $id);
$stmtActividades->execute();
$actividades = $stmtActividades->fetchAll(PDO::FETCH_ASSOC);

/* ========================= */
/* QUE INCLUYE */
/* ========================= */
$sqlIncluye = "SELECT *
               FROM incluye_experiencias
               WHERE id_experiencia = :id";
$stmtIncluye = $conexion->prepare($sqlIncluye);
$stmtIncluye->bindParam(':id', $id);
$stmtIncluye->execute();
$incluye = $stmtIncluye->fetchAll(PDO::FETCH_ASSOC);

/* ========================= */
/* GALERIA */
/* ========================= */

$sqlGaleria = "SELECT *
               FROM galeria_experiencias
               WHERE id_experiencia = :id";
$stmtGaleria = $conexion->prepare($sqlGaleria);
$stmtGaleria->bindParam(':id', $id);
$stmtGaleria->execute();
$galeria = $stmtGaleria->fetchAll(PDO::FETCH_ASSOC);

/* ========================= */
/* ARCHIVOS */
/* ========================= */
$sqlArchivos = "SELECT *
                FROM archivos_experiencias
                WHERE id_experiencia = :id";
$stmtArchivos = $conexion->prepare($sqlArchivos);
$stmtArchivos->bindParam(':id', $id);
$stmtArchivos->execute();
$archivos = $stmtArchivos->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $experiencia['titulo']; ?>
    </title>
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
         style="background-image:url('admin/assets/img/experiencias/<?php echo $experiencia['imagen']; ?>');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <span>
            EXPERIENCIA ANCESTRAL
        </span>
        <h1>
            <?php echo $experiencia['titulo']; ?>
        </h1>
        <p>
            <?php echo $experiencia['resumen']; ?>
        </p>
    </div>
</section>

<!-- INTRO -->
<section class="light-section">
    <div class="destino-container">
        <div class="main-grid">
            <div class="main-texto">
                <span>
                    TURISMO VIVENCIAL
                </span>
                <h2>
                    Una experiencia que transforma
                </h2>
                <p>
                    <?php echo nl2br($experiencia['descripcion']); ?>
                </p>
                <div class="intro-icons">
                    <div class="intro-icon-card">
                        <i class="fa-solid fa-mountain"></i>
                        <span class="detalle-evento">
                            Naturaleza
                        </span>
                    </div>
                    <div class="intro-icon-card">
                        <i class="fa-solid fa-people-group"></i>
                        <span class="detalle-evento">
                            Comunidad
                        </span>
                    </div>
                    <div class="intro-icon-card">
                        <i class="fa-solid fa-seedling"></i>
                        <span class="detalle-evento">
                            Territorio
                        </span>
                    </div>
                </div>
            </div>
            <div class="main-imagen">   
                <?php if(!empty($galeria)): ?>
                    <img src="admin/assets/img/experiencias/<?php echo $galeria[0]['imagen']; ?>"
                        alt="">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- EXPERIENCIAS -->
<section class="dark-section">
    <div class="destino-container">
        <div class="main-texto">
            <span>
                EXPERIENCIAS
            </span>
            <h2>
                Actividades del recorrido
            </h2>
        </div>

        <!--CARDS-->
        <div class="experiencias-grid">
            <?php foreach($actividades as $actividad): ?>
            <div class="experiencia-card">
                <img src="admin/assets/img/experiencias/<?php echo $actividad['imagen_ex']; ?>"
                     alt=""
                     class="img-evento"
                     onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <h3>
                        <?php echo $actividad['titulo']; ?>
                    </h3>
                    <p>
                        <?php echo $actividad['descripcion']; ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- QUE INCLUYE -->
<section class="light-section">
    <div class="destino-container">
        <div class="main-grid">
            <div class="main-imagen">
                <?php if(!empty($galeria)): ?>
                    <img src="admin/assets/img/experiencias/<?php echo $galeria[1]['imagen']; ?>"
                        alt="">
                <?php endif; ?>
            </div>
            <div class="main-texto">
                <span>
                    PARA TÍ
                </span>
                <h2>
                    ¿QUÉ INCLUYE?
                </h2>
                <p>
                    <?php foreach($incluye as $item): ?>
                        - <?php echo $item['titulo']; ?> <br>
                    <?php endforeach; ?>     
                </p>
            </div>
        </div>
    </div>
</section>

<!-- GALERIA -->
<section class="dark-section">
    <div class="destino-container">
        <div class="main-texto">
            <span>
                GALERÍA
            </span>
            <h2>
                Vive la experiencia
            </h2>
        </div>
        <div class="galeria-grid-destino">
            <?php foreach($galeria as $imagen): ?>
            <img src="admin/assets/img/experiencias/<?php echo $imagen['imagen']; ?>"
                 alt=""
                 class="img-evento"
                 onclick="abrirImagen(this.src)">
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- DOCUMENTOS -->
 <?php if(count($archivos) > 0): ?>
<section class="light-section">
    <div class="titulo">
        <h2>
            Documentación de la Ruta
        </h2>
        <p>
            Consulta el portafolio, el recorrido y las
            recomendaciones para visitantes.
        </p>
    </div>
    <div class="documentos-grid">
        <?php foreach($archivos as $archivo): ?>
        <div class="documento-card">
            <h3>
                <?php echo $archivo['nombre_archivo']; ?>
            </h3>
            <a href="admin/assets/docs/experiencias/<?php echo $archivo['archivo_pdf']; ?>"
               target="_blank">
                Ver Documento
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- CTA FINAL -->
<section class="cta-destino">
    <div class="cta-overlay"></div>
    <div class="cta-content">
        <h2>
            Descubre la esencia
            del territorio Pasto
        </h2>
        <p>
            Vive una experiencia auténtica
            junto a las comunidades indígenas
            del sur de Nariño.
        </p>
        <a href="reservas.php"
           class="btn">
            Reservar ahora
        </a>
        <a href="contacto.php"
           class="btn">
            Solicitar información
        </a>
    </div>
</section>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>

<!-- MODAL IMAGEN -->
<div id="modalImagen"
     class="modal-imagen">
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