<?php
/*$nombre_serv = 'localhost';
$nombre_bd = 'arion';
$nombre_usu = 'root';
$pass_serv = '';*/ //para evitar errores en la conexion
// lo mejor sera usar constantes las cuales se definen de la siguiente manera
//info para conectarse a la base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_BD', 'arion');
define('NOMBRE_USU', 'root');
define('PASS_SERV', '');

//rutas de la web
define("SERVIDOR", "http://localhost:8080/ArionX");
define("RUTA_REGISTRO", SERVIDOR."/registro.php");
define("RUTA_REGISTRO_CORRECTO", SERVIDOR."/registro_correcto.php");
define("RUTA_LOGIN", SERVIDOR."/login.php");
define("RUTA_PRODUCTOS", SERVIDOR."/productos.php");
define("RUTA_CONTACTO", SERVIDOR."/contacto.php");
define("RUTA_LOGOUT", SERVIDOR."/logout.php");
?>