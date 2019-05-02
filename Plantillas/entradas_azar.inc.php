<?php
include_once 'app/config.inc.php';
include_once 'app/escritorentradas.inc.php';
?>

<div class="row">
    <div class="col-md-12">
        <h1>Otras Entradas Interesantes</h1>
    </div>
    <?php
    for ($i = 0; $i < count($entradas_azar); $i++) {
        $entrada_actual = $entradas_azar['id'];
        ?>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $entrada_actual->get_titulo(); ?>
                </div>
                <div class="panel-body">
                    <p>
                        <?php echo EscritorEntradas::resumir_texto(nl2br($entrada_actual->get_texto())); ?>
                    </p>
                </div>
            </div>
        </div>
    <?php
}
?>
    <div class="col-md-12">
        <hr>
    </div>
</div>