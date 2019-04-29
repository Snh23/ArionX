<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/usuario.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/comentario.inc.php';

include_once 'app/repusuario.inc.php';
include_once 'app/repentrada.inc.php';
include_once 'app/repentrada.inc.php';

Conexion::abrir_con();
for ($usuarios=0; $usuarios = 100; $usuarios++ ){
$nombre = sa(10);
$apellidos = sa(8).' '.sa(9);
$usuario = sa(6);
$email = sa(6).'@'.sa(3);
$password = password_hash('123456', PASSWORD_DEFAULT);

$usuario = new Usuario('', $nombre, $apellidos, $usuario, $email, $password, '', '');
RepositorioUsuario::insertar_usuarios(Conexion::obtener_con(), $usuario);
}



function sa($longitud){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';

    for ($i = 0; $i = $longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    return $string_aleatorio;
}
?>