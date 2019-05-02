<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/usuario.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/comentario.inc.php';

include_once 'app/repusuario.inc.php';
include_once 'app/repentrada.inc.php';
include_once 'app/repcomentario.inc.php';

$tirulo = $entrada->get_titulo();

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/documento-nav.inc.php';

?>

<div class="container contenido-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?php echo $entrada->get_titulo(); ?>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
                Por
                <a href="#">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <?php echo $autor->get_usuario(); ?>
                </a>
                el
                <?php echo $entrada->get_fecha(); ?>
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <?php echo nl2br($entrada->get_texto()); ?>
            </article>
        </div>
    </div>
    <?php include_once 'Plantillas/entradas_azar.inc.php'; ?>
</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>