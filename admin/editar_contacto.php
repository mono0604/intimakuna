<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$pagina_actual = 'edit_contacto';

include '../config/database.php';

/* =========================
   OBTENER CONFIGURACIÓN
========================= */

$sql = "SELECT * FROM contactos LIMIT 1";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$contacto = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Editar Contactos</title>

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
            <h1>Contacto y Redes Sociales</h1>
        </div>
        <div class="admin-form-box">
            <form action="process/actualizar_contactos.php"
                  method="POST"
                  class="admin-form">      
                <!-- ID -->
                <input type="hidden"
                       name="id_contacto"
                       value="<?php echo $contacto['id_contacto']; ?>">
                <h1>
                    <strong>REDES SOCIALES</strong>
                </h1>
                <label>Facebook</label>
                <input type="text"
                    name="facebook"
                    value="<?php echo htmlspecialchars($contacto['facebook']); ?>">
                <label>Instagram</label>
                <input type="text"
                    name="instagram"
                    value="<?php echo htmlspecialchars($contacto['instagram']); ?>">
                <label>YouTube</label>
                <input type="text"
                    name="youtube"
                    value="<?php echo htmlspecialchars($contacto['youtube']); ?>">
                <label>X / Twitter</label>
                <input type="text"
                    name="twitter"
                    value="<?php echo htmlspecialchars($contacto['twitter']); ?>"><br>
                <h1>
                    <strong>CONTACTOS</strong>
                </h1>
                <label>Teléfono</label>
                <input type="text"
                    name="telefono"
                    value="<?php echo htmlspecialchars($contacto['telefono']); ?>">

                <label>WhatsApp</label>
                <input type="text"
                    name="whatsapp"
                    value="<?php echo htmlspecialchars($contacto['whatsapp']); ?>">

                <label>Dirección</label>
                <input type="text"
                    name="direccion"
                    value="<?php echo htmlspecialchars($contacto['direccion']); ?>">

                <label>Correo Electrónico</label>
                <input type="email"
                    name="correo"
                    value="<?php echo htmlspecialchars($contacto['correo']); ?>">

                <button type="submit"
                        class="btn">
                    Actualizar contactos
                </button>
            </form>
        </div>
    </main>
</div>
<script src="includes/admin.js"></script>
</body>
</html>