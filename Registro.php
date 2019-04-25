<?php
include_once 'app/conexion.inc.php';
include_once 'app/repusuario.inc.php';
include_once 'app/validaregistro.inc.php';
if (isset($_POST['enviar'])) {
    $validador = new ValidaRegistro(
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['usuario'],
        $_POST['email'],
        $_POST['clave1'],
        $_POST['clave2']
    );

    if ($validador->registro_valido()) {
        echo "Tod Currecta";
    }
}
$titulo = 'Registro de Usuarios';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'Plantillas/documento-nav.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de Registro</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Instrucciones</h3>
                </div>
                <div class="panel-body">
                    <br>
                    <p class="text-justify">Para registrarte debes contar con una cuenta de correo activa
                        ya que sera necesaria para gestionar tu cuenta, asi mismo te recomendamos
                        usar una contraseña que recuerdes facilmente.
                    </p>
                    <br>
                    <a href="#">¿Ya estas Registrado?</a>
                    <br>
                    <br>
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Introduce Tus Datos</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <!--mandaremos los datos a la misma pagina-->
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'Plantillas/registro-valida.inc.php';
                        } else {
                            include_once 'Plantillas/registro-vacio.inc.php';
                        }
                        ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>