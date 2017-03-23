<?php
    //incluyo funciones.php
    include('./funciones.php');
    //Intento conectarme a la base de datos
    $mysqli = conectaBBDD();

    //Mediante $_POST obtengo los valores que me pasa el index2.php
    //El usuario solo escribe o nombre de usuario o email pero 
    //obtengo los dos valores por si quiere entrar con el nombre
    //de usuario o con el email
    
    //Obtengo el nombre de usuario que ha escrito el usuario
    $nombreUsuario = $_POST['nombreUsuario'];
    //Obtengo el email que ha escrito el usuario
    $email = $_POST['email'];
    //Obtengo la contraseña que escribio el usuario
    $pass = $_POST['pass'];
    
    //Realizo una consulta a la base de datos en funcion del nombre de usuario
    //o del email. Obtengo todos los valores, para más adelante usarlos
    $consulta = $mysqli -> query("SELECT * FROM Usuario WHERE (NombreUsuario = '$nombreUsuario' or  Email= '$email') ;");

    //Obtengo el numero de filas de la consulta
    $num_filas = $consulta -> num_rows;
    
    //Si hay más de 0 filas, habrá un usuario con ese nombre de usuario o email,
    //por tanto en este paso, el usuario estará registrado
    if ($num_filas > 0){
        //Intento obtener los datos del usuario recorriendo el array con el fetch_array()
        $resultado = $consulta ->fetch_array();
        //Obtengo la contraseña de la base de datos y la guardo en $passGuardada
        $passGuardada = $resultado['Pwd'];
        //Obtengo el nombre de la base de datos y lo guardo en $nombre
        $nombre = $resultado['Nombre'];
        //Obtengo el email de la base de datos y lo guardo en $mail
        $mail = $resultado['Email'];
        //Obtengo el DNI de la base de datos y lo guardo en $dni
        $dni = $resultado['DNI'];
        //compruebo que la contraseña es la que tengo guardada en la BBDD
        if ($pass == $passGuardada) {
            /**
             * Si las contraseñas, la escrita y la de la base de datos coinciden,
             * el usuario habrá accedido, por tanto comienzo la sesion y guardo unas
             * variables de sesion y unas cookies para más adelante usar ciertos
             * datos o mantener la sesión iniciada
             */
            session_start();
            $_SESSION['Usuario'] = $nombreUsuario;
            $_SESSION['DNI'] = $dni;
            $_SESSION['Nombre'] = $nombre;
            $_SESSION['Email'] = $mail;
            date_default_timezone_set('Europe/Madrid');
            setcookie('Nombre',  $nombre, time() + 60*60*24*365);
            setcookie('Email',  hash('md5', $email), time() + 60*60*24*365);
            //En este punto cargo la pagina accesoCorrecto.php
            require 'accesoCorrecto.php';
        }
        /**
         * Si no coinciden las contraseñas, le indico al usuario
         * que algo es incorrecto y le invito a volver al login
         */
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
    /**
     * De la misma manera, si no existe el usuario tambien le indico el mismo
     * mensaje de error, por seguridad, para no dar pistas y le invito a volver
     * al login para reintentar el acceso si es que realmente se ha equivocado
     */
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