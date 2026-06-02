<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'mensajes';
$sql = "SELECT * FROM mensajes_contacto ORDER BY id_mensaje DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Mensajes Admin</title>
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
                Mensajes Recibidos
            </h1>
        </div>

        <!-- TABLA -->
        <div class="table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Asunto</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($mensajes as $mensaje): ?>
                    <tr>
                        <td>
                            <?php echo $mensaje['id_mensaje']; ?>
                        </td>

                        <td>
                            <?php echo $mensaje['nombre']; ?>
                        </td>
                        <td>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $mensaje['correo']; ?>"
                            target="_blank"
                            class="link-contacto">
                            <i class="fa-solid fa-envelope"></i>
                            <?php echo $mensaje['correo']; ?>
                        </a>
                        </td>
                        <td>
                            <?php echo $mensaje['asunto']; ?>
                        </td>
                        <td>
                            <?php echo $mensaje['mensaje']; ?>
                        </td>
                        <td>
                        <?php
                        echo date(
                            'd/m/Y H:i',
                            strtotime($mensaje['fecha_envio'])
                        );
                        ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>