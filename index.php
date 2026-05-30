<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundación Intimakuna</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>

    <!-- HERO SLIDER -->
<section class="hero-slider">

    <!-- SLIDE 1 -->
    <div class="slide active">
        <img src="<?php echo $base_url; ?>assets/img/index/hero1.jpg" alt="">
        <div class="overlay"></div>
        <div class="slide-content">
            <h1>Fundación Indígena Intimakuna</h1>
            <p>
                Cultura, turismo y fortalecimiento comunitario.
            </p>
            <a href="#servicios" class="btn">
                Explorar Servicios
            </a>
        </div>
    </div>

    <!-- SLIDE 2 -->
    <div class="slide">
        <img src="<?php echo $base_url; ?>assets/img/index/hero2.jpg" alt="">
        <div class="overlay"></div>
        <div class="slide-content">
            <h1>Turismo Comunitario</h1>
            <p>
                Experiencias auténticas junto a las comunidades.
            </p>
            <a href="experiencias.php" class="btn">
                Descubrir
            </a>
        </div>
    </div>

    <!-- SLIDE 3 -->
    <div class="slide">
        <img src="<?php echo $base_url; ?>assets/img/index/hero3.jpg" alt="">
        <div class="overlay"></div>
        <div class="slide-content">
            <h1>Cultura y Territorio</h1>
            <p>
                Preservamos la identidad cultural y ancestral.
            </p>
            <a href="#nosotros" class="btn">
                Conocer Más
            </a>
        </div>
    </div>

    <!-- FLECHAS -->
    <button class="prev">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <button class="next">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

</section>
        
        
    <!-- BENEFICIOS -->
<section class="dark-section">
    <div class="titulo">
        <h2>Beneficios</h2>
        <p>
            Intimakita te brinda experiencias enriquecedoras de arte cultura y saberes.
        </p>
        </div>

    <section class="beneficios">
        
        <div class="beneficio">
            <i class="fa-solid fa-hourglass-half"></i>
            <h3>Ahorro de tiempo</h3>
            <p>Nuestros servicios están diseñados para optimizar su tiempo y simplificar sus tareas diarias.</p>
        </div>

        <div class="beneficio">
            <i class="fa-solid fa-star"></i>
            <h3>Experiencia enriquecedora</h3>
            <p>Ofrecemos experiencias educativas y culturales que enriquecerán su vida y ampliarán su perspectiva.</p>
        </div>

        <div class="beneficio">
            <i class="fa-solid fa-tree"></i>
            <h3>Impacto ambiental positivo</h3>
            <p>Al participar en nuestras actividades, contribuirá a la preservación del medio ambiente y la sostenibilidad.</p>
        </div>

        <div class="beneficio">
            <i class="fa-solid fa-tags"></i>
            <h3>Descuentos exclusivos</h3>
            <p>Como parte de nuestra comunidad, tendrá acceso a descuentos exclusivos en eventos y actividades turísticas.</p>
        </div>

        <div class="beneficio">
            <i class="fa-solid fa-leaf"></i>
            <h3>Sostenibilidad</h3>
            <p>Promovemos prácticas responsables con el medio ambiente.</p>
        </div>

        <div class="beneficio">
            <i class="fa-solid fa-users"></i>
            <h3>Comunidad</h3>
            <p>Fortalecemos la identidad cultural y el trabajo colectivo.</p>
        </div>

        <div class="beneficio">
            <i class="fa-solid fa-mountain-sun"></i>
            <h3>Turismo</h3>
            <p>Impulsamos experiencias culturales y turísticas auténticas.</p>
        </div>

        <div class="beneficio">
            <i class="fa-solid fa-graduation-cap"></i>
            <h3>Educación</h3>
            <p>Desarrollamos talleres y formación comunitaria continua.</p>
        </div>

    </section>
