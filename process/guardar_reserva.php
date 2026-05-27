<?php
include '../config/database.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $destino = $_POST['destino'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $cantidad_personas = $_POST['cantidad_personas'];
    $mensaje = $_POST['mensaje'];
    try{
        $sql = "INSERT INTO reservas
        (
            nombre,
            correo,
            telefono,
            destino,
            fecha_reserva,
            cantidad_personas,
            mensaje
        )
        VALUES
        (
            :nombre,
            :correo,
            :telefono,
            :destino,
            :fecha_reserva,
            :cantidad_personas,
            :mensaje
        )";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':destino', $destino);
        $stmt->bindParam(':fecha_reserva', $fecha_reserva);
        $stmt->bindParam(':cantidad_personas', $cantidad_personas);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->execute();


        /* ========================= */
        /* DESCONTAR CUPOS */
        /* ========================= */
        $sqlCupos = "UPDATE disponibilidad_experiencias
        SET cupos_disponibles = cupos_disponibles - :cantidad
        WHERE experiencia = :destino
        AND fecha_disponible = :fecha";
        $stmtCupos = $conexion->prepare($sqlCupos);
        $stmtCupos->bindParam(':cantidad', $cantidad_personas);
        $stmtCupos->bindParam(':destino', $destino);
        $stmtCupos->bindParam(':fecha', $fecha_reserva);
        $stmtCupos->execute();

        echo "

        <!DOCTYPE html>
        <html lang='es'>
        <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Reserva realizada',
            text: 'Tu reserva fue registrada exitosamente.',
            confirmButtonColor: '#0ba36d',
            confirmButtonText: 'Continuar'
        }).then(() => {
            window.location = '../index.php';
        });
        </script>
        </body>
        </html>
        ";

    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}
?>