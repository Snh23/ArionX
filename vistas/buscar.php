<?php
include_once 'app/escritorentradas.inc.php';
$busqueda = null;
$resultados = null;

$resultados_multiples = null;

if (isset($_POST['buscar']) && ($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
    $busqueda = $_POST['termino-buscar'];
    $resultados_multiples = false;

    Conexion::abrir_con();
    $resultados = RepositorioEntrada::buscar_entradas_todos_campos(Conexion::obtener_con(), $busqueda);
    //if (isset($resultados)) { //con esto checamos que devolvemos resultados
    //print_r($resultados);
    //}
    Conexion::cerrar_con();
}

if (isset($_POST['buscarA']) && ($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
    $busqueda = $_POST['termino-buscar'];
    $resultados_multiples = true;
    //print_r($_POST['campos']); //nos sirve para mostrar si la consulta esta funcionando
    //echo ($_POST['fecha']);
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

<div class="container">
    <div class="row">
        <div class="panel-group">
            <div class="panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#avanzada">Busqueda Avanzada</a>
                    </h4>
                </div>
                <div id="avanzada" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo RUTA_BUSCAR ?>">
                            <div class="form-group">
                                <input class="form-control" name="termino-buscar" type="search" placeholder="¿Que Buscas?" required <?php echo "value='" . $busqueda . "'" ?>>
                            </div>
                            <p>Buscar en los siguientes campos:</p>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="titulo" checked>Titulo
                                <!--almacenamos el valos de cada checkbox en el nombre campos con los corchetes-->
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="contenido" checked>Contenido
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="tags" checked>Tags
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="auor">Autor
                            </label>
                            <hr>
                            <p>Ordenar oir:</p>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="recientes" checked>Entradas mas recientes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="antiguas">Entradas mas antiguas
                            </label>
                            <hr>
                            <button type="submit" name="buscarA" class="btn btn-primary btn-buscar">Busqueda
                                avanzada</button>
                        </form>
                    </div>
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
                    if (!is_null($resultados)) {
                        echo '<small>' . count($resultados) . ' resultados</small>';
                    } else {
                        echo '<small>0 resultados</small>';
                    }
                    ?>
            </div>
        </div>
    </div>
    <?php
    if (!is_null($resultados)) {
        if (!$resultados_multiples) {
            EscritorEntradas::mostrar_entradas_busqueda($resultados);
        } else {
            //mostrar rsultados
        }
    } else {
        //temporal. mover al bloque else mas arriba
        $parametros = count($_POST['campos']);
        $ancho_columnas = 12 / $parametros;
        ?>
        <div class="row">
            <?php
            for ($i = 0; $i < $parametros; $i++) {
                ?>
                <div class="<?php echo 'col-md-' . $ancho_columnas; ?> text-center">
                    <h4><?php echo 'Coincidencias en ' . $_POST['campos'][$i]; ?></h4>
                </div>
            <?php
            }
            ?>
        </div>
        <!--<p>NO existen coincidencias</p>-->
    <?php
}
?>
</div>
<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>