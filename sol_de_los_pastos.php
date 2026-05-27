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
         style="background-image:url('assets/img/destinos/sol_pastos/portada_sol_pastos.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <span>
            EXPERIENCIA ANCESTRAL
        </span>
        <h1>
            Rura Sol del los Pastos
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
                    En el sur de Nariño, entre los municipios 
                    de Guachucal y Cumbal, los viajeros son recibidos
                    por la Fundación Indígena Intimakuna para 
                    adentrarse en un recorrido cultural
                    por territorios sagrados y paisajes andinos que
                    resguardan la memoria de los pueblos Pastos.
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
                <img src="<?php echo $base_url; ?>assets/img/index/turismo1.jpg" alt="">
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
                <img src="assets/img/destinos/sol_pastos/actividad1.jpg"
                    alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-panorama"></i>
                    <h3>
                        Los siete agujeros y Piedra los Machines
                    </h3>
                    <p>
                        lugares cargados de espiritualidad,
                        donde los sabedores transmiten relatos 
                        que conectan el presente con las raíces 
                        ancestrales.
                    </p>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="experiencia-card">
                <img src="assets/img/destinos/sol_pastos/actividad2.jpg"
                    alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-panorama"></i>
                    <h3>
                        Interacción con la Chagra
                    </h3>
                    <p>
                        Conoce nuestro espacio de integración 
                        cultural utilizado para el conocimiento 
                        y saberes ancestrales
                    </p>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="experiencia-card">
                <img src="assets/img/destinos/sol_pastos/actividad3.jpg"
                     alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-bowl-food"></i>
                    <h3>
                        Bebidas y Dulces Tradicionales
                    </h3>
                    <p>
                        Degustación de bebidas,
                        dulces y platos típicos
                        preparados por la comunidad.
                    </p>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="experiencia-card">
                <img src="assets/img/destinos/sol_pastos/actividad4.jpg"
                    alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-panorama"></i>
                    <h3>
                        Laguna del Encano
                    </h3>
                    <p>
                        Espacios turisticos de naturaleza,
                        y diálogo con sabedores indígenas.
                    </p>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="experiencia-card">
                <img src="assets/img/destinos/sol_pastos/actividad5.jpg"
                     alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
                <div class="experiencia-info">
                    <i class="fa-solid fa-tree"></i>
                    <h3>
                        Siembra un arbol
                    </h3>
                    <p>
                        Siembra de Arboles nativos de 
                        nuestra región, fortalecen el vínculo 
                        con la naturaleza y la cosmovisión indígena.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DESTACADO -->
<section class="light-section">
    <div class="destino-container">
        <div class="main-grid">
            <div class="main-texto">
                <span>
                    DESTACADO
                </span>
                <h2>
                    xxxxxxxxxxxxxx
                </h2>
                <p>
                    Fortalecen el vínculo con la naturaleza y la 
                    cosmovisión indígena. Lo que hace única a esta 
                    experiencia es la posibilidad de vivir el territorio 
                    desde la voz y la hospitalidad de sus guardianes 
                    culturales, generando un aprendizaje auténtico 
                    sobre la espiritualidad, la gastronomía y el 
                    cuidado de la tierra. Dirigida a turistas nacionales 
                    y extranjeros interesados en el turismo cultural y 
                    comunitario, la propuesta ofrece una vivencia transformadora 
                    que deja en el visitante un profundo respeto por la 
                    identidad indígena, el sentido de pertenencia al territorio 
                    y la emoción de haber compartido un legado vivo que trasciende generaciones.
                </p>
                <p>
                    Durante la experiencia, los visitantes
                    compartirán con familias de la comunidad,
                    conocerán prácticas agrícolas tradicionales,
                    participarán en actividades culturales y
                    recorrerán paisajes andinos rodeados
                    de montañas, lagunas y senderos sagrados.
                </p>
            </div>
            <div class="main-imagen">
                <img src="assets/img/destinos/sol_pastos/destacada.jpg" alt="">
            </div>
        </div>
    </div>
</section>

<!-- QUE INCLUYE -->
<section class="dark-section">
    <div class="destino-container">
        <div class="main-grid">
            <div class="main-imagen">
                <img src="assets/img/destinos/sol_pastos/para_ti.jpg"
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
                    - Alimentación completa desde el 
                      día 1 hasta el día 3. <br>
                    - Alojamineto y lugar tradicional de nuestra 
                      comunidad. <br>
                    - Guia turistico <br>
                    - Transporte en rutas de distancia. <br>
                    - Seguro de asistencia médica.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- GALERIA -->
<section class="light-section">
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
            <img src="assets/img/destinos/sol_pastos/sol_pastos_galeria1.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/sol_pastos/sol_pastos_galeria2.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/sol_pastos/sol_pastos_galeria3.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
            <img src="assets/img/destinos/sol_pastos/sol_pastos_galeria4.jpg"
                 alt="" class="img-evento"
                    onclick="abrirImagen(this.src)">
        </div>
    </div>
</section>

<!-- DOCUMENTOS -->
    <section class="dark-section">
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

            <!-- PORTAFOLIO -->
            <div class="documento-card">
                <i class="fa-solid fa-file-pdf"></i>
                <h3>
                    Portafolio Oficial
                </h3>
                <a href="assets/docs/destinos/sol_pastos/portafolio_sol_pastos.pdf"
                   target="_blank">
                    Ver Documento
                </a>
            </div>

            <!-- MAPA -->
            <div class="documento-card">
                <i class="fa-solid fa-map-location-dot"></i>
                <h3>
                    Mapa de Recorrido
                </h3>
                <a href="assets/docs/destinos/sol_pastos/mapa_recorrido.pdf"
                   target="_blank">
                    Ver Documento
                </a>
            </div>

            <!-- DECALOGO -->
            <div class="documento-card">
                <i class="fa-solid fa-book"></i>
                <h3>
                    Decálogo del Visitante
                </h3>
                <a href="assets/docs/destinos/sol_pastos/decalogo_visitante.pdf"
                   target="_blank">
                    Ver Documento
                </a>
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