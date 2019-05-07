<?php
include_once 'app/config.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/repentrada.inc.php';
include_once 'app/validaentrada.inc.php';
include_once 'app/controlsesion.inc.php';
include_once 'app/redireccion.inc.php';

$entrada_publica = 0;
if (isset($_POST['enviar'])) {
    Conexion::abrir_con();
    $validador = new ValidaEntrada(
        $_POST['titulo'],
        $_POST['url'],
        htmlspecialchars($_POST['texto']),
        Conexion::obtener_con()
    );

    if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
        $entrada_publica = 1;
    }

    if ($validador->entrada_valida()) {
        if (ControlSesion::sesion_iniciada()) {
            $entrada = new Entrada(
                '',
                $_SESSION['id_usuario'],
                $validador->get_url(),
                $validador->get_titulo(),
                $validador->get_texto(),
                '',
                $entrada_publica
            );

            $entrada_insertada = RepositorioEntrada::insertar_entrada(Conexion::obtener_con(), $entrada);
            if ($entrada_insertada) {
                Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);
            }
        }else{
            Redireccion::redirigir(RUTA_LOGIN);
        }
        Conexion::cerrar_con();
    }
}

$titulo = 'Nueva Entrada';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'Plantillas/documento-nav.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Agregar Entrada</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form_nva_entrada" method="POST" action="<?php echo RUTA_ENTRADA_NVA ?>">
                <?php if (isset($_POST['enviar'])) {
                    include_once 'plantillas/entrada_valida.inc.php';
                } else {
                    include_once 'plantillas/entrada_vacia.inc.php';
                }
                ?>
            </form>
        </div>
    </div>
</div>




<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>