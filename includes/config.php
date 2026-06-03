<?php
$host = $_SERVER['HTTP_HOST'];
if(str_contains($host, 'localhost')){
    $base_url = "http://localhost/intimakuna/";
}
elseif(str_contains($host, 'ngrok')){
    $base_url = "https://" . $host . "/intimakuna/";
}
else{
    $base_url = "https://" . $host . "/";
}
?>