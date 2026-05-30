<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>
        Vivero Pundé Intimakuna
    </title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<!-- HERO -->
<section class="hero-general"
style="background-image:url('assets/img/destinos/punde/portada_punde.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>
            Vivero Pundé Intimakuna
        </h1>
        <p>
            Conservación ambiental, restauración ecológica
            y protección de especies nativas desde el
            territorio indígena de Muellamues.
        </p>
    </div>
</section>

<!-- CONTENIDO -->
<section class="destino-container">
    <!-- DESTACADO -->
    <div class="destino-highlight">
        <h2>
            El significado de “Pundé”
        </h2>
        <p>
            El término “Pundé” corresponde al nombre común
            en lengua materna Pastos de una especie nativa
            también conocida como “palo mote” o “caspi mote”,
            utilizada tradicionalmente para cercas vivas y
            madera. Gracias a su fácil propagación mediante
            semillas, se convierte en un símbolo de vida,
            permanencia y conexión con el territorio.
        </p>
    </div>

    <!-- BLOQUE 1 -->
    <div class="destino-grid">
        <img src="<?php echo $base_url; ?>assets/img/index/turismo3.jpg" alt="">
        <div class="destino-texto">
            <h2>
                Conservación y restauración ecológica
            </h2>
            <p>
                El Vivero Pundé Intimakuna se estableció en
                mayo del año 2018 en el marco de la
                convocatoria concursable “Sur Sostenible”,
                con el apoyo de la Secretaría de Agricultura
                y Ambiente Sostenible de la Gobernación de
                Nariño, GEF - PNUD y liderado por la Fundación
                Intimakuna desde su programa de territorio
                y medio ambiente.
            </p>
            <p>
                Su propósito principal es la conservación y
                protección de la fauna y flora silvestre local
                mediante la propagación por semillas y estolones
                de árboles nativos, frailejones, flores y
                frutales destinados a procesos de restauración
                ecológica en las comunidades locales.
            </p>
        </div>
    </div>

    <!-- BLOQUE 2 -->
    <div class="destino-grid">
        <div class="destino-texto">
            <h2>
                Infraestructura sostenible
            </h2>
            <p>
                Las instalaciones del vivero están ubicadas en
                la Vereda Chapud del Resguardo Indígena de
                Muellamues, municipio de Guachucal, Nariño.
                Cuenta con un área aproximada de 13 metros
                por 10 metros y está construido con materiales
                amigables con el ambiente como guadua,
                varengas, polisombra y plástico.
            </p>
            <p>
                Además, posee un sistema de recolección y
                almacenamiento de aguas lluvias en tanques
                de 2.000 y 3.000 litros, permitiendo un
                funcionamiento más sostenible y evitando
                el uso de sistemas de riego provenientes
                del acueducto.
            </p>
        </div>
        <img src="assets/img/destinos/punde/punde1.jpg"
             alt="Infraestructura">
    </div>

    <!-- BLOQUE 3 -->
    <div class="destino-grid">
        <img src="assets/img/destinos/punde/punde2.jpg"
             alt="Especies Nativas">
        <div class="destino-texto">
            <h2>
                Propagación de especies nativas
            </h2>
            <p>
                Actualmente el vivero cuenta con germinadores
                de especies nativas como arrayán, capote,
                cerote, charmuelán, chilca blanca, encino,
                motilón, pandala y pumamaque.
            </p>
            <p>
                También dispone de una gran variedad de
                suculentas, flores ornamentales y frutales
                como aguacate, uvilla, tomate de árbol,
                lulo y tomate de carne, fortaleciendo así
                los procesos de soberanía ambiental y
                recuperación del ecosistema local.
            </p>
        </div>
    </div>

    <!-- BLOQUE 4 -->
    <div class="destino-grid">
        <div class="destino-texto">
            <h2>
                Educación ambiental comunitaria
            </h2>
            <p>
                Desde el programa de Territorio y Ambiente
                Sostenible de la Fundación Intimakuna se
                impulsan acciones de concientización y
                fortalecimiento del sentido de pertenencia
                hacia la naturaleza y la biodiversidad.
            </p>
            <p>
                En articulación con centros educativos del
                Resguardo de Muellamues se desarrollan
                actividades pedagógicas, juegos tradicionales,
                mingas y jornadas ambientales en fechas
                conmemorativas como el Día Mundial del Árbol.
            </p>
            <p>
                Una de las estrategias más significativas
                consiste en el apadrinamiento de árboles,
                permitiendo que niños y jóvenes lleven un
                árbol a sus hogares con el compromiso de
                sembrarlo y cuidarlo.
            </p>
        </div>
        <img src="assets/img/destinos/punde/punde3.jpg"
             alt="Educación Ambiental">
    </div>

    <!-- GALERIA -->
    <div class="destino-galeria">
        <img src="assets/img/destinos/punde/vivero1.jpg"
            class="img-evento"
            onclick="abrirImagen(this.src)">
        <img src="assets/img/destinos/punde/vivero2.jpg"
            class="img-evento"
            onclick="abrirImagen(this.src)">
        <img src="assets/img/destinos/punde/vivero3.jpg"
            class="img-evento"
            onclick="abrirImagen(this.src)">
    </div>

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