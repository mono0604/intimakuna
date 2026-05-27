<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Fundación Intimakuna</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

    <!-- HERO CONTACTO -->
    <section class="hero-general"
         style="background-image:url('assets/img/contactos/portada_contactos.jpg');">
        <div class="overlay-general"></div>
        <div class="hero-general-content">
            <h1>Contáctanos</h1>
            <p>
                Estamos disponibles para atender tus dudas,
                solicitudes y propuestas.
            </p>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="contacto-container">
        <!-- INFORMACION -->
        <div class="contacto-info">
            <h2>Información de Contacto</h2>
            <div class="info-box">
                <i class="fa-solid fa-phone"></i>
                <div>
                    <h4>Teléfono</h4>
                    <p>316 6152660</p>
                </div>
            </div>
            <div class="info-box">
                <i class="fa-solid fa-envelope"></i>
                <div>
                    <h4>Correo Electrónico</h4>
                    <p>contacto@intimakuna.org</p>
                </div>
            </div>
            <div class="info-box">
                <i class="fa-solid fa-location-dot"></i>
                <div>
                    <h4>Dirección</h4>
                    <p>
                        Calle xx # xx - xx <br>
                        Vereda Chapud - Guachucal Nariño
                    </p>
                </div>
            </div>
            <div class="info-box">
                <i class="fa-solid fa-clock"></i>
                <div>
                    <h4>Horarios de Atención</h4>
                    <p>
                        Lunes a viernes de 9:00AM - 5:00PM
                    </p>
                    <p>
                        Sábados, domingos y festivos de 10:00AM - 6:00PM
                    </p>
                </div>
            </div>
        </div>

        <!-- FORMULARIO -->
        <div class="contacto-form">
            <h2>Envíanos un Mensaje</h2>
        <form action="process/guardar_contacto.php"
            method="POST">
            <div class="input-group">
                <input type="text"
                    name="nombre"
                    placeholder="Nombre Completo"
                    required>
                <input type="email"
                    name="correo"
                    placeholder="Correo Electrónico"
                    required>
            </div>
            <input type="text"
                name="asunto"
                placeholder="Asunto">

            <textarea rows="6"
                    name="mensaje"
                    placeholder="Escribe tu mensaje..."
                    required></textarea>
            <button type="submit" class="btn">
                Enviar Mensaje
            </button>
        </form>
        </div>
    </section>

    <!-- MAPA -->
    <section class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2216307207755!2d-77.74893122414394!3d0.9909248626225649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e295b2cc3e6f743%3A0x790df64896254bff!2sVereda%20Chapud%20-%20Municipio%20de%20Guachucal!5e0!3m2!1ses-419!2sco!4v1779301184175!5m2!1ses-419!2sco" 
            width="600" 
            height="450" 
            style="border:0;" allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>