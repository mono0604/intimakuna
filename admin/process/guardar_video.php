<?php
session_start();
require '../../config/database.php';
$titulo = $_POST['titulo'];
$url = $_POST['url_video'];

/* ========================= */
/* CONVERTIR URL YOUTUBE */
/* ========================= */
if(strpos($url, 'watch?v=') !== false){
    parse_str(parse_url($url, PHP_URL_QUERY), $vars);
    $video_id = $vars['v'];
    $url = "https://www.youtube.com/embed/" . $video_id;

}
if(strpos($url, 'youtu.be/') !== false){
    $video_id = basename(parse_url($url, PHP_URL_PATH));
    $url = "https://www.youtube.com/embed/" . $video_id;

}

/* ========================= */
/* GUARDAR */
/* ========================= */
$sql = "INSERT INTO galeria_videos(
            titulo,
            url_video
        )
        VALUES(
            :titulo,
            :url_video
        )";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':url_video', $url);
$stmt->execute();
header("Location: ../galeria.php");