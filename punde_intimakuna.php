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
        Pundé Intimakuna | Fundación Intimakuna
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
         style="background-image:url('assets/img/destinos/punde/portada_punde.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <span>
            EXPERIENCIA ANCESTRAL
        </span>
        <h1>
            VIVERO PUNDÉ
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
                    Las instalaciones del Vivero Pundé Intimakuna 
                    se encuentran ubicadas en la Vereda Chapud del 
                    Resguardo Indígena de Muellamues - Municipio 
                    de Guachucal Nariño, tiene un área de 
                    13 metros x 10 metros, está construido en material 
                    maderable como guadua, varengas con cimientos en concreto 
                    para evitar el daño de las bases por causa de la humedad, 
                    poli sombra y plástico, cuenta con un sistema de riego 
                    de aguas lluvias, las mismas que son captadas en tanques 
                    de almacenamiento de 2.000 y 3.000 litros lo que ha 
                    posibilitado hacer un proceso más amigable con la naturaleza, 
                    no se usa en ningún momento sistema de riego de acueducto por 
                    varias razones de tipo ambiental.
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
                <img src="<?php echo $base_url; ?>assets/img/index/turismo3.jpg" alt="">
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
        <div class="experiencias-grid">

            <!-- CARD 1 -->
            <div class="experiencia-card">
                <img src="assets/img/destinos/punde/actividad1.jpg"
                    alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-fire"></i>
                    <h3>
                        Avtividad 1
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
                <img src="assets/img/destinos/punde/actividad2.jpg"
                     alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-bowl-food"></i>
                    <h3>
                        Avtividad 2
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
                <img src="assets/img/destinos/punde/actividad3.jpg"
                     alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-tree"></i>
                    <h3>
                        Avtividad 3
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
                <img src="assets/img/destinos/punde/experiencia.jpg"
                     alt="">
            </div>
            <div class="main-texto">
                <span>
                    PARA TÍ
                </span>
                <h2>
                    ¿QUÉ INCLUYE?
                </h2>
                <p>
                    - Entrada el las instalaciones del vivero. <br>
                    - Almuerzo con comida tipica de la región <br>
                    - Guia turistico <br>
                    - Transporte en rutas de distancia. <br>
                    - Seguro de asistencia médica.
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
            <img src="assets/img/destinos/punde/punde_galeria1.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/punde/punde_galeria2.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/punde/punde_galeria3.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/punde/punde_galeria4.jpg"
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