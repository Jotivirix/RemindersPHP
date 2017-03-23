<?php
/**
 * AUTOR:
 * 
 * funciones.php es el archivo que se encarga de realizar la conexion
 * a la base de datos con los parametros de configuracion
 */
?>
    
    
    
<?php

function conectaBBDD(){
    require('configuracion.php');
    $conexion_mysql = new mysqli($servidor, $usuario_mysql, $clave_mysql, $bd);
    $conexion_mysql -> query("SET NAMES UTF8");
    return $conexion_mysql;
}

?>