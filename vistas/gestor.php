<?php
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/documento-nav.inc.php';
include_once 'plantillas/panel_control_inicio.inc.php';
switch($gestor_actual){
    case '';
        $cantidad_entradas_act = RepositorioEntrada::contar_entradas_activas_usu(Conexion::obtener_con(), $_SESSION['id_usuario']);
        $cantidad_entradas_inact = RepositorioEntrada::contar_entradas_inactivas_usu(Conexion::obtener_con(), $_SESSION['id_usuario']);

        $cantidad_comentarios_act = RepositorioComentario::contar_comentarios_activos_usu(Conexion::obtener_con(), $_SESSION['id_usuario']);
        include_once 'plantillas/gestor_generico.inc.php';
        break;
    case 'entradas';
        include_once 'plantillas/gestor_entradas.inc.php';
        break;
    case 'comentarios';
        include_once 'plantillas/gestor_comentarios.inc.php';
        break;
    case 'favoritos';
        include_once 'plantillas/gestor_favoritos.inc.php';
        break;
}

include_once 'plantillas/panel_control_cierre.inc.php'
?>



<?php
include_once 'plantillas/documento-cierre.inc.php';
?>