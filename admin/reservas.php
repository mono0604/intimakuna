<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'reservas';

$sql = "SELECT r.*, e.titulo
        FROM reservas r
        INNER JOIN experiencias e
        ON r.id_experiencia = e.id_experiencia
        ORDER BY r.id_reserva DESC";

$stmt = $conexion->prepare($sql);
$stmt->execute();

$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
<title>
    Reservas Admin
</title>
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
            Reservas Registradas
        </h1>
    </div>

    <!-- TABLA -->
    <div class="table-container">
        <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Personas</th>
                <th>Mensaje</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <tbody>
            <?php foreach($reservas as $reserva): ?>
            <tr>
                <td>
                    <?php echo $reserva['id_reserva']; ?>
                </td>
                <td>
                    <?php echo $reserva['nombre']; ?>
                </td>
                <td>
                    <?php echo $reserva['correo']; ?>
                </td>
                <td>
                <?php
                $telefono = preg_replace('/[^0-9]/', '', $reserva['telefono']);
                ?>
                <a href="https://wa.me/57<?php echo $telefono; ?>"
                   target="_blank"
                   class="telefono-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    <?php echo $reserva['telefono']; ?>
                </a>
                </td>
                <td>
                    <?php echo $reserva['titulo']; ?>
                </td>
                <td>
                    <?php echo $reserva['fecha_reserva']; ?>
                </td>
                <td>
                    <?php echo $reserva['cantidad_personas']; ?>
                </td>
                <td>
                    <?php echo $reserva['mensaje']; ?>
                </td>

                <!-- ESTADO -->
                <td>
                <?php
                $estado = $reserva['estado_reserva'];
                if($estado == 'pendiente'){
                    $clase = 'estado-pendiente';
                }
                elseif($estado == 'confirmado'){
                    $clase = 'estado-confirmado';
                }
                else{
                    $clase = 'estado-cancelado';
                }
                ?>
                <span class="<?php echo $clase; ?>">
                    <?php echo ucfirst($estado); ?>
                </span>
                </td>

                <!-- ACCIONES -->
                <td>
                <form action="process/actualizar_estado_reserva.php"
                      method="POST"
                      class="form-estado">
                    <input type="hidden"
                           name="id_reserva"
                           value="<?php echo $reserva['id_reserva']; ?>">
                    <select name="estado_reserva"
                            class="select-estado"
                            onchange="confirmarCambio(this)">
                        <option value="pendiente"
                            <?php if($estado == 'pendiente') echo 'selected'; ?>>
                            Pendiente
                        </option>
                        <option value="confirmado"
                            <?php if($estado == 'confirmado') echo 'selected'; ?>>
                            Confirmado
                        </option>
                        <option value="cancelado">
                            Cancelar / Eliminar
                        </option>
                    </select>
                </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</div>

<script>
function confirmarCambio(select){
    const valor = select.value;
    if(valor === 'cancelado'){
        const confirmar = confirm(
            '¿Deseas cancelar y eliminar esta reserva?'
        );

        if(confirmar){
            select.form.submit();

        }else{
            location.reload();

        }
    }else{
        select.form.submit();
    }
}

</script>
</body>
</html>
</div>

<script>
function confirmarCambio(select){
    const valor = select.value;
    if(valor === 'cancelado'){
        const confirmar = confirm(
            '¿Deseas cancelar y eliminar esta reserva?'
        );
        if(confirmar){
            select.form.submit();
        }else{
            location.reload();
        }
    }else{
        select.form.submit();
    }
}

</script>
</body>
</html>




