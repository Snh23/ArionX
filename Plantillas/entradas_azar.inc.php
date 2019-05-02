<?php
include_once 'app/config.inc.php';
include_once 'app/escritorentradas.inc.php';
include_once 'app/entrada.inc.php';
?>

<div class="row">
    <div class="col-md-12">
        <h1>Otras Entradas Interesantes</h1>
    </div>
    <?php
    /*$arr_len = count($entradas_azar);*/
    for ($i = 0; $i < count($entradas_azar); $i++) {
        $entrada_actual = $entradas_azar[$i];
        ?>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $entrada_actual['titulo']; ?>
                </div>
                <div class="panel-body">
                    <p>
                        <?php echo EscritorEntradas::resumir_texto(nl2br($entrada_actual['texto'])); ?>
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