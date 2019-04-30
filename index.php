<?php 
$componentes_url = parse_url($_SERVER["REQUEST_URI"]);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);

if($partes_ruta[2]=='Registro.php'){
    include_once 'vistas/Registro.php';
}elseif($partes_ruta[2]== 'login.php'){
    include_once 'vistas/login.php';
}elseif($partes_ruta[1]== 'ArionX'){
    include_once 'vistas/home.php';
}else{
    echo '404';
}
?>