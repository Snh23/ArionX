<?php
$titulo='Blog de Arion';
include_once 'app/conexion.inc.php';
include_once 'app/repusuario.inc.php';
include_once 'app/escritorentradas.inc.php';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'Plantillas/documento-nav.inc.php';
?>
<div class="container">
    <div class="jumbotron">
        <h1>Blog Arion</h1>
        <p>Blog de prueba</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Busqueda
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="search" class="form-control" placeholder="¿Que Buscas?">
                            </div>
                            <button class="form-control">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filtro
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Archivo
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php
EscritorEntradas::escribir_entradas();
?>
        </div>
    </div>
</div>
<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>