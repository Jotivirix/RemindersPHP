<?php
/**
 * AUTOR:
 * 
 * completaRecordatorio.php es la clase que se encarga de insertar en
 * nuestra base de datos los datos del recordatorio insertado desde la
 * clase nuevoRecordatorio.php. En funcion del resultado de la inserción
 * sale un mensaje u otro al usuario
 */
?>
    
<?php
//Incluyo el archivo funciones para conectarme a la base de datos
include('funciones.php');
//Establezco la hora del servidor a la hora de Madrid
date_default_timezone_set('Europe/Madrid');

//Defino una variable para conectaBBDD();
$mysqli = conectaBBDD();

//leo los parámetros que me pasa el misRecordatorios.php
$idRecordatorio = $_POST['id'];
$dniUsuario = $_POST['dni'];

//Intento actualizar el estado del recordatorio
$actualizaRecordatorio = $mysqli->query("UPDATE Recordatorio SET Completo = 1 WHERE ID = $idRecordatorio AND IDUsuario = '$dniUsuario'");

//Si hay 1 fila afectada, se habrá insertado correctamente. Aviso al usuario que
//la inserción ha sido correcta
if ($mysqli->affected_rows == 1) {
    ?>
    <meta charset="UTF-8">
    <!-- Este archivo gestiona la eliminacion de mascotas --><!-- Modal -->
    <div class="modal fade" id="recordatorioCompletado" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">Recordatorio Completado</h4>
                </div>
                <div class="modal-body">
                    <p>Recordatorio completado correctamente</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-success" data-dismiss="modal" onclick="vuelve();">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <?php
    /**
     * Muestro el modal que avisa al usuario que la tarea de completar
     * el recordatorio ha sido correcta
     */
    echo "<script>";
    echo "$('#recordatorioCompletado').modal('show');";
    echo "</script>";
} 
/**
 * De la misma manera, si algo ha ido mal, aviso al usuario de que ha fallado
 * la inserción del nuevo recordatorio en la base de datos
 */
else {
    ?>
    <div class="modal fade" id="errorCompletarRecordatorio" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">Error Al Completar Recordatorio <span class="glyphicon glyphicon-remove"></span></h4>
                </div>
                <div class="modal-body">
                    <p>Ocurrió un error al intentar completar el recordatorio</p>
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
     * Muestro el modal que indica que se produjo un error al completar el recordatorio
     */
    echo "<script>";
    echo "$('#errorCompletarRecordatorio').modal('show');";
    echo "</script>";
}
?>

    <script>    
    
    /**
     * 
     * @returns {Vuelve al index tras insertar el recordatorio}
     */
    function vuelve(){
        var _dni = '<?php echo $dniUsuario ?>';
        $('#recordatorioAgregado').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('#interfazUsuario').load('misRecordatorios.php',{
            dni: _dni
        });
    }
    
    /**
     * 
     * @returns {Vuelve al index tras ocurrir un error a la hora de insertar
     * el nuevo recordatorio en la base de datos}
     */
    function retry(){
        var _dni = '<?php echo $dniUsuario ?>';
        $('#errorRecordatorio').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('#interfazUsuario').load('misRecordatorios.php',{
            dni: _dni
        });
    }
    
    </script>