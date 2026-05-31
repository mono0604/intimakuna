<?php
require 'config/database.php';
$id = $_GET['id'];

/* ========================= */
/* EVENTO */
/* ========================= */
$sql = "SELECT *
        FROM noticias
        WHERE id_noticia = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$noticia = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $noticia['titulo']; ?>
    </title>
    <link rel="stylesheet"
          href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>


<!-- HERO -->
<section class="hero-general"
style="background-image:url('admin/assets/img/noticias/<?php echo $noticia['imagen']; ?>');">
    <div class="overlay-general"></div>
    <div class="hero-general-content">
        <h1>
            <?php echo $noticia['titulo']; ?>
        </h1>
        <p>
            <?php echo $noticia['categoria']; ?>
        </p>
        <td>
            <?php
                echo date(
                    'd/m/Y',
                strtotime($noticia['fecha_publicacion'])
                );
            ?>
        </td>
    </div>
</section>

<!-- DETALLE -->
<section class="detalle-evento">
    <div class="detalle-container">

        <!-- DESCRIPCION -->
        <div class="detalle-texto">
            <img src="admin/assets/img/noticias/<?php echo $noticia['imagen']; ?>"
                class="img-evento">
            <h2>
                Información de la noticia
            </h2>
            <p>
                <?php echo $noticia['contenido']; ?>
            </p>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>