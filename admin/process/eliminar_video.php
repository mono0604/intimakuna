<?php
session_start();
require '../../config/database.php';
$id = $_GET['id'];
$sql = "DELETE FROM galeria_videos
        WHERE id_video = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header("Location: ../galeria.php");