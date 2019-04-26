<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repusuario.inc.php';
include_once 'app/redireccion.inc.php';

if(isset($_GET['nombre']) && !empty($_GET['nombre'])){
$nombre = $_GET['nombre'];
}else{
    Redireccion ::redirigir(SERVIDOR);
}

$titulo = '¡Registro Exitoso!';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/documento-nav.inc.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"> Registro Exitoso</span>
                </div>
                <div class="panel-body text-center">
                    <p>¡Gracias por Registrarte! <b><?php echo $nombre ?></b></p>
                    <br>
                    <p><a href="<?php echo RUTA_LOGIN ?>">Inicia sesión</a> para comenzar a usar tu cuenta.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include_once 'Plantillas/documento-cierre.inc.php';
?>