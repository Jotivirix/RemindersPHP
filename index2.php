<link rel="icon" type="image/png" href="img/favicon.png"/>
<meta charset="UTF-8">

<body>
    <div class="" id="contenedor" style="display: none; margin: 0">
        <div class="container">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" id="titulo">
                <h1 class="text-center">Reminders App</h1>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
        <br>
        <div class="container">
            <div class="col-xs-1 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-10 col-sm-6 col-md-6 col-lg-6" id="UsernameAndPassword">
                <br>
                <div class="row">
                    <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3"></div>
                    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6">
                        <img src="img/accesso.png" class="img-circle img-responsive">
                    </div>
                    <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-sm-1 col-md-1 col-lg-1"></div>
                    <div class="col-sm-10 col-md-10 col-lg-10" id="datosLogin">
                        <h3 class="text-left">Introduzca Su Usuario</h3>
                        <input id="nombreUsuario" class="form-control" type="text" placeholder="Usuario/Email">
                        <br>
                        <h3 class="text-left">Introduzca Su Contraseña</h3>
                        <input id="pass" class="form-control" type="password" placeholder="Contraseña">
                        <br>
                        <br>
                        <button class="btn btn-lg btn-block btn-success" id="btnEntrar">ENTRAR</button>
                        <br>
                        <br>
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1"></div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </div>
</body>

<script src="js/jquery-3.1.0.min.js"></script>

<script>

    //Hago que el div se reajuste en funcion de la altura
    //Asi mantengo la imagen de fondo
    function autoResizeDiv() {
        document.getElementById('contenedor').style.height = window.innerHeight + 'px';
    }
    ;

    /**
     * 
     * @document.ready {} 
     * Funcion que se ejcuta nada más que el documento está listo
     * Hago fadein de 2200ms del div contenedor 
     */
    $(document).ready(function () {
        $('#contenedor').fadeIn(2200);
        window.onresize = autoResizeDiv;
        autoResizeDiv();
    });

    /**
     * 
     * @returns {cargo en #contenedor el login con los parametros pasados}
     */
    function cargaLogin() {
        //Nombre de usuario y email son el mismo campo, de esta manera, el usuario
        //puede entrar tecleando su nombre de usuario o su email
        
        //Obtengo el nombre de usaurio escrito
        var _nombreUsuario = $('#nombreUsuario').val();
        //Obtengo el email
        var _email = $('#nombreUsuario').val();
        //Obtengo la contraseña
        var _pass = $('#pass').val();

        $('#contenedor').load('login.php', {
            nombreUsuario: _nombreUsuario,
            email: _email,
            pass: _pass
        });
    }
    ;

    /**
     * 
     * Al pulsar el boton de entrar se carga la funcion cargaLogin();
     */
    $('#btnEntrar').click(function () {
        cargaLogin();
    });

</script>