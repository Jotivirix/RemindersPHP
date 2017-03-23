<?php
/**
 * AUTOR:
 * 
 * logout.php es el archivo que se encarga de gestionar el cierre de sesion
 * Quita las cookies puestas en login.php y destruye la sesion así como nos
 * reemplaza al index.php
 */
?>
<?php
session_start();
setcookie("Email", "", time()- 60*60*24*365);
setcookie("Nombre", "", time()- 60*60*24*365);
session_destroy();

header("Location: index.php");
?>