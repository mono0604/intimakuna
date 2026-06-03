<?php
require 'config/database.php';

/* EXPERIENCIAS */

$sql = "SELECT *
        FROM experiencias
        ORDER BY titulo ASC";

$stmt = $conexion->prepare($sql);
$stmt->execute();

$experiencias = $stmt->fetchAll(PDO::FETCH_ASSOC);


/* DISPONIBILIDAD PARA CALENDARIO */

$sqlCalendario = "
SELECT
    d.fecha_disponible,
    d.cupos_disponibles,
    e.titulo,
    e.id_experiencia
FROM disponibilidad_experiencias d
INNER JOIN experiencias e
    ON d.id_experiencia = e.id_experiencia
WHERE LOWER(d.estado) = 'disponible'
ORDER BY d.fecha_disponible ASC
";

$stmtCalendario = $conexion->prepare($sqlCalendario);
$stmtCalendario->execute();

$fechasCalendario = $stmtCalendario->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>experiencias | Fundación Intimakuna</title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css"
      rel="stylesheet">
</head>

<body>

<!-- HERO -->
<section class="hero-general"
style="background-image:url('assets/img/experiencias/experiencias_portada.jpg');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>experiencias</h1>
        <p>
            Actividades culturales, comunitarias y turísticas.
        </p>
    </div>
</section>

<!-- EXPERIENCIAS -->
<section class="eventos-page">
    <div class="titulo">
        <h2>Experiencias</h2>
        <p>
            Descubre nuestras actividades y experiencias.
        </p>
    </div>
    <div class="eventos-grid">
        <?php foreach($experiencias as $experiencia): ?>
        <div class="evento-card">
            <img src="assets/img/experiencias/<?php echo $experiencia['imagen']; ?>"
                class="img-evento"
                onclick="abrirImagen(this.src)">
            <div class="evento-content"><br>
                <span class="fecha">
                    <?php echo $experiencia['titulo']; ?>
                </span>
                <a>
                    <?php echo $experiencia['resumen']; ?>
                </a>
                <h3>
                    Duracion: <?php echo $experiencia['duracion']; ?>
                </h3>
                <h3>
                    $ <?php echo number_format($experiencia['precio'], 0, ',', '.'); ?>
                </h3>
                <a href="detalle_experiencia.php?id=<?php echo $experiencia['id_experiencia']; ?>"
                class="btn">
                    Ver Más
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CALENDARIO -->

<section class="calendario-eventos">

    <div class="titulo">
        <h2>Disponibilidad de Experiencias</h2>
        <p>
            Consulta las fechas disponibles para reservar.
        </p>
    </div>

    <div class="calendar-box">
        <div id="calendar"></div>
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
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        height: 'auto',


events: [
<?php foreach($fechasCalendario as $fecha):
$color = '#16a34a'; // verde
if($fecha['cupos_disponibles'] <= 5){
    $color = '#eab308'; // amarillo
}
if($fecha['cupos_disponibles'] <= 0){
    $color = '#dc2626'; // rojo
}
?>
{
    title: '<?php echo addslashes($fecha["titulo"]); ?> (<?php echo $fecha["cupos_disponibles"]; ?> cupos)',    
    start: '<?php echo $fecha["fecha_disponible"]; ?>',
    url: 'detalle_experiencia.php?id=<?php echo $fecha["id_experiencia"]; ?>',
    color: '<?php echo $color; ?>'
},
<?php endforeach; ?>
]
    });
    calendar.render();
});

</script>
</body>
</html>