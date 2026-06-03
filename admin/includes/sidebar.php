<button class="admin-toggle" id="adminToggle">
    ☰ Menú Admin
</button>

<aside class="sidebar-admin" id="sidebarAdmin">

    <!-- LOGO -->
    <div class="sidebar-logo">

        <a href="../index.php">
            <img src="../assets/img/logo.png" alt="">
            <h2>INTIMAKUNA</h2>
        </a>
    </div>

    <!-- MENU SUPERIOR -->
    <ul class="sidebar-top">
        <li>
            <a href="dashboard.php"
               class="<?php echo ($pagina_actual == 'dashboard') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-chart-line"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="reservas.php"
               class="<?php echo ($pagina_actual == 'reservas') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-calendar-check"></i>
                Reservas
            </a>
        </li>
        <li>
            <a href="disponibilidad.php"
            class="<?php echo ($pagina_actual == 'disponibilidad') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-users"></i>
                Disponibilidad
            </a>
        </li>
        <li>
            <a href="mensajes.php"
               class="<?php echo ($pagina_actual == 'mensajes') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-envelope"></i>
                Mensajes
            </a>
        </li>
        <li>
            <a href="eventos.php"
               class="<?php echo ($pagina_actual == 'eventos') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-calendar-days"></i>
                Eventos
            </a>
        </li>
        <li>
            <a href="galeria.php"
               class="<?php echo ($pagina_actual == 'galeria') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-image"></i>
                Galería
            </a>
        </li>
        <li>
            <a href="noticias.php"
               class="<?php echo ($pagina_actual == 'noticias') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-newspaper"></i>
                Noticias
            </a>
        </li>
    </ul>
    <!-- MENU INFERIOR -->    
    <ul class="sidebar-bottom">
        <li>
            <a href="editar_contacto.php"
               class="<?php echo ($pagina_actual == 'edit_contacto') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-address-book"></i>
                Editar Contactos
            </a>
        </li>
        <li>
            <a href="change_password.php"
               class="<?php echo ($pagina_actual == 'change_password') ? 'active-admin' : ''; ?>">
                <i class="fa-solid fa-key"></i>
                Cambiar Contraseña
            </a>
        </li>
        <li>
            <a href="logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                Cerrar Sesión
            </a>
        </li>
    </ul>
</aside>
