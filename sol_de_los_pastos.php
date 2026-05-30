<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>
        Ruta Cultural Sol de los Pastos
    </title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<!-- HERO -->
<section class="hero-general"
style="background-image:url('assets/img/destinos/sol_pastos/portada_sol_pastos.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>
            Ruta Cultural Sol de los Pastos
        </h1>
        <p>
            Un recorrido ancestral por los territorios sagrados
            del pueblo Pasto entre Guachucal y Cumbal.
        </p>
    </div>
</section>

<!-- CONTENIDO -->
<section class="destino-container">
    <!-- BLOQUE 1 -->
    <div class="destino-grid">
        <img src="<?php echo $base_url; ?>assets/img/index/turismo1.jpg" alt="">
        <div class="destino-texto">
            <h2>
                Experiencia Cultural y Espiritual
            </h2>
            <p>
                En el sur de Nariño, entre los municipios de
                Guachucal y Cumbal, los viajeros son recibidos
                por la Fundación Indígena Intimakuna para
                adentrarse en un recorrido cultural por
                territorios sagrados y paisajes andinos que
                resguardan la memoria de los pueblos Pastos.
            </p>
            <p>
                La experiencia inicia con visitas a lugares
                cargados de espiritualidad como los Siete
                Agujeros y la Piedra de los Machines, donde
                los sabedores transmiten relatos que conectan
                el presente con las raíces ancestrales.
            </p>
        </div>
    </div>

    <!-- BLOQUE 2 -->
    <div class="destino-grid">
        <div class="destino-texto">
            <h2>
                Turismo Comunitario y Vivencial
            </h2>
            <p>
                A lo largo de tres días, los visitantes participan
                en actividades vivenciales como la interacción
                con la chagra, la degustación de bebidas y dulces
                tradicionales, la caminata por la Laguna del
                Encanto y la siembra de árboles nativos.
            </p>
            <p>
                Lo que hace única esta experiencia es la
                posibilidad de vivir el territorio desde la voz
                y la hospitalidad de sus guardianes culturales,
                generando un aprendizaje auténtico sobre la
                espiritualidad, la gastronomía y el cuidado de
                la tierra.
            </p>
        </div>
        <img src="<?php echo $base_url; ?>assets/img/index/turismo1.jpg" alt="">
    
    </div>

    <!-- DESTACADO -->
    <div class="destino-highlight">
        <h2>
            Una experiencia transformadora
        </h2>
        <p>
            Dirigida a turistas nacionales y extranjeros
            interesados en el turismo cultural y comunitario,
            esta propuesta ofrece una vivencia que deja en el
            visitante un profundo respeto por la identidad
            indígena, el sentido de pertenencia al territorio
            y la emoción de haber compartido un legado vivo
            que trasciende generaciones.
        </p>
    </div>

    <!-- GALERIA -->
    <div class="destino-galeria">
        <img src="assets/img/destinos/sol_pastos/reja.jpg"
            class="img-evento"
            onclick="abrirImagen(this.src)">
        <img src="assets/img/destinos/sol_pastos/cumbal.jpg"
            class="img-evento"
            onclick="abrirImagen(this.src)">
        <img src="assets/img/destinos/sol_pastos/mapa.jpg"
            class="img-evento"
            onclick="abrirImagen(this.src)">
    </div>

    <!-- DOCUMENTOS -->
    <section class="documentos-section">
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
</section>

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