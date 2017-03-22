<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['DNI'])) {
    unset($_COOKIE['Email']);
    unset($_COOKIE['Nombre']);
}
if (isset($_COOKIE['Email']) and isset($_COOKIE['Nombre'])) {
    if (isset($_SESSION['DNI'])){
        require 'accesoCorrecto.php';
    }
} 
else {
    if (!isset($_COOKIE['Email']) and ! isset($_COOKIE['Nombre'])) {
        require 'index2.php';
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Con esta línea adaptamos el contenido al ancho del dispositivo -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reminders App</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/miHojaDeEstilos.css" type="text/css">
    </head>    
</html>

<script src="js/jquery-3.1.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>