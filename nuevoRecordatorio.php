<?php 
//Obtengo el DNI del usuario mediante $_POST
//El dni se lo paso a nuevoRecordatorio.php desde accesoCorrecto.php
$dni = $_POST['dni'];
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="css/jquery-ui.theme.min.css" type="text/css">

<div id="contenedor2">
    <h1 class="text-center">Añadir Nuevo Recordatorio</h1>
    <div id="addRecordatorio">
        <div class="row" id="datosRecordatorio">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <h3 class="text-left">Introduzca el Asunto</h3>
                <textarea maxlength="256" rows="5" id="asuntoRecordatorio"></textarea>
                <!--<input id="ubicacionRecordatorio" class="controls" type="text" placeholder="Ubicacion del Recordatorio" maxlength="512">-->
                <h3 class="text-left">Introduzca la Latitud</h3>
                <input id="latitudObtenida" class="controls" type="text" placeholder="Latitud" maxlength="32">
                <h3 class="text-left">Introduzca la Longitud</h3>
                <input id="longitudObtenida" class="controls" type="text" placeholder="Longitud" maxlength="32">
                <br>
                <p class="text-center" id="errorUbicacionActual"></p>
                <br>
                <button class="btn btn-default btn-block btn-lg" id="getLocationBtn">
                    <span class="glyphicon glyphicon-map-marker"></span> Obtener la localización actual <span class="glyphicon glyphicon-map-marker"></span>
                </button>
                <h3 class="text-left">Seleccione la Fecha de Vencimiento</h3>
                <input id="fechaRecordatorio" type="text" class="form-control" placeholder="Fecha Recordatorio" required>
                <h3 class="text-left">Seleccione la Hora de Vencimiento</h3>
                <select id="horaRecordatorio">
                    <option selected>Seleccione la hora</option>
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
                    <option>10:00</option>
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
        <div id="resultadoInsercion"></div>
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
                <button class="btn btn-lg btn-primary btn-block" id="addRecordatorioBtnXS">Agregar Recordatorio</button>
                <br>
                <button class="btn btn-lg btn-danger btn-block" id="botonVolverXS"><span class="glyphicon glyphicon-arrow-left"></span> Volver a Inicio <span class="glyphicon glyphicon-arrow-left"></span></button>
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
     * @returns {compruebaDatos();}
     * Al cargar la pagina compruebo los datos del recordatorio
     */
    $(document).ready(function() {
        compruebaDatos();
        latitud.value = "40.372";
        longitud.value = "-3.915";
    });
    
    /**
     * 
     * @returns {compruebaDatos();}
     * Cuando el foco está sobre el campo del asunto del
     * recordatorio chequeo los datos del recordatorio
     */
    $('#asuntoRecordatorio').focus(function() {
        compruebaDatos();
    });
    
    /**
     * 
     * @returns {compruebaDatos();}
     * Cuando hace click sobre el campo del asunto del
     * recordatorio chequeo los datos del recordatorio
     */
    $('#asuntoRecordatorio').click(function() {
        compruebaDatos();
    });
    
    /**
     * 
     * @returns {compruebaDatos();}
     * Cuando el foco está sobre el campo de la ubicacion del
     * recordatorio chequeo los datos del recordatorio
     */
    $('#ubicacionRecordatorio').focus(function() {
        compruebaDatos();
    });
    
    /**
     * 
     * @returns {compruebaDatos();}
     * Cuando hace click sobre el campo de la ubicacion del
     * recordatorio chequeo los datos del recordatorio
     */
    $('#ubicacionRecordatorio').click(function() {
        compruebaDatos();
    });
    
    /**
     * 
     * @returns {compruebaDatos();}
     * Cuando el foco está sobre el campo de la fecha del
     * recordatorio chequeo los datos del recordatorio
     */
    $('#fechaRecordatorio').focus(function() {
        compruebaDatos();
    });
    
    /**
     * 
     * @returns {compruebaDatos();}
     * Cuando hace click sobre el campo de la fecha del
     * recordatorio chequeo los datos del recordatorio
     */
    $('#fechaRecordatorio').click(function() {
        compruebaDatos();
    });
    
    /**
     * 
     * @returns {compruebaDatos();}
     * Cuando el foco está sobre el campo de la hora del
     * recordatorio chequeo los datos del recordatorio
     */
    $('#horaRecordatorio').focus(function() {
        compruebaDatos();
    });
    
    /**
     * 
     * @returns {compruebaDatos();}
     * Cuando hace click sobre el campo de la hora del
     * recordatorio chequeo los datos del recordatorio
     */
    $('#horaRecordatorio').click(function() {
        compruebaDatos();
    });

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
        minDate: 0
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
    $("#fechaRecordatorio").datepicker()
    
    /**
     * 
     * @returns {bloquea el boton de añadir recordatorio o no en funcion
     * de si están rellenados los datos del recordatorio correctamente
     * o no. Tienen que estar completos todos los datos}
     */
    function compruebaDatos(){
        //Obtengo el asunto
        var _asunto = $('#asuntoRecordatorio').val();
        //Obtengo la latitud
        var _lat = $('#latitudObtenida').val();
        //Obtengo la longitud
        var _long = $('#longitudObtenida').val();
        //Obtengo la fecha
        var _fecha = $('#fechaRecordatorio').val();
        //Obtengo la hora
        var _hora = $('#horaRecordatorio option:selected').text();
        //Obtengo si el campo de la hora está con 'Seleccione la hora'
        var coincide = _hora.localeCompare('Seleccione la hora');
        //Si el asunto está vacio, la latitud está vacía, la longitud está vacia
        //la fecha está vacia o bien, la hora está con el valor
        //'Seleccione la hora' deshabilito el boton para añadir nuevos
        //recordatorios y cambio el texto del botón
        if(_asunto.length === 0 || _fecha.length === 0 || coincide === -1){
            $('#addRecordatorioBtn').prop('disabled', true);            
            $('#addRecordatorioBtn').text('Rellene los datos');
        }
        //Por el contrario, si está todo correcto, habilito el botón
        //y reseteo el texto del mismo
        else {
            $('#addRecordatorioBtn').prop('disabled', false);
            $('#addRecordatorioBtn').text('Agregar recordatorio');
        }
    }

    /**
     * 
     * @returns {Carga en el div con id resultadoInsercion el archivo
     * insertaRecordatorio.php con los parametros asunto, ubicacion,
     * fechaYHora y dni. Ese archivo, se encarga de insertar los
     * recordatorios en la base de datos}
     */
    function agregaRecordatorio() {
        //Obtengo el dni del usuario
        var _dni = '<?php echo $dni; ?>';
        //Obtengo el asunto
        var _asunto = $('#asuntoRecordatorio').val();
        //Obtengo la latitud
        var _lati = $('#latitudObtenida').val();
        //Obtengo la longitud
        var _longi = $('#longitudObtenida').val();
        //Obtengo la fecha del recordatorio
        var _fecha = $('#fechaRecordatorio').val();
        //Obtengo la hora del recordatorio
        var _hora = $('#horaRecordatorio option:selected').text();
        //Junto fecha y hora para pasarselo a la base de datos
        var _fechaYHora = _fecha + ' ' + _hora;
        //Intento llamar a insertaRecordatorio.php con los parametros
        //necesarios para insertar los datos en la base de datos
        $('#resultadoInsercion').load('insertaRecordatorio.php',{
            asunto: _asunto,
            latitud: _lati,
            longitud: _longi,
            fechaYHora: _fechaYHora,
            dni: _dni
        });
    }

    /**
     * Cuando hago click en el boton de agregar nuevo recordatorio
     * se ejecuta la función agregarRecordatorio
     */
    $('#addRecordatorioBtn').click(function () {
        agregaRecordatorio();
    });
    
    /**
     * Cuando hago click en el boton de agregar nuevo recordatorio
     * en version XS se ejecuta la función agregarRecordatorio
     */
    $('#addRecordatorioBtnXS').click(function(){
        agregaRecordatorio();
    });
    
    /**
     * Cuando hago click en el boton de volver de añadir recordatorio
     * se redirige la localizacion al index.php
     */
    $('#botonVolver').click(function() {        
        window.location.replace("index.php");
    });
    
    /**
     * Cuando hago click en el boton de volver de añadir recordatorio
     * en version XS se redirige la localizacion al index.php
     */
    $('#botonVolverXS').click(function() {        
        window.location.replace("index.php");
    });
    
    var latitud = document.getElementById("latitudObtenida");
    var longitud = document.getElementById("longitudObtenida");
    var x = document.getElementById("errorUbicacionActual");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";}
        }

    function showPosition(position) {
        latitud.value = position.coords.latitude;
        longitud.value = position.coords.longitude;
    }
    
    function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "El usuario ha bloqueado el permiso de Geolocalizacion.";
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Información de Loclización no disponible.";
            break;
        case error.TIMEOUT:
            x.innerHTML = "Se excedió el límite de tiempo para obtener la solicitud";
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "Ocurrió un error desconocido.";
            break;
    }
}
    
    $('#getLocationBtn').click(function() {
        getLocation();
    });

//    //*********----API DE GOOGLE PARA LA BARRA DE LAS UBICACIONES----*********\\
//
//    // This example adds a search box to a map, using the Google Place Autocomplete
//    // feature. People can enter geographical searches. The search box will return a
//    // pick list containing a mix of places and predicted search terms.
//
//    function initAutocomplete() {
//
//        // Create the search box and link it to the UI element.
//        var input = document.getElementById('ubicacionRecordatorio');
//        var searchBox = new google.maps.places.SearchBox(input);
//
//        // [START region_getplaces]
//        // Listen for the event fired when the user selects a prediction and retrieve
//        // more details for that place.
//        searchBox.addListener('places_changed', function () {
//            var places = searchBox.getPlaces();
//
//            if (places.length === 0) {
//                return;
//            }
//
//        });
//        // [END region_getplaces]
//    }
//
//
//</script>

<!-- Script para ejecutar la API de Google -->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3E4-IyhIDzdvPzqfrtW6wp7f6hD3OoNg&libraries=places&callback=initAutocomplete" async defer></script>-->