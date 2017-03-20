<?php

    include('./funciones.php');
    $mysqli = conectaBBDD();

    $nombreUsuario = $_POST['nombreUsuario'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $consulta = $mysqli -> query("SELECT * FROM Usuario WHERE (nombreUsuario = '$nombreUsuario' or  email= '$email') ;");

    $num_filas = $consulta -> num_rows;
    
    if ($num_filas > 0){
        session_start();
        $_SESSION['usuario'] = $nombreUsuario;
        $resultado = $consulta ->fetch_array();
        $passGuardada = $resultado['Pwd'];
        //compruebo que la contraseña es la que tengo guardada en la BBDD
        if ($pass == $passGuardada){
            require 'accesoCorrecto.php';
        }
        else {
            ?>
            <div>
                <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6">
                    <h1 style="text-align: center">Usuario Y/O Contraseña Incorrecto/s</h1>
                    <a href="./index.php" class="btn btn-block btn-lg btn-primary">Volver</a>
                </div>
                <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3"></div>
            </div>
            <?php
        }   
    }
    else {
        ?>
        <div>
            <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6">
                <h1 style="text-align: center">Usuario Y/O Contraseña Incorrecto/s</h1>
                <a href="./index.php" class="btn btn-block btn-lg btn-primary">Volver</a>
            </div>
            <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <?php
    }   

?>