<!-- Este archivo gestiona el cierre de sesión -->
<?php
session_start();
setcookie("Email", "", time()- 60*60*24*365);
setcookie("Nombre", "", time()- 60*60*24*365);
session_destroy();

header("Location: index.php");
?>