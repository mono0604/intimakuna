<?php
include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>
        Cumbal Muellamues | Fundación Intimakuna
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
         style="background-image:url('assets/img/destinos/cumbal_muellamues/portada_cumbal_muellamues.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <span>
            EXPERIENCIA ANCESTRAL
        </span>
        <h1>
            Turismo Cumbal Muellamues
        </h1>
        <p>
            Conecta con la cultura indígena,
            la naturaleza y la espiritualidad
            de los pueblos Pastos en el sur de Nariño.
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
                    La Fundación Indígena Intimakuna
                    invita a los viajeros a descubrir
                    el territorio ancestral de los pueblos
                    Pastos a través de un recorrido
                    comunitario lleno de tradición,
                    naturaleza y memoria viva.
                </p>
                <p>
                    Durante la experiencia, los visitantes
                    compartirán con familias de la comunidad,
                    conocerán prácticas agrícolas tradicionales,
                    participarán en actividades culturales y
                    recorrerán paisajes andinos rodeados
                    de montañas, lagunas y senderos sagrados.
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
                <img src="<?php echo $base_url; ?>assets/img/index/turismo2.jpg" alt="">
            </div>
        </div>
    </div>
</section>

<!-- EXPERIENCIAS -->
<section class="dark-section">
    <div class="destino-container">
        <div class="section-title">
            <span>
                EXPERIENCIAS
            </span>
            <h2>
                Actividades del recorrido
            </h2>
        </div>
        <div class="experiencias-grid">

            <!-- CARD 1 -->
            <div class="experiencia-card">
                <img src="assets/img/destinos/cumbal_muellamues/actividad1.jpg"
                    alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-fire"></i>
                    <h3>
                        Fogatas Ancestrales
                    </h3>
                    <p>
                        Espacios nocturnos de narración,
                        música tradicional y diálogo con
                        sabedores indígenas.
                    </p>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="experiencia-card">
                <img src="assets/img/destinos/cumbal_muellamues/actividad2.jpg"
                     alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-bowl-food"></i>
                    <h3>
                        Gastronomía Tradicional
                    </h3>
                    <p>
                        Degustación de bebidas,
                        dulces y platos típicos
                        preparados por la comunidad.
                    </p>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="experiencia-card">
                <img src="assets/img/destinos/cumbal_muellamues/actividad3.jpg"
                     alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-tree"></i>
                    <h3>
                        Caminatas Ecológicas
                    </h3>
                    <p>
                        Recorridos guiados por senderos
                        naturales y lugares sagrados
                        del territorio andino.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECCION DESTACADA -->
<section class="light-section">
    <div class="destino-container">
        <div class="main-grid">
            <div class="main-imagen">
                <img src="assets/img/destinos/cumbal_muellamues/experiencia.jpg"
                     alt="">
            </div>
            <div class="main-texto">
                <span>
                    COSMOVISIÓN INDÍGENA
                </span>
                <h2>
                    Más que turismo,
                    una conexión con el territorio
                </h2>
                <p>
                    Cada actividad está diseñada para
                    fortalecer el respeto por la naturaleza,
                    el intercambio cultural y el aprendizaje
                    sobre la identidad indígena.
                </p>
                <p>
                    Los visitantes participan en dinámicas
                    de siembra, medicina tradicional,
                    talleres artesanales y experiencias
                    vivenciales que permiten comprender
                    la importancia espiritual del territorio.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- GALERIA -->
<section class="dark-section">
    <div class="destino-container">
        <div class="section-title">
            <span>
                GALERÍA
            </span>
            <h2>
                Vive la experiencia
            </h2>
        </div>
        <div class="galeria-grid-destino">
            <img src="assets/img/destinos/cumbal_muellamues/experiencia1.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/cumbal_muellamues/experiencia2.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/cumbal_muellamues/experiencia3.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/cumbal_muellamues/experiencia4.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
        </div>
    </div>
</section>

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