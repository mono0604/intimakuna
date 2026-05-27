<?php
include __DIR__ . '/config.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<header class="header">
    <!-- LOGO -->
    <div class="logo">
        <a href="<?php echo $base_url; ?>index.php">
            <img src="<?php echo $base_url; ?>assets/img/logo.png">
        </a>
    </div>

    <!-- MENU -->
    <nav class="navbar">
        <ul>
            <li>
                <a href="<?php echo $base_url; ?>index.php">
                    Inicio
                </a>
            </li>
            <li>
                <a href="<?php echo $base_url; ?>index.php#nosotros">
                    Nosotros
                </a>
            </li>
            <li>
                <a href="<?php echo $base_url; ?>index.php#servicios">
                    Servicios
                </a>
            </li>
            <li>
                <a href="<?php echo $base_url; ?>index.php#catalogo">
                    experiencias
                </a>
            </li>
            <li>
                <a href="<?php echo $base_url; ?>eventos.php">
                    Eventos
                </a>
            </li>
            <li>
                <a href="<?php echo $base_url; ?>noticias.php">
                    Noticias y convocatorias
                </a>
            </li>
            <li>
                <a href="<?php echo $base_url; ?>galeria.php">
                    Galería
                </a>
            </li>
            <li>
                <a href="<?php echo $base_url; ?>reservas.php">
                    Reservas
                </a>
            </li>
            <li>
                <a href="<?php echo $base_url; ?>contacto.php">
                    Contacto
                </a>
            </li>
            <!-- LOGIN ADMIN -->
            <?php if(isset($_SESSION['admin'])): ?>
                <li>
                    <a href="admin/login.php"
                       class="btn-login">
                        Panel Admin
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="admin/login.php"
                       class="btn-login">
                        Iniciar Sesión
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>