<?php

/* ===================================== */
/* DETECTAR PRODUCCION O LOCAL */
/* ===================================== */

if(getenv("DATABASE_URL")){

    /* ===================================== */
    /* PRODUCCION - RENDER */
    /* ===================================== */

    $databaseUrl = getenv("DATABASE_URL");

    $db = parse_url($databaseUrl);

    $host = $db["host"];
    $port = $db["port"];
    $dbname = ltrim($db["path"], '/');
    $user = $db["user"];
    $password = $db["pass"];

}else{

    /* ===================================== */
    /* LOCALHOST */
    /* ===================================== */

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