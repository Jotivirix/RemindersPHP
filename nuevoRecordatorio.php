<?php 

$dni = $_POST['dni'];

echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;
echo $dni;

?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="css/jquery-ui.theme.min.css" type="text/css">

<div>
    <h1 class="text-center">Añadir Nuevo Recordatorio</h1>

    <div id="addRecordatorio">
        <div class="row" id="datosRecordatorio">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <h3 class="text-left">Introduzca el Asunto</h3>
                <textarea maxlength="256" rows="5" id="asuntoRecordatorio"></textarea>
                <h3 class="text-left">Introduzca la Ubicación</h3>
                <input id="ubicacionRecordatorio" class="controls" type="text" placeholder="Ubicacion del Recordatorio" maxlength="512">
                <h3 class="text-left">Seleccione la Fecha de Vencimiento</h3>
                <input id="fechaRecordatorio" type="text" class="form-control" placeholder="Fecha Recordatorio" required>
                <h3 class="text-left">Seleccione la Hora de Vencimiento</h3>
                <select id="horaRecordatorio">
                    <option>0:00</option>
                    <option>1:00</option>
                    <option>2:00</option>
                    <option>3:00</option>
                    <option>4:00</option>
                    <option>5:00</option>
                    <option>6:00</option>
                    <option>7:00</option>
                    <option>8:00</option>
                    <option>9:00</option>
                    <option selected>10:00</option>
                    <option>11:00</option>
                    <option>12:00</option>
                    <option>13:00</option>
                    <option>14:00</option>
                    <option>15:00</option>
                    <option>16:00</option>
                    <option>17:00</option>
                    <option>18:00</option>
                    <option>19:00</option>
                    <option>20:00</option>
                    <option>21:00</option>
                    <option>22:00</option>
                    <option>23:00</option>
                </select>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        <br>
        <div id="resultadoInsercion"></div>
        <br>
        <br>
        <div class="row hidden-xs">         
            <br>
            <div class="col-sm-1 col-md-1 col-lg-1"></div>            
            <div class="col-sm-5 col-md-5 col-lg-5">
                <button class="btn btn-lg btn-primary btn-block" id="addRecordatorioBtn">Agregar Recordatorio</button>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5">
                <button class="btn btn-lg btn-danger btn-block" id="botonVolver"><span class="glyphicon glyphicon-arrow-left"></span> Volver a Inicio <span class="glyphicon glyphicon-arrow-left"></span></button>
            </div>
            <div class="col-sm-1 col-md-1 col-lg-1"></div>   
            <br>
        </div>
        <div class="row visible-xs">         
            <br>  
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
                <button class="btn btn-lg btn-primary btn-block" id="addRecordatorioBtn">Agregar Recordatorio</button>
                <br>
                <button class="btn btn-lg btn-danger btn-block" id="botonVolver"><span class="glyphicon glyphicon-arrow-left"></span> Volver a Inicio <span class="glyphicon glyphicon-arrow-left"></span></button>
            </div>
            <div class="col-xs-1"></div>
        </div>
        <br>
    </div>
    <div>
        <br>
        <div class="row">
            <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2"></div>
            <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">
            </div>
            <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2"></div>
        </div>
    </div>
</div>

<script src="js/jquery-ui.min.js"></script>

<script>

    /**
     * 
     * @type Establece el datepicker, es decir el calendario
     * al formato de fecha español, los nombres de los meses,
     * los nombres de los dias, etc.
     * Además pone la fecha en formato MySQL AÑO-MES-DIA
     */
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        minDate: 0,
        beforeShowDay: $.datepicker.noWeekends
    };

    /**
     * 
     * @param {type} param
     * Establece el datepicker al formato español por defecto
     */
    $.datepicker.setDefaults($.datepicker.regional['es']);

    /**
     * Establece que el campo fechaNacimiento es de tipo datepicker
     */
    $("#fechaRecordatorio").datepicker();

    function agregaRecordatorio() {
        var _asunto = $('#asuntoRecordatorio').val();
        var _ubicacion = $('#ubicacionRecordatorio').val();
        var _fecha = $('#fechaRecordatorio').val();
        var _hora = $('#horaRecordatorio option:selected').text();
        var _fechaYHora = _fecha + ' ' + _hora;
        console.log(_asunto);
        console.log(_ubicacion);
        console.log(_fechaYHora);
        $('#resultadoInsercion').load('insertaRecordatorio.php',{
            asunto: _asunto,
            ubicacion: _ubicacion,
            fechaYHora: _fechaYHora
        });
    }

    $('#addRecordatorioBtn').click(function () {
        agregaRecordatorio();
    });


</script>

<script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

    function initAutocomplete() {

        // Create the search box and link it to the UI element.
        var input = document.getElementById('ubicacionRecordatorio');
        var searchBox = new google.maps.places.SearchBox(input);

        // [START region_getplaces]
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length === 0) {
                return;
            }

        });
        // [END region_getplaces]
    }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3E4-IyhIDzdvPzqfrtW6wp7f6hD3OoNg&libraries=places&callback=initAutocomplete" async defer></script>