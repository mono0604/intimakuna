<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

require '../config/database.php';

$pagina_actual = 'disponibilidad';

/* ========================= */
/* OBTENER DISPONIBILIDAD */
/* ========================= */

$sql = "SELECT *
        FROM disponibilidad_experiencias
        ORDER BY fecha_disponible ASC";

$stmt = $conexion->prepare($sql);

$stmt->execute();

$disponibilidad = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Disponibilidad</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="admin-panel">

    <!-- SIDEBAR -->

    <?php include 'includes/sidebar.php'; ?>

    <!-- CONTENIDO -->

    <main class="admin-content">

        <!-- TOPBAR -->

        <div class="admin-topbar">

            <h1>
                Disponibilidad de Experiencias
            </h1>

            <a href="agregar_disponibilidad.php"
               class="btn">

                <i class="fa-solid fa-plus"></i>

                Nueva Fecha

            </a>

        </div>

        <!-- TABLA -->

        <div class="admin-tabla-container">

            <table class="admin-tabla">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Experiencia</th>

                        <th>Fecha</th>

                        <th>Cupos Totales</th>

                        <th>Cupos Disponibles</th>

                        <th>Estado</th>

                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($disponibilidad as $item){ ?>

                    <tr>

                        <td>
                            <?php echo $item['id_disponibilidad']; ?>
                        </td>

                        <td>
                            <?php echo $item['experiencia']; ?>
                        </td>

                        <td>
                            <?php echo $item['fecha_disponible']; ?>
                        </td>

                        <td>
                            <?php echo $item['cupos_totales']; ?>
                        </td>

                        <td>
                            <?php echo $item['cupos_disponibles']; ?>
                        </td>
                        <td>
                            <?php 
                            if($item['cupos_disponibles'] <= 0){
                                echo "<span class='estado-agotado'>Agotado</span>";
                            }elseif($item['cupos_disponibles'] <= 5){
                                echo "<span class='estado-pocos'>Últimos Cupos</span>";
                            }else{
                                echo "<span class='estado-disponible'>Disponible</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <div class="acciones-admin">
                                <!-- EDITAR -->
                                <a href="editar_disponibilidad.php?id=<?php echo $item['id_disponibilidad']; ?>"
                                   class="btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <!-- ELIMINAR -->
                                <a href="process/eliminar_disponibilidad.php?id=<?php echo $item['id_disponibilidad']; ?>"
                                   class="btn-delete"
                                   onclick="return confirm('¿Eliminar disponibilidad?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>