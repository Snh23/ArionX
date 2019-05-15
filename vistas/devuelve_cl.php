<?php
include_once 'app/reprecuperaclave.inc.php';
Conexion::abrir_con();

if(RepositorioRecuperaClave::url_secreta_existe(Conexion::obtener_con(), $url_personal)){
    $id_usuario = RepositorioRecuperaClave::obt_idusu_mediante_urlsecreta(Conexion::obtener_con(), $url_personal);
    echo 'id usuario solicitante: ' . $id_usuario; 
}else{
    echo '404';
}
Conexion::cerrar_con();

$titulo = 'Devuelve Contraseña';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'platillas/docuemnto-nav.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Crea una nueva contraseña</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="">
                        <h2>Escribe tu nueva contraseña</h2>
                        <br>
                        <div class="form-group">
                            <label for="clave">Nueva Contraseña</label>
                            <input type="text">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>