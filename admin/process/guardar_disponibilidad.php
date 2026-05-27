<?php
session_start();
require '../../config/database.php';
$experiencia = $_POST['experiencia'];
$fecha = $_POST['fecha_disponible'];
$cupos = $_POST['cupos_totales'];

/* ========================= */
/* INSERTAR */
/* ========================= */
/* ========================= */
/* VALIDAR DUPLICADOS */
/* ========================= */
$sqlValidar = "SELECT *
               FROM disponibilidad_experiencias
               WHERE experiencia = :experiencia
               AND fecha_disponible = :fecha";
$stmtValidar = $conexion->prepare($sqlValidar);
$stmtValidar->bindParam(':experiencia', $experiencia);
$stmtValidar->bindParam(':fecha', $fecha);
$stmtValidar->execute();
$existe = $stmtValidar->fetch(PDO::FETCH_ASSOC);

/* SI YA EXISTE */
if($existe){
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
    <script>
    Swal.fire({
        icon: 'warning',
        title: 'Disponibilidad duplicada',
        text: 'Ya existe esa experiencia para esa fecha.',
        confirmButtonColor: '#0ba36d'
    }).then(() => {
        window.location = '../agregar_disponibilidad.php';
    });
    </script>
    </body>
    </html>
    ";
    exit();
}

$sql = "INSERT INTO disponibilidad_experiencias(
            experiencia,
            fecha_disponible,
            cupos_totales,
            cupos_disponibles
        )
        VALUES(
            :experiencia,
            :fecha,
            :cupos_totales,
            :cupos_disponibles
        )";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':experiencia', $experiencia);
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':cupos_totales', $cupos);
$stmt->bindParam(':cupos_disponibles', $cupos);
$stmt->execute();
header("Location: ../disponibilidad.php");

exit();

?>