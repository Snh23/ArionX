<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/usuario.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/comentario.inc.php';

include_once 'app/repusuario.inc.php';
include_once 'app/repentrada.inc.php';
include_once 'app/repcomentario.inc.php';

$componentes_url = parse_url($_SERVER["REQUEST_URI"]);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if($partes_ruta[0]=='ArionX'){
    if(count($partes_ruta) == 1){
        $ruta_elegida = "vistas/home.php";
    }elseif(count($partes_ruta) == 2) {
        switch($partes_ruta[1]){
            case 'login':
                $ruta_elegida = 'vistas/login.php';
                break;
            case 'logout':
                $ruta_elegida = 'vistas/logout.php';
                break;
            case 'Registro':
                $ruta_elegida = 'vistas/Registro.php';
                break;
            case 'gestor':
                $ruta_elegida = 'vistas/gestor.php';
                $gestor_actual = '';
                break;
            case 'Relleno_dev':
                $ruta_elegida = 'scripts/script_relleno.php';
                break;
            case 'nueva_entrada':
                $ruta_elegida = 'vistas/nueva_entrada.php';
                break;
            case 'borrar_entrada':
                $ruta_elegida = 'scripts/borrar_entrada.php';
                break;
        }
    }elseif(count($partes_ruta) == 3){
        if($partes_ruta[1]== 'registro_correcto'){
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro_correcto.php';
        }
        if($partes_ruta[1] == 'entrada'){
            $url = $partes_ruta[2];
            Conexion::abrir_con();
            $entrada = RepositorioEntrada::obtener_entrada_url(Conexion::obtener_con(), $url);

            if($entrada != null){
                $autor = RepositorioUsuario::obtener_usu_por_id(Conexion::obtener_con(), $entrada ->get_autorid());
                $comentarios = RepositorioComentario::obtener_comentario(Conexion::obtener_con(), $entrada ->get_id());
                $entradas_azar = RepositorioEntrada::obtener_entradas_azar(Conexion::obtener_con(), 3);
                $ruta_elegida = 'vistas/entrada.php';
            }
        }
        if($partes_ruta[1] == 'gestor'){
            switch($partes_ruta[2]){
                case 'entradas':
                    $gestor_actual = 'entradas';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'comentarios':
                    $gestor_actual = 'comentarios';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'favoritos':
                    $gestor_actual = 'favoritos';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
            }
        }
    }
}

include_once $ruta_elegida;
/*if($partes_ruta[2]=='Registro.php'){
    include_once 'vistas/Registro.php';
}elseif($partes_ruta[2]== 'login.php'){
    include_once 'vistas/login.php';
}elseif($partes_ruta[1]== 'ArionX'){
    include_once 'vistas/home.php';
}else{
    echo '404';
}*/
?>