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
define("RUTA_REGISTRO", SERVIDOR."/Registro");
define("RUTA_REGISTRO_CORRECTO", SERVIDOR."/registro_correcto");
define("RUTA_LOGIN", SERVIDOR."/login");
define("RUTA_PRODUCTOS", SERVIDOR."/productos");
define("RUTA_CONTACTO", SERVIDOR."/contacto");
define("RUTA_LOGOUT", SERVIDOR."/logout");

//recursos
define("RUTA_CSS", SERVIDOR."/css");
define("RUTA_JS", SERVIDOR."/js")
?>