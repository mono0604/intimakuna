<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'disponibilidad';

/* ========================= */
/* VALIDAR ID */
/* ========================= */
if(!isset($_GET['id'])){
    header("Location: disponibilidad.php");
    exit();

}
$id = $_GET['id'];

/* ========================= */
/* OBTENER DISPONIBILIDAD */
/* ========================= */
$sql = "SELECT *
        FROM disponibilidad_experiencias
        WHERE id_disponibilidad = :id
        LIMIT 1";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$disponibilidad = $stmt->fetch(PDO::FETCH_ASSOC);

/* ========================= */
/* SI NO EXISTE */
/* ========================= */
if(!$disponibilidad){
    header("Location: disponibilidad.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Editar Disponibilidad</title>
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
        <div class="admin-topbar">
            <h1>
                Editar Disponibilidad
            </h1>
        </div>
        <div class="form-admin-container">
            <form action="process/actualizar_disponibilidad.php"
                  method="POST">

                <!-- ID -->
                <input type="hidden"
                       name="id_disponibilidad"
                       value="<?php echo $disponibilidad['id_disponibilidad']; ?>">

                <!-- EXPERIENCIA -->
                <div class="form-group">
                    <label>
                        Experiencia
                    </label>
                    <select name="experiencia"
                            required>
                        <option value="RUTA CUMBAL - MUELLAMUES"
                            <?php if($disponibilidad['experiencia'] == 'RUTA CUMBAL - MUELLAMUES') echo 'selected'; ?>>
                            Ruta Cumbal - Muellamues
                        </option>
                        <option value="SOL DE LOS PASTOS"
                            <?php if($disponibilidad['experiencia'] == 'SOL DE LOS PASTOS') echo 'selected'; ?>>
                            Sol de los Pastos
                        </option>
                        <option value="PUNDÉ INTIMAKUNA"
                            <?php if($disponibilidad['experiencia'] == 'PUNDÉ INTIMAKUNA') echo 'selected'; ?>>
                            Pundé Intimakuna
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
                           value="<?php echo $disponibilidad['fecha_disponible']; ?>"
                           required>
                </div>

                <!-- CUPOS TOTALES -->
                <div class="form-group">
                    <label>
                        Cupos Totales
                    </label>
                    <input type="number"
                           name="cupos_totales"
                           min="1"
                           value="<?php echo $disponibilidad['cupos_totales']; ?>"
                           required>
                </div>

                <!-- CUPOS DISPONIBLES -->
                <div class="form-group">
                    <label>
                        Cupos Disponibles
                    </label>
                    <input type="number"
                           name="cupos_disponibles"
                           min="0"
                           value="<?php echo $disponibilidad['cupos_disponibles']; ?>"
                           required>
                </div>

                <!-- BOTON -->
                <button type="submit"
                        class="btn">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Actualizar Disponibilidad
                </button>
            </form>
        </div>
    </main>
</div>
</body>
</html>