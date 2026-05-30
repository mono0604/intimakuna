<?php

if($_SERVER['HTTP_HOST'] == 'localhost'){
    $base_url = "http://localhost/intimakuna/";
}else{
    $base_url = "https://" . $_SERVER['HTTP_HOST'] . "/";
}

?>