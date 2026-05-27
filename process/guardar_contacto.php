<?php

include '../config/database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    try{

        $sql = "INSERT INTO mensajes_contacto
        (
            nombre,
            correo,
            asunto,
            mensaje
        )

        VALUES
        (
            :nombre,
            :correo,
            :asunto,
            :mensaje
        )";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':mensaje', $mensaje);

        $stmt->execute();

        
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
            title: 'Mensaje enviado',
            text: 'Tu mensaje fue enviado correctamente.',
            confirmButtonColor: '#0ba36d',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            window.location = '../contacto.php';
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