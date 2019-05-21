<?php
include_once 'app/escritorentradas.inc.php';
$busqueda = null;
$resultados = null;

if (isset($_POST['buscar']) && ($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
    $busqueda = $_POST['termino-buscar'];

    Conexion::abrir_con();
    $resultados = RepositorioEntrada::buscar_entradas_todos_campos(Conexion::obtener_con(), $busqueda);
    //if (isset($resultados)) { con esto checamos que devolvemos resultados
    //print_r($resultados);
    //}
    Conexion::cerrar_con();
}

$titulo = "Buscar en Arion";
include_once 'Plantillas/documento-declaracion.inc.php';
include_once 'Plantillas/documento-nav.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="jumbotron">
            <h1 class="text-center">Buscar en Arion</h1>
            <br>
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <form role="form" method="post" action="<?php echo RUTA_BUSCAR ?>">
                        <div class="form-group">
                            <input class="form-control" name="termino-buscar" type="search" placeholder="¿Que Buscas?" required <?php echo "value='" . $busqueda . "'" ?>>
                        </div>
                        <button type="submit" name="buscar" class="form-control btn btn-primary btn-buscar">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="resultados">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    Resultados
                    <?php
                    if(count($resultados)){
                        echo '<small>' . count($resultados) . ' resultados</small>';
                    }
                    ?>
            </div>
        </div>
    </div>
    <?php
    if(count($resultados)){ 
        EscritorEntradas::mostrar_entradas_busqueda($resultados);
    }else{
        ?>
        <p>NO existen coincidencias</p>
        <?php
    }
    ?>
</div>
<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>