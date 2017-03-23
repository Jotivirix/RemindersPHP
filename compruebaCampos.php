<?php

/**
 * AUTOR:
 * 
 * compruebaCampos.php es la clase que se encarga de comprobar que los 
 * campos clave de la base de datos, concretamente de la tabla de usuario
 * no se repiten. Los campos clave son DNI, Email y Nombre de Usuario.
 * Mediante esta clase, comprobaremos que esos campos introducidos en registro.php
 * son únicos y no están ya presentes en la base de datos.
 * 
 * Si están presentes al usuario le sale un mensaje y se le deshabilita
 * el botón para registrarse. Si por el contrario, están disponibles, el
 * usuario podrá proceder con el registro.
 */
?>


<?php

//incluyo funciones.php
include('./funciones.php');
//Intento conectarme a la base de datos
$mysqli = conectaBBDD();

/*
 * Mediante $_POST obtengo los valores que me pasa registro.php
 * Esto lo hago para comprobar que los campos como EMAIL, DNI y
 * NOMBRE DE USAURIO son únicos y no haya errores al registrar
 * un nuevo usuario en la base de datos
 */

//Obtengo el dni que escribio el nuevo usuario
$dni = $_POST['dni'];
//Obtengo el email que ha escrito el nuevo usuario
$email = $_POST['email'];
//Obtengo el nombre de usuario que ha escrito el nuevo usuario
$username = $_POST['username'];

//Realizo una consulta a la base de datos en funcion del nombre de usuario
$consulta = $mysqli->query("SELECT * FROM Usuario WHERE (NombreUsuario = '$username')");

//Obtengo el numero de filas de la consulta
$num_filas = $consulta->num_rows;

//Si hay más de 0 filas, habrá un usuario con ese nombre de usuario o email,
//por tanto en este paso, el usuario estará registrado
if ($num_filas > 0) {
    ?>
    <script>
        $('#NombreUsuarioRepetido').css("display", "block");
        $('#registrarme').prop('disabled', true);
        $('#registrarmeXS').prop('disabled', true);
    </script>
    <?php

} else {
    ?>
    <script>
        $('#NombreUsuarioRepetido').css("display", "none");
        $('#registrarme').prop('disabled', false);
        $('#registrarmeXS').prop('disabled', false);
    </script>
    <?php

    //Realizo una consulta a la base de datos en funcion del email del usuario
    $consulta2 = $mysqli->query("SELECT * FROM Usuario WHERE (Email = '$email')");

    $num_filas2 = $consulta2->num_rows;

    //Si hay más de 0 filas, habrá un usuario con ese nombre de usuario o email,
    //por tanto en este paso, el usuario estará registrado
    if ($num_filas2 > 0) {
        ?>
        <script>
            $('#EmailRepetido').css("display", "block");
            $('#registrarme').prop('disabled', true);
            $('#registrarmeXS').prop('disabled', true);
        </script>
        <?php

    } else {
        ?>
        <script>
            $('#EmailRepetido').css("display", "none");
            $('#registrarme').prop('disabled', false);
            $('#registrarmeXS').prop('disabled', false);
        </script>
        <?php

        //Realizo una consulta a la base de datos en funcion del email del usuario
        $consulta3 = $mysqli->query("SELECT * FROM Usuario WHERE (DNI = '$dni')");

        $num_filas3 = $consulta3->num_rows;

        //Si hay más de 0 filas, habrá un usuario con ese nombre de usuario o email,
        //por tanto en este paso, el usuario estará registrado
        if ($num_filas3 > 0) {
            ?>
            <script>
                $('#DNIRepetido').css("display", "block");
                $('#registrarme').prop('disabled', true);
                $('#registrarmeXS').prop('disabled', true);
            </script>
            <?php

        } else {
            ?>
            <script>
                $('#DNIRepetido').css("display", "none");
                $('#registrarme').prop('disabled', false);
                $('#registrarmeXS').prop('disabled', false);
            </script>
            <?php

        }
    }
}
?>