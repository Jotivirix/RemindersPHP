<?php
include('funciones.php');
date_default_timezone_set('Europe/Madrid');

$_COOKIE['DNI'] = $dniCrypted;

$dni = 

$mysqli = conectaBBDD();

//leo los parámetros que me pasa el index.php
$asunto = $_POST['asunto'];
$ubicacion = $_POST['ubicacion'];
$fechaYHora = $_POST['fechaYHora'];

$fecha = explode($fechaYHora, " ");

$insertaRecordatorio = $mysqli->query("INSERT INTO Recordatorio (IDUsuario, Asunto, Ubicacion, FechaVencimiento) VALUES ('$dni', '$asunto', '$ubicacion', '$fechaYHora')");

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
                    <p>El recordatorio vence a fecha <?php $fecha[0] ?> y a las <?php $fecha[1] ?> horas</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-success" data-dismiss="modal" onclick="vuelve();">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <?php
    echo "<script>";
    echo "$('#recordatorioAgregado').modal('show');";
    echo "</script>";
} else {
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
    echo "<script>";
    echo "$('#errorRecordatorio').modal('show');";
    echo "</script>";
}
?>

    <script>    
    
    function vuelve(){
        $('#recordatorioAgregado').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
    
    function retry(){
        $('#errorRecordatorio').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
    
    </script>