<?php
/**
 * AUTOR:
 * 
 * accesoCorrecto.php es la clase que se encarga de mostrar la interfaz principal
 * de la aplicacion. Llegamos a ella tras pasar por el index y hacer un login
 * satisfactorio. Desde esta clase podremos añadir nuevos recordatorios así
 * como consultar los que ya hemos añadido con anterioridad
 */
?>

<?php
//Guardo en la variable $nombre el valor de la $_SESSION de Nombre
$nombre = $_SESSION['Nombre'];
//Guardo en la variable $dni el valor de la $_SESSION del DNI
$dni = $_SESSION['DNI'];
?>
<div>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> Reminders App</a>
            <a class="navbar-brand visible-xs" style="float: right; font-size: 100%;" href="logout.php">Cerrar Sesión</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="hidden-lg hidden-md hidden-sm"><a href="logout.php">Cerrar Sesión</a></li>
                <li class="hidden-lg hidden-md hidden-sm" style="float: right;" id="contraerBtn"><a href="#">Contraer</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 5px;">
                <li style="float: right;">
                    <a href="logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <div class="container" id="interfazUsuario">
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" id="titulo">
                <h1 class="text-center">Bienvenido <?php echo $nombre ?></h1>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-sm-5 col-md-5 col-lg-5" id="titulo">
                <button class="btn btn-lg btn-block btn-success" id="nuevoRecordatorio">Nuevo Recordatorio <span class="glyphicon glyphicon-edit"></span></button>
            </div>
            <br class="visible-xs">
            <div class="col-sm-5 col-md-5 col-lg-5" id="titulo">
                <button class="btn btn-lg btn-block btn-warning" id="misRecordatorios">Ver Mis Recordatorios</button>
            </div>
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
        </div>
    </div>
</div>

<script src="js/jquery-3.1.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>

    /**
     * 
     * @returns {Carga en #contenedor el index.php}
     */
    function inicio() {
        $('#contenedor').load('index.php');
    };

    /**
     * 
     * @returns {carga en #interfazUsuario el archivo nuevoRecordatorio.php
     * y le paso por parametro el dni}
     */
    function addRecordatorio(){
        var _dni = '<?php echo $dni ?>';
        $('#interfazUsuario').load('nuevoRecordatorio.php',{
            dni: _dni
        });
    }
    
    /**
     * 
     * @returns {carga en #interfazUsuario el archivo misRecordatorios.php
     * y le paso por parametro el dni}
     */
    function verRecordatorios(){
        var _dni = '<?php echo $dni ?>';
        $('#interfazUsuario').load('misRecordatorios.php',{
            dni: _dni
        });
    }
    
    //Cuando hago clicj en nuevoRecordatorio se ejecuta la funcion addRecordatorio();
    $('#nuevoRecordatorio').click(function(){
        addRecordatorio();
    });
    
    //Cuando hago clicj en misRecordatorios se ejecuta la funcion verRecordatorios();
    $('#misRecordatorios').click(function(){
        verRecordatorios();
    });

</script>