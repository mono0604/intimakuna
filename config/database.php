<?php

/* ========================= */
/* RENDER DATABASE URL */
/* ========================= */
$database_url = getenv("DATABASE_URL");
if($database_url){
    $db = parse_url($database_url);
    $host = $db['host'];
    $user = $db['user'];
    $password = $db['pass'];

    /* EXTRAER DBNAME */
    $dbname = ltrim($db['path'], '/');

    /* PUERTO POR DEFECTO */
    $port = isset($db['port']) ? $db['port'] : 5432;
}else{

    /* ========================= */
    /* LOCALHOST XAMPP */
    /* ========================= */
    $host = "localhost";
    $port = "5432";
    $dbname = "intimakuna_db";
    $user = "postgres";
    $password = "12345";
}

try {
    $conexion = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password
    );
    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>