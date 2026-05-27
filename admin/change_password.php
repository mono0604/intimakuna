<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
require '../config/database.php';
$pagina_actual = 'change_password';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
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
                Cambiar Contraseña
            </h1>
        </div>
        <div class="form-admin-container">

            <?php if(isset($_GET['success'])): ?>

                <div class="alert-success">
                    Contraseña actualizada correctamente.
                </div>

            <?php endif; ?>
            <?php if(isset($_GET['error'])): ?>

                <div class="alert-error">
                    La contraseña actual es incorrecta.
                </div>

            <?php endif; ?>

            <form action="process/update_password.php"
                  method="POST"
                  class="form-admin">
                <div class="form-group">
                    <label>
                        Contraseña Actual
                    </label>
                    <input type="password"
                           name="actual"
                           required>
                </div>
                <div class="form-group">
                    <label>
                        Nueva Contraseña
                    </label>
                    <input type="password"
                           name="nueva"
                           required>
                </div>
                <div class="form-group">
                    <label>
                        Confirmar Nueva Contraseña
                    </label>
                    <input type="password"
                           name="confirmar"
                           required>
                </div>
                <button type="submit"
                        class="btn">
                    <i class="fa-solid fa-key"></i>
                    Actualizar Contraseña
                </button>
            </form>
        </div>
    </main>
</div>
</body>
</html>