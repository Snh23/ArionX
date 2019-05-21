<?php
include_once 'app/reprecuperaclave.inc.php';
include_once 'app/redireccion.inc.php';
Conexion::abrir_con();

if(RepositorioRecuperaClave::url_secreta_existe(Conexion::obtener_con(), $url_personal)){
    $id_usuario = RepositorioRecuperaClave::obt_idusu_mediante_urlsecreta(Conexion::obtener_con(), $url_personal);
    //echo 'id usuario solicitante: ' . $id_usuario; 
}else{
    echo '404';
}
if(isset($_POST['guardar_clave'])){
    //validar clave 1
    //validar clave 2 debe coincidir con la clave 1
    //convertir el proceso en una transaccion - begin
    $clave_cifrada = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $clave_actualiza = RepositorioUsuario::actualizar_pass(Conexion::obtener_con(), $id_usuario, $clave_cifrada);

    //redirigir a notificacion de actualizacion correcta y ofrecer link a login
    if($clave_actualiza){
        Redireccion::redirigir(RUTA_LOGIN);
    }else{
        //eliminar solicitud de recuperacion de contraseña
        //informar error - podemos incluir ajax para mostrar errores
    }
}

Conexion::cerrar_con();

$titulo = 'Devuelve Contraseña';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/documento-nav.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Crea una nueva contraseña</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="<?php echo RUTA_DEVUELVE_CLAVE . "/" . $url_personal ?>">
                        <br>
                        <div class="form-group">
                            <label for="clave">Nueva Contraseña</label>
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Minimo 6 caracteres" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="clave2">Repite Contraseña</label>
                            <input type="password" name="clave2" id="clave2" class="form-control" placeholder="Debe coincidir" required>
                        </div>
                        <br>
                        <button type="submit" name="guardar_clave" class="btn btn-lg btn-primary btn-block">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>