</section>

    <!-- SERVICIOS -->
    <section class="light-section" id="servicios">
        <div class="titulo">
            <h2>Nuestros Servicios</h2>
            <p>
                Programas y actividades orientadas al fortalecimiento cultural,
                turístico y comunitario.
            </p>
        </div>
        <div class="cards">
            <div class="card">
                <img src="<?php echo $base_url; ?>assets/img/index/servicio1.jpg" alt=""
                class="img-evento"
                onclick="abrirImagen(this.src)">
                <div class="card-content">
                    <h3>Formación Continua</h3>
                    <p>
                        Ofrecemos talleres, seminarios, cursos y diplomados con enfoque diferencial.
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="<?php echo $base_url; ?>assets/img/index/servicio2.jpg" alt=""
                onclick="abrirImagen(this.src)">
                <div class="card-content">
                    <h3>Eventos Culturales</h3>
                    <p>
                        Participe en nuestros eventos culturales que promueve el intercambio cultural y social.
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="<?php echo $base_url; ?>assets/img/index/servicio3.jpg" alt=""
                onclick="abrirImagen(this.src)">
                <div class="card-content">
                    <h3>Sostenibilidad Ambiental</h3>
                    <p>
                        Descubra cómo puede contribuir a la sostenibilidad ambiental a través de nuestras actividades y programas.
                    </p>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo $base_url; ?>assets/img/index/servicio4.jpg" alt=""
                onclick="abrirImagen(this.src)">
                <div class="card-content">
                    <h3>Alianza en turismo</h3>
                    <p>
                        Ofrecemos alojamiento rural, tours guiados y rutas de turismo para todas las edades.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- NOSOTROS -->
    <section class="nosotros" id="nosotros">
        <div class="nosotros-img">
            <img src="<?php echo $base_url; ?>assets/img/index/nosotros.jpg" alt="">
        </div>

        <div class="nosotros-texto">
            <h2>Sobre Nosotros</h2>
            <p>
                La Fundación Indígena Intimakuna desarrolla procesos sociales,
                culturales y turísticos orientados al fortalecimiento de las
                comunidades y la preservación del territorio.
            </p>
            <p>
                Nuestro trabajo promueve la identidad cultural, la sostenibilidad,
                la educación y el turismo comunitario.
            </p>
            <a href="#" class="btn">
                Ver Más
            </a>
        </div>
    </section>

    <!-- TESTIMONIOS -->

    <section class="light-section">
        <div class="titulo">
            <h2>Testimonios</h2>
        </div>

        <div class="testimonios-grid">
            <div class="testimonio">
                <p>
                    “Intimakuna ha fortalecido nuestros procesos culturales.”
                </p>
                <div class="persona">
                    <img src="<?php echo $base_url; ?>assets/img/index/testimonio1.jpg" alt="">
                    <span>Nury Guaitarilla</span>
                </div>
            </div>

            <div class="testimonio">
                <p>
                    “Los talleres nos permitieron aprender y compartir.”
                </p>
                <div class="persona">
                    <img src="<?php echo $base_url; ?>assets/img/index/testimonio2.jpg" alt="">
                    <span>Sofia Realpe</span>
                </div>
            </div>

            <div class="testimonio">
                <p>
                    “Excelente organización y actividades comunitarias.”
                </p>
                <div class="persona">
                    <img src="<?php echo $base_url; ?>assets/img/index/testimonio3.jpg" alt="">
                    <span>Polivio Pinchao</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ESTADISTICAS -->
    <section class="estadisticas">
        <div class="estadistica">
            <h2>11+</h2>
            <p>Proyectos</p>
        </div>
        <div class="estadistica">
            <h2>5+</h2>
            <p>Premios</p>
        </div>
        <div class="estadistica">
            <h2>100+</h2>
            <p>Clientes</p>
        </div>
        <div class="estadistica">
            <h2>13+</h2>
            <p>Miembros</p>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>

    <!-- JS -->
    <script src="<?php echo $base_url; ?>assets/js/main.js"></script>


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