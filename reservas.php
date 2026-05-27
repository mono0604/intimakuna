<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Reservas | Fundación Intimakuna</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- HEADER -->
    <?php include 'includes/header.php'; ?>
    <!-- HERO -->
    <section class="hero-general"
        style="background-image:url('assets/img/reservas/portada_reservas.jpg');">
        <div class="overlay-general"></div>
        <div class="hero-general-content">
            <h1>Reserva tu Experiencia</h1>
            <p>
                Vive experiencias culturales y turísticas únicas junto a la Fundación Intimakuna.
            </p>
        </div>
    </section>

<!-- RESERVAS -->
    <section class="reservas" id="reservas">
        <div class="reservas-container">
            <div class="reservas-info">
                <img src="<?php echo $base_url; ?>assets/img/reservas/reservas.jpg" alt="Reservas Intimakuna">
                <div class="reservas-card">
                    <h3>
                        Vive una experiencia inolvidable
                    </h3>
                    <p>
                        Conecta con la cultura, la naturaleza y las tradiciones
                        ancestrales junto a la Fundación Intimakuna.
                    </p>
                    <div class="reservas-beneficios">
                        <div class="beneficio-item">
                            <i class="fa-solid fa-tree"></i>

                            <span>
                                Naturaleza y cultura
                            </span>
                        </div>
                        <div class="beneficio-item">
                            <i class="fa-solid fa-compass"></i>
                            <span>
                                Experiencias enriquecedoras
                            </span>
                        </div>
                        <div class="beneficio-item">
                            <i class="fa-solid fa-tags"></i>
                            <span>
                                Descuentos exclusivos
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <form class="reservas-form"
                action="process/guardar_reserva.php"
                method="POST">
                <input type="text"
                    name="nombre"
                    placeholder="Nombre completo"
                    required>
                <input type="email"
                    name="correo"
                    placeholder="Correo electrónico"
                    required>
                <input type="text"
                    name="telefono"
                    placeholder="Teléfono">
              
                <!-- DESTINO -->
                <select name="destino"
                        id="destino"
                        required>
                    <option value="">
                        Seleccione un destino
                    <option value="RUTA CUMBAL - MUELLAMUES">
                        Ruta Cumbal - Muellamues
                    </option>

                    <option value="SOL DE LOS PASTOS">
                        Sol de los Pastos
                    </option>

                    <option value="PUNDÉ INTIMAKUNA">
                        Pundé Intimakuna
                    </option>
                </select>

                <!-- FECHAS DISPONIBLES -->
                <select name="fecha_reserva"
                        id="fecha_reserva"
                        required>
                    <option value="">
                        Seleccione una fecha
                    </option>
                </select>

                <!-- DISPONIBILIDAD -->
                <div id="estadoDisponibilidad"></div>

                <!-- PERSONAS -->
                <select name="cantidad_personas"
                        id="cantidad_personas"
                        required
                        disabled>
                    <option value="">
                        Cantidad de personas
                    </option>
                </select>
                <textarea name="mensaje"
                        placeholder="Mensaje adicional"></textarea>
                <button type="submit" class="btn">
                    Reservar Ahora
                </button>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>
    
<script>

/* ========================= */
/* ELEMENTOS */
/* ========================= */

const destino = document.getElementById('destino');

const fecha = document.getElementById('fecha_reserva');

const personas = document.getElementById('cantidad_personas');

const estado = document.getElementById('estadoDisponibilidad');

/* ========================= */
/* CAMBIO DESTINO */
/* ========================= */

destino.addEventListener('change', async () => {

    fecha.innerHTML = `
        <option value="">
            Cargando fechas...
        </option>
    `;

    personas.innerHTML = `
        <option value="">
            Cantidad de personas
        </option>
    `;

    personas.disabled = true;

    estado.innerHTML = '';

    const response = await fetch(
        `process/obtener_disponibilidad.php?destino=${destino.value}`
    );

    const data = await response.json();

    fecha.innerHTML = `
        <option value="">
            Seleccione una fecha
        </option>
    `;

    if(data.length === 0){

        estado.innerHTML = `
            <div class="estado-agotado">
                No hay fechas disponibles
            </div>
        `;

        return;

    }

    data.forEach(item => {

        fecha.innerHTML += `
            <option value="${item.fecha_disponible}">
                ${item.fecha_disponible}
            </option>
        `;

    });

});

/* ========================= */
/* CAMBIO FECHA */
/* ========================= */

fecha.addEventListener('change', async () => {

    personas.innerHTML = `
        <option value="">
            Cargando cupos...
        </option>
    `;

    const response = await fetch(

        `process/obtener_disponibilidad.php?destino=${destino.value}&fecha=${fecha.value}`

    );

    const data = await response.json();

    personas.innerHTML = `
        <option value="">
            Cantidad de personas
        </option>
    `;

    if(data.cupos_disponibles <= 0){

        estado.innerHTML = `
            <div class="estado-agotado">
                Agotado
            </div>
        `;

        personas.disabled = true;

        return;

    }

    personas.disabled = false;

    /* ESTADOS */

    if(data.cupos_disponibles <= 5){

        estado.innerHTML = `
            <div class="estado-pocos">
                Últimos cupos disponibles (${data.cupos_disponibles})
            </div>
        `;

    }else{

        estado.innerHTML = `
            <div class="estado-disponible">
                ${data.cupos_disponibles} cupos disponibles
            </div>
        `;

    }

    /* GENERAR SELECT PERSONAS */

    for(let i = 1; i <= data.cupos_disponibles; i++){

        personas.innerHTML += `
            <option value="${i}">
                ${i} persona(s)
            </option>
        `;

    }

});

</script>


</body>
</html>