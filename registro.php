<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="css/jquery-ui.theme.min.css" type="text/css">

<body>
    <div class="" id="divRegistro" style="display: none;">
        <div class="container">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" id="titulo">
                <h1 class="text-center">Sección de Registro</h1>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        <br>
        <div class="container">
            <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2"></div>
            <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8" id="registroNuevoUsuario">
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" id="seccionRegistro">
                        <h3 class="text-left">Introduzca Su Nombre</h3>
                        <input id="nombreUsuario" class="controls" type="text" placeholder="Nombre" maxlength="32" onclick="compruebaLongitudCampos();">
                        
                        <h3 class="text-left">Introduzca Sus Apellidos</h3>
                        <input id="apellidosUsuario" class="controls" type="text" placeholder="Apellidos" maxlength="64" onclick="compruebaLongitudCampos();">
                        
                        <h3 class="text-left">Introduzca Su DNI</h3>
                        <input id="DNIUsuario" class="controls" type="text" placeholder="DNI Con Letra" maxlength="9" onclick="compruebaLongitudCampos();">
                        <p class="text-center" style="color: yellow" id="DNIRepetido">DNI Ya Presente En La Base De Datos</p>
                        
                        <h3 class="text-left">Introduzca Su Email</h3>
                        <input id="emailUsuario" class="controls" type="email" placeholder="Email" maxlength="128" onclick="compruebaLongitudCampos();">
                        <p class="text-center" style="color: yellow" id="EmailRepetido">Email Ya Presente En La Base De Datos</p>
                        
                        <h3 class="text-left">Introduzca Su Fecha de Nacimiento</h3>
                        <input id="fechaNacimientoUsuario" class="controls" type="text" placeholder="Fecha de Nacimiento" onclick="compruebaLongitudCampos();">
                        
                        <h3 class="text-left">Introduzca Un Nombre de Usuario</h3>
                        <input id="userName" class="controls" type="text" placeholder="Nombre de Usuario" maxlength="64" onclick="compruebaLongitudCampos();">
                        <p class="text-center" style="color: yellow" id="NombreUsuarioRepetido">Nombre de Usuario No Disponible</p>
                        
                        <h3 class="text-left">Introduzca Una Contraseña</h3>
                        <input id="passwordUser" class="controls" type="password" placeholder="Contraseña" maxlength="64" onclick="compruebaLongitudCampos();">
                        <br>
                        <h4 class="text-center" style="color: white" id="requieroCampos">Todos los campos son requeridos</h4>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                </div>
                <div class="row" id="chequeaDatos"></div>
                <div class="row" id="intentaRegistro"></div>
                <br>
                <div class="row hidden-xs">
                    <div class="col-sm-1 col-md-1 col-lg-1"></div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <button class="btn btn-lg btn-block btn-danger" id="backIndex">Volver A Inicio</button>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <button class="btn btn-lg btn-block btn-success" id="registrarme" onclick="registraNuevoUsuario();">Registrarse</button>
                    </div>                    
                    <div class="col-sm-1 col-md-1 col-lg-1"></div>
                </div>
                <div class="row visible-xs">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10">                        
                        <button class="btn btn-lg btn-block btn-danger" id="backIndexXS">Volver A Inicio</button>
                        <br>
                        <button class="btn btn-lg btn-block btn-success" id="registrarmeXS" onclick="registraNuevoUsuario();">Registrarse</button>
                    </div>
                    <div class="col-xs-1"></div>
                </div>
                <br>
            </div>
            <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2"></div>
        </div>
    </div>
</body>

<script src="js/jquery-3.1.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>

    /**
     * 
     * @document.ready {} 
     * Funcion que se ejcuta nada más que el documento está listo
     * Hago fadein de 1200ms del div divRegistro 
     */
    $(document).ready(function () {
        $('#divRegistro').fadeIn(1200);
        $('#NombreUsuarioRepetido').css('display','none');
        $('#EmailRepetido').css('display','none');
        $('#DNIRepetido').css('display','none');
    });
    
    $('#DNIUsuario').focus(function (){
        compruebaCamposClave();
    });
    
    $('#emailUsuario').focus(function (){
        compruebaCamposClave();
    });
    
    $('#userName').focus(function (){
        compruebaCamposClave();
    });
    
    window.setInterval(function(){
        compruebaLongitudCampos();
    }, 100);
    
    function compruebaLongitudCampos(){
        var _nombre = $('#nombreUsuario').val();
        var _apellidos = $('#apellidosUsuario').val();
        var _dni = $('#DNIUsuario').val();
        var _email = $('#emailUsuario').val();
        var _username = $('#userName').val();
        var _password = $('#passwordUser').val();
        if(_nombre.length === 0 || _apellidos.length === 0 || _dni.length === 0
                || _email.length === 0 || _username.length === 0 || _password.length === 0){
            $('#registrarme').prop('disabled', true);                 
            $('#registrarmeXS').prop('disabled', true);
        }
        else if(_nombre.length >= 1 && _apellidos.length >= 1 
                && _dni.length >= 1 && _email.length >= 1 
                && _username.length >= 1 && _password.length >= 1){            
            $('#registrarme').prop('disabled', false);                 
            $('#registrarmeXS').prop('disabled', false);
            $('#requieroCampos').css("display","none");
        }
    }
    
    function compruebaCamposClave(){
        var _dni = $('#DNIUsuario').val();
        var _email = $('#emailUsuario').val();
        var _username = $('#userName').val();
        
        $('#chequeaDatos').load('compruebaCampos.php',{
            dni: _dni,
            email: _email,
            username: _username
        });
    }
    
    function registraNuevoUsuario(){        
        var _nombre = $('#nombreUsuario').val();
        var _apellidos = $('#apellidosUsuario').val();
        var _dni = $('#DNIUsuario').val();
        var _email = $('#emailUsuario').val();
        var _fechaNacimiento = $('#fechaNacimientoUsuario').val();
        var _username = $('#userName').val();
        var _password = $('#passwordUser').val();
        
        $('#intentaRegistro').load('nuevoUsuario.php',{
            nombre: _nombre,
            apellidos: _apellidos,
            dni: _dni,
            email: _email,
            fechaNacimiento: _fechaNacimiento,
            username: _username,
            password: _password
        });

    }
    
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
    $("#fechaNacimientoUsuario").datepicker();

</script>