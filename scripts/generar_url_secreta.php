<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/usuario.inc.php';
include_once 'app/recupera_clave.inc.php';

include_once 'app/repusuario.inc.php';
include_once 'app/reprecuperaclave.inc.php';

include_once 'app/redireccion.inc.php';

function sa($longitud){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';

    for ($i = 0; $i < $longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }

    return $string_aleatorio;
}

if(isset($_POST['enviar_email'])){
    $email = $_POST['email'];

    Conexion::abrir_con();

    if(!RepositorioUsuario::ema_existe(Conexion::obtener_con(), $email)){ //negamos la sentencia con !
        return;
    }

$usuario = RepositorioUsuario::obtener_usu_por_ema(Conexion::obtener_con(), $email);

$nombre_usuario = $usuario ->get_usuario();
$string_aleatorio = sa(10);

$url_secreta = hash('sha256', $string_aleatorio . $nombre_usuario); //devolvera una cadena de 64 caracteres

$peticion_generada = RepositorioRecuperaClave::genera_peticion(Conexion::obtener_con(), 
                        $usuario ->get_id(), $url_secreta);

Conexion::cerrar_con();

if($peticion_generada){
    Redireccion::redirigir(SERVIDOR);
}

//si la peticion es correcta, notificar instrucciones

}

//si la peticion ha fallado, notificar error

?>