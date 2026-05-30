<?php

include '../../config/database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id_experiencia = $_POST['id_experiencia'];
    $fecha_disponible = $_POST['fecha_disponible'];
    $cupos_totales = $_POST['cupos_totales'];

    try{

        /* ========================= */
        /* VALIDAR DUPLICADOS */
        /* ========================= */

        $sqlValidar = "SELECT *
                       FROM disponibilidad_experiencias
                       WHERE id_experiencia = :id_experiencia
                       AND fecha_disponible = :fecha";

        $stmtValidar = $conexion->prepare($sqlValidar);

        $stmtValidar->bindParam(':id_experiencia', $id_experiencia);
        $stmtValidar->bindParam(':fecha', $fecha_disponible);

        $stmtValidar->execute();

        if($stmtValidar->rowCount() > 0){

            echo "

            <script>
                alert('Ya existe disponibilidad para esta fecha.');
                window.history.back();
            </script>

            ";

            exit();

        }

        /* ========================= */
        /* INSERTAR DISPONIBILIDAD */
        /* ========================= */

        $sql = "INSERT INTO disponibilidad_experiencias
        (
            id_experiencia,
            fecha_disponible,
            cupos_totales,
            cupos_disponibles
        )
        VALUES
        (
            :id_experiencia,
            :fecha,
            :cupos_totales,
            :cupos_disponibles
        )";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':id_experiencia', $id_experiencia);
        $stmt->bindParam(':fecha', $fecha_disponible);
        $stmt->bindParam(':cupos_totales', $cupos_totales);
        $stmt->bindParam(':cupos_disponibles', $cupos_totales);

        $stmt->execute();

        header("Location: ../disponibilidad.php");

        exit();

    }catch(PDOException $e){

        echo "Error: " . $e->getMessage();

    }

}
?>