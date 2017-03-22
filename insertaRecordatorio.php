<?php
//Incluyo el archivo funciones para conectarme a la base de datos
include('funciones.php');
//Establezco la hora del servidor a la hora de Madrid
date_default_timezone_set('Europe/Madrid');

//Defino una variable para conectaBBDD();
$mysqli = conectaBBDD();

//leo los parámetros que me pasa el nuevoRecordatorio.php
$asunto = $_POST['asunto'];
$ubicacion = $_POST['ubicacion'];
$fechaYHora = $_POST['fechaYHora'];
$dni = $_POST['dni'];

//Hago la insercion en la base de datos
$insertaRecordatorio = $mysqli->query("INSERT INTO Recordatorio (IDUsuario, Asunto, Ubicacion, FechaVencimiento) VALUES ('$dni', '$asunto', '$ubicacion', '$fechaYHora')");

//Si hay 1 fila afectada, se habrá insertado correctamente. Aviso al usuario que
//la inserción ha sido correcta
if ($mysqli->affected_rows == 1) {
    ?>
    <meta charset="UTF-8">
    <!-- Este archivo gestiona la eliminacion de mascotas --><!-- Modal -->
    <div class="modal fade" id="recordatorioAgregado" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">Cita Añadida Correctamente</h4>
                </div>
                <div class="modal-body">
                    <p>Recordatorio agregado correctamente</p>
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
    echo "$('#recordatorioAgregado').modal('show');";
    echo "</script>";
} 
/**
 * De la misma manera, si algo ha ido mal, aviso al usuario de que ha fallado
 * la inserción del nuevo recordatorio en la base de datos
 */
else {
    ?>
    <div class="modal fade" id="errorRecordatorio" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">Error Al Agregar Recordatorio <span class="glyphicon glyphicon-remove"></span></h4>
                </div>
                <div class="modal-body">
                    <p>Ocurrió un error al agregar el recordatorio</p>
                    <p>Compruebe la conexion y pruebe de nuevo más tarde</p>
                    <?php echo $mysqli->error ?>
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
    echo "$('#errorRecordatorio').modal('show');";
    echo "</script>";
}
?>

    <script>    
    
    /**
     * 
     * @returns {Vuelve al index tras insertar el recordatorio}
     */
    function vuelve(){
        $('#recordatorioAgregado').modal('hide');
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
        $('#errorRecordatorio').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        window.location.replace("index.php");
    }
    
    </script>