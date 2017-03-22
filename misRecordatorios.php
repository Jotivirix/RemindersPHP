<?php
//Obtengo el DNI del usuario mediante $_POST
//El dni se lo paso a nuevoRecordatorio.php desde accesoCorrecto.php
$dni = $_POST['dni'];
?>

<meta charset="UTF-8">
<link rel="stylesheet" href="css/jquery.dataTables.min.css" type="text/css">

<!-- Div que contiene la tabla de últimos accesos -->
<div id="recordatoriosTabla" style="display: none;">

    <div id="cargaTablaRecordatorios">
        <?php
        include 'funciones.php';
        $mysqli = conectaBBDD();
        //Volcado de una query a un array en php
        //creo el array
        $recordatorios = array();
        //hago la consulta a la BBDD
        date_default_timezone_set('Europe/Madrid');
        $consulta = $mysqli->query("SELECT * FROM Recordatorio WHERE IDUsuario = '$dni'");
        //saco el numero de usuarios que hay en la bbdd
        $numRecordatorios = $consulta -> num_rows;
        //Si no hay recordatorios, oculto la tabla
        if ($numRecordatorios == 0) {
            echo "<script>";
            echo "$('#volverTabla').hide();";
            echo "</script>";
            ?>
            <div class="row">
                <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">                
                    <h2 class="text-center">No tiene recordatorios</h2>
                    <br>
                    <button class="btn btn-lg btn-block btn-info" onclick="inicio();">Volver</button>
                </div>
                <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2"></div>
            </div>
            <?php
        } else {
            //monto un bucle for para cargar en el array los resultados de la query
            for ($i = 0; $i < $numRecordatorios; $i++) {
                $r = $consulta->fetch_array();
                $recordatorios[$i][0] = $r['ID'];
                $recordatorios[$i][1] = $r['Asunto'];
                $recordatorios[$i][2] = $r['Ubicacion'];
                $recordatorios[$i][3] = $r['Completo'];
                $recordatorios[$i][4] = $r['FechaVencimiento'];
            }
            //ahora voy a usar los datos
            ?>
            <h2 class="text-center">Sección de Consulta de Recordatorios</h2>
            <div id="divTablaRecordatorios" style="background-color: rgba(255,255,255,.9)">   
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1"></div>
                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <br>
                        <input class="form-control" id="system-search" name="q" placeholder="Busque Cualquier Valor" required>
                        <br>
                    </div>                    
                    <div class="col-xs-1 col-sm-1 col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1"></div>
                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <table id="tablaRecordatorios" class="table table-bordered table-striped table-list-search">
                            <thead>
                                <tr>
                                    <th class="text-center hidden">ID</th>
                                    <th class="text-center">Asunto</th>
                                    <th class="text-center">Ubicacion</th>
                                    <th class="text-center">Completo</th>
                                    <th class="text-center">Fecha de Vencimiento</th>                                    
                                    <th class="text-center">Completar</th>
                                </tr>
                            </thead>
                            <tbody style="overflow: scroll;">
                                <?php
                                for ($i = 0; $i < $numRecordatorios; $i++) {
                                    echo '<tr class="text-center" id="fila' . $i . '">';
                                    echo '<td class="hidden" id=id'.$i.'>' . $recordatorios[$i][0] . '</td>';
                                    echo '<td>' . $recordatorios[$i][1] . '</td>';
                                    echo '<td>' . $recordatorios[$i][2] . '</td>';
                                    echo '<td>' . $recordatorios[$i][3] . '</td>';
                                    echo '<td>' . $recordatorios[$i][4] . '</td>';
                                    if($recordatorios[$i][3] == 0){
                                    echo '<td><button class="btn btn-primary"><span class="glyphicon glyphicon-edit" id="completaRecordatorio' . $i . '" onclick="completaRecordatorioSeleccionado(\'' . $i . '\');"></span></button></td>';
                                    }
                                    else{
                                    echo '<td>Completo</td>';
                                    }
                                    echo '</tr>';
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>
                        <h4 class="visible-xs hidden-sm hidden-md hidden-lg hintTabla text-center">La tabla tiene scroll horizontal</h4>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1"></div>
                </div>
            </div>
            <br>
            <button class="btn btn-lg btn-block btn-info" id="volverTabla" onclick="volver();">Volver</button>        
            <br>
        </div>
        <div id="modalCompletaRecordatorio"></div>
    </div>


<script src="js/jquery.dataTables.min.js"></script>

<script>

    $(document).ready(function () {
        $('#recordatoriosTabla').fadeIn(1200);
        $('#tablaRecordatorios').DataTable({
            "pagingType": "full_numbers",
            "bFilter": false,
            "aLengthMenu": [[3, 6, 16, 32, 64, -1], [3, 6, 16, 32, 64, "Todas"]],
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ filas",
                "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ filas",
                "oPaginate": {
                    "sFirst": "Primera", // This is the link to the first page
                    "sPrevious": "Anterior", // This is the link to the previous page
                    "sNext": "Siguiente", // This is the link to the next page
                    "sLast": "Última" // This is the link to the last page
                }
            }
        });

        var activeSystemClass = $('.list-group-item.active');

        //something is entered in search form
        $('#system-search').keyup(function () {
            var that = this;
            // affect all table rows on in systems table
            var tableBody = $('.table-list-search tbody');
            var tableRowsClass = $('.table-list-search tbody tr');
            $('.search-sf').remove();
            tableRowsClass.each(function (i, val) {

                //Lower text for case insensitive
                var rowText = $(val).text().toLowerCase();
                var inputText = $(that).val().toLowerCase();
                if (inputText !== '')
                {
                    $('.search-query-sf').remove();
                    tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Filtrando resultados por:"'
                            + $(that).val()
                            + '"</strong></td></tr>');
                } else
                {
                    $('.search-query-sf').remove();
                }

                if (rowText.indexOf(inputText) === -1)
                {
                    //hide rows
                    tableRowsClass.eq(i).hide();

                } else
                {
                    $('.search-sf').remove();
                    tableRowsClass.eq(i).show();
                }
            });
            //all tr elements are hidden
            if (tableRowsClass.children(':visible').length === 0)
            {
                tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">Sin resultados.</td></tr>');
            }
        });
    });
    
    function completaRecordatorioSeleccionado(_ident) {
        var _id = $('#id' + _ident).text();
        var _dni = '<?php echo $dni ?>';
        $('#modalCompletaRecordatorio').load('completaRecordatorio.php', {
            id: _id,
            dni: _dni
        });
    };
    
    function volver(){        
        window.location.replace("index.php");
    }



</script>