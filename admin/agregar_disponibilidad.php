<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$pagina_actual = 'disponibilidad';

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Agregar Disponibilidad</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="admin-panel">

    <?php include 'includes/sidebar.php'; ?>

    <main class="admin-content">

        <div class="admin-topbar">

            <h1>
                Nueva Disponibilidad
            </h1>

        </div>

        <div class="form-admin-container">

            <form action="process/guardar_disponibilidad.php"
                  method="POST">

                <!-- EXPERIENCIA -->

                <div class="form-group">

                    <label>
                        Experiencia
                    </label>

                    <select name="experiencia"
                            required>

                        <option value="">
                            Selecciona una experiencia
                        </option>

                        <option value="RUTA CUMBAL - MUELLAMUES">
                            RUTA CUMBAL - MUELLAMUES
                        </option>

                        <option value="SOL DE LOS PASTOS">
                            SOL DE LOS PASTOS
                        </option>

                        <option value="PUNDÉ INTIMAKUNA">
                            PUNDÉ INTIMAKUNA
                        </option>

                    </select>

                </div>

                <!-- FECHA -->

                <div class="form-group">

                    <label>
                        Fecha Disponible
                    </label>

                    <input type="date"
                           name="fecha_disponible"
                           required>

                </div>

                <!-- CUPOS -->

                <div class="form-group">

                    <label>
                        Cupos Totales
                    </label>

                    <input type="number"
                           name="cupos_totales"
                           min="1"
                           required>

                </div>

                <button type="submit"
                        class="btn">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Guardar Disponibilidad

                </button>

            </form>

        </div>

    </main>

</div>

</body>
</html>