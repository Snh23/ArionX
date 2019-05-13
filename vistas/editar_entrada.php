<?php
include_once 'app/config.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/repentrada.inc.php';
include_once 'app/validaentradaedi.inc.php';
include_once 'app/controlsesion.inc.php';
include_once 'app/redireccion.inc.php';
Conexion::abrir_con();
if(isset($_POST['guardar_cambios_entrada'])){
    $entrada_publica_nueva = 0;
    if(isset($_POST['publicar']) && $_POST['publciar'] == 'si'){
        $entrada_publica_nueva = 1;
    }
    $validador = new ValidaEntradaEdi($_POST['titulo'], $_POST['titulo_original'],
    $_POST['url'], $_POST['url_original'],
    htmlspecialchars($_POST['texto']), $_POST['texto_original'],
    $entrada_publica_nueva, $_POST['publicar_original'], Conexion::obtener_con());
}

$titulo = "Editar Entrada";
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'Plantillas/documento-nav.inc.php';
?>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Editar Entrada</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form_edi_entrada" method="POST" action="<?php echo RUTA_ENTRADA_EDI ?>">
                <?php if (isset($_POST['editar_entrada'])) {
                    $id_entrada = $_POST['id_editar'];
                    $entrada_recuperada = RepositorioEntrada::obtener_entrada_id(Conexion::obtener_con(), $id_entrada);
                    include_once 'plantillas/entrada_recuperada.inc.php';
                    Conexion::cerrar_con();
                }else if(isset($_POST['guardar_cambios_entrada'])){
                    $id_entrada = $_POST['id_entrada'];
                    //plantilla valida
                    include_once 'plantillas/entrada_recuperada_valida.inc.php';

                }
                ?>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>