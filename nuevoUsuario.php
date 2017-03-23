<?php
/**
 * AUTOR:
 * 
 * nuevoUsuario.php es la clase que se encarga de realizar la insercion en la
 * base de datos de nuevos usuarios con los datos que le pasa registro.php
 * Si se realiza el registro se avisa al usuario. Del mismo modo y manera, si
 * algún error ocurre, se le avisa también del error.
 */
?>
    
<?php
//Incluyo el archivo funciones para conectarme a la base de datos
include('funciones.php');
//Establezco la hora del servidor a la hora de Madrid
date_default_timezone_set('Europe/Madrid');

//Defino una variable para conectaBBDD();
$mysqli = conectaBBDD();

//leo los parámetros que me pasa el registro.php
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$username = $_POST['username'];
$password = $_POST['password'];

//Hago la insercion en la base de datos
$insertaRecordatorio = $mysqli->query("INSERT INTO Usuario VALUES ('$dni','$nombre','$apellidos','$email','$username','$password','$fechaNacimiento')");

//Si hay 1 fila afectada, se habrá insertado correctamente.
//Aviso al usuario que la inserción ha sido correcta
if ($mysqli->affected_rows == 1) {
    ?>
    <meta charset="UTF-8">
    <div class="modal fade" id="usuarioAgregado" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">Usuario Añadido Correctamente</h4>
                </div>
                <div class="modal-body">
                    <p>Su nombre de usaurio es: <?php echo $username ?></p>
                    <p>Su contraseña de acceso es: <?php echo $password  ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-success" data-dismiss="modal" onclick="vuelve();">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <?php
    /**
     * Muestro el modal que avisa al usuario que la insercion ha sido correcta
     */
    echo "<script>";
    echo "$('#usuarioAgregado').modal('show');";
    echo "</script>";
} 
/**
 * De la misma manera, si algo ha ido mal, aviso al usuario de que ha fallado
 * la inserción del nuevo recordatorio en la base de datos
 */
else {
    ?>
    <div class="modal fade" id="errorRegistro" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">Error Al Agregar Usuario <span class="glyphicon glyphicon-remove"></span></h4>
                </div>
                <div class="modal-body">
                    <p>Ocurrió un error al insertar sus datos</p>
                    <p>Compruebe la conexion y pruebe de nuevo más tarde</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal" onclick="retry();">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <?php
    /**
     * Muestro el modal que indica que se produjo un error al añadir el recordatorio
     */
    echo "<script>";
    echo "$('#errorRegistro').modal('show');";
    echo "</script>";
}
?>

    <script>    
    
    /**
     * 
     * @returns {Vuelve al index tras insertar el recordatorio}
     */
    function vuelve(){
        $('#usuarioAgregado').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        window.location.replace("index.php");
    }
    
    /**
     * 
     * @returns {Vuelve al index tras ocurrir un error a la hora de insertar
     * el nuevo recordatorio en la base de datos}
     */
    function retry(){
        $('#errorRegistro').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        window.location.replace("index.php");
    }
    
    </script>