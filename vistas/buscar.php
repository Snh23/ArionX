<?php
include_once 'app/escritorentradas.inc.php';
include_once 'Plantillas/documento-declaracion.inc.php';
include_once 'Plantillas/documento-nav.inc.php';

$busqueda = null;
$resultados = null;

$buscar_titulo = false;
$buscar_contenido = false;
$buscar_tags = false;
$buscar_usuario = false;

$buscar_antiguas = false;

if (isset($_POST['buscar']) && ($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
    $busqueda = $_POST['termino-buscar'];
    $orden = 'DESC';
    Conexion::abrir_con();
    $resultados = RepositorioEntrada::buscar_entradas_todos_campos(Conexion::obtener_con(), $busqueda, $orden);
    //if (isset($resultados)) { //con esto checamos que devolvemos resultados
    //print_r($resultados);
    //}
    Conexion::cerrar_con();
}

if (isset($_POST['buscarA']) && isset($_POST['campos'])) {

    if (in_array("titulo", $_POST['campos'])) {
        $buscar_titulo = true;
    }
    if (in_array("contenido", $_POST['campos'])) {
        $buscar_contenido = true;
    }
    if (in_array("tags", $_POST['campos'])) {
        $buscar_tags = true;
    }
    if (in_array("usuario", $_POST['campos'])) {
        $buscar_usuario = true;
    }

    if ($_POST['fecha'] == 'recientes') {
        $orden = "DESC";
    } else {
        $orden = "ASC";
    }

    if (($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
        $busqueda = $_POST['termino-buscar'];

        Conexion::abrir_con();

        if ($buscar_titulo) {
            $entradas_por_titulo = RepositorioEntrada::buscar_entradas_por_titulo(Conexion::obtener_con(), $busqueda, $orden);
            //print_r($entradas_por_titulo);
            //?>
            //<br>
            //<br>
        //<?php
    }
    if ($buscar_contenido) {
        $entradas_por_contenido = RepositorioEntrada::buscar_entradas_por_texto(Conexion::obtener_con(), $busqueda, $orden);
        //print_r($entradas_por_contenido);
        //?>
            //<br>
            //<br>
        //<?php
    }
    if ($buscar_tags) {
        //echo "Aun no esta Implementado";
        //?>
            //<br>
            //<br>
        //<?php
    }
    if ($buscar_usuario) {
        $entradas_por_usuario = RepositorioEntrada::buscar_entradas_por_autor(Conexion::obtener_con(), $busqueda, $orden);
        //print_r($entradas_por_usuario);
        //?>
            //<br>
            //<br>
        //<?php
    }
    //print_r($_POST['campos']); //nos sirve para mostrar si la consulta esta funcionando
    //?>
        //<br>
        //<br>
        //<?php

        //echo ($_POST['fecha']);
        //?>
        //<br>
        //<br>
    //<?php

}
}
$titulo = "Buscar en Arion";
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
                                <!--almacenamos el valor de cada checkbox en el nombre campos con los corchetes-->
                                <input type="checkbox" name="campos[]" value="titulo" <?php
                                                                                        if (isset($_POST['buscarA'])) {
                                                                                            if ($buscar_titulo) {
                                                                                                echo "checked";
                                                                                            }
                                                                                        } else {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>Titulo
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="contenido" <?php
                                                                                            if (isset($_POST['buscarA'])) {
                                                                                                if ($buscar_contenido) {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            } else {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>Contenido
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="tags" <?php
                                                                                    if (isset($_POST['buscarA'])) {
                                                                                        if ($buscar_tags) {
                                                                                            echo "checked";
                                                                                        }
                                                                                    } else {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>Tags
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="usuario" <?php
                                                                                        if (isset($_POST['buscarA'])) {
                                                                                            if ($buscar_usuario) {
                                                                                                echo "checked";
                                                                                            }
                                                                                        }
                                                                                        ?>>Autor
                            </label>
                            <hr>
                            <p>Ordenar por:</p>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="recientes" <?php
                                                                                    if (isset($_POST['buscarA']) && isset($orden) && $orden == 'DESC') {
                                                                                        echo "checked";
                                                                                    }
                                                                                    if (!isset($_POST['buscarA'])) {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>Entradas mas recientes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="antiguas" <?php
                                                                                    if (isset($_POST['buscarA']) && isset($orden) && $orden == 'ASC') {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>Entradas mas antiguas
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
                    if (isset($_POST['buscar']) && count($resultados)) {
                        echo " ";

                        ?>
                        <small><?php echo count($resultados); ?></small>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['buscar'])) {
        if (count($resultados)) {
            EscritorEntradas::mostrar_entradas_busqueda($resultados);
        } else {
            ?>
            <h3>Sin coincidencias</h3>
        <?php
    }
} else if (isset($_POST['buscarA'])) {
    if (!is_null($entradas_por_titulo) || !is_null($entradas_por_contenido) || !is_null($entradas_por_usuario)) {
        $parametros = count($_POST['campos']);
        $ancho_columnas = 12 / $parametros;
        ?>
            <div class="row">
                <?php
                for ($i = 0; $i < $parametros; $i++) {
                    ?>
                    <div class="<?php echo 'col-md-' . $ancho_columnas; ?> text-center">
                        <h4><?php echo 'Coincidencias en ' . $_POST['campos'][$i]; ?></h4>
                        <br>
                        <?php
                        switch ($_POST['campos'][$i]) {
                            case "titulo";
                                EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_titulo);
                                break;
                            case "contenido";
                                EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_contenido);
                                break;
                            case "usuario";
                                EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_usuario);
                                break;
                            case "tags";

                                break;
                        }
                        ?>
                    </div>
                <?php
            }
            ?>
            </div>
        <?php
    } else{
        ?>
        <h3>Sin coincidencias</h3>
        <br>
        <?php
    }
}
?>
</div>
<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>