<?php

include_once __DIR__ . '/../config/database.php';

$sql = "SELECT * FROM contactos LIMIT 1";
$stmt = $conexion->prepare($sql);
$stmt->execute();

$contacto = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<footer>
    <div class="footer-content">

        <h3>Fundación Intimakuna</h3>

        <p>
            Cultura, turismo y fortalecimiento comunitario.
        </p>

        <div class="redes">

            <?php if(!empty($contacto['facebook'])): ?>
                <a href="<?php echo $contacto['facebook']; ?>"
                   target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            <?php endif; ?>

            <?php if(!empty($contacto['instagram'])): ?>
                <a href="<?php echo $contacto['instagram']; ?>"
                   target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            <?php endif; ?>

            <?php if(!empty($contacto['youtube'])): ?>
                <a href="<?php echo $contacto['youtube']; ?>"
                   target="_blank">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            <?php endif; ?>

            <?php if(!empty($contacto['twitter'])): ?>
                <a href="<?php echo $contacto['twitter']; ?>"
                   target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
            <?php endif; ?>

        </div>

        <span>
            Copyright © <?php echo date('Y'); ?> INTIMAKUNA
        </span>

    </div>
</footer>

<!-- WHATSAPP -->

<?php if(!empty($contacto['whatsapp'])): ?>

<a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $contacto['whatsapp']); ?>"
   target="_blank"
   class="whatsapp">

    <i class="fa-brands fa-whatsapp"></i>

</a>

<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

const menuToggle = document.getElementById('menuToggle');
const navbar = document.querySelector('.navbar');

if(menuToggle){

    menuToggle.addEventListener('click', () => {

        navbar.classList.toggle('active');

    });

}

</script>