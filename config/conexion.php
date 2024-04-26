<?php

$scon = mysqli_connect('localhost', 'root', '', 'sistema_bdm');

if (!$scon) {
    die("Conexión fallida: " . mysqli_connect_error());
}

mysqli_set_charset($scon, "utf8");
?>