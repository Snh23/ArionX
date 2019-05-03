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
define("RUTA_ENTRADA", SERVIDOR."/entrada");
define("RUTA_FAVORITOS", SERVIDOR."/favoritos");
define("RUTA_LOGOUT", SERVIDOR."/logout");
define("RUTA_GESTOR", SERVIDOR."/gestor");
define("RUTA_GESTOR_ENTRADAS", RUTA_GESTOR."/entradas");
define("RUTA_GESTOR_COMENTARIOS", RUTA_GESTOR."/comentarios");
define("RUTA_GESTOR_FAVORITOS", RUTA_GESTOR."/favoritos");

//recursos
define("RUTA_CSS", SERVIDOR."/css");
define("RUTA_JS", SERVIDOR."/js")
?>