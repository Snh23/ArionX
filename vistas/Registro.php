<?php
include_once 'app/conexion.inc.php';
include_once 'app/usuario.inc.php';
include_once 'app/repusuario.inc.php';
include_once 'app/validaregistro.inc.php';
include_once 'app/redireccion.inc.php';
if (isset($_POST['enviar'])) {
    Conexion :: abrir_con();
    $validador = new ValidaRegistro(
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['usuario'],
        $_POST['email'],
        $_POST['clave1'],
        $_POST['clave2'],
        Conexion ::obtener_con()
    );

    if ($validador->registro_valido()) {
        $usuario = new Usuario('', 
        $validador->obtener_nom(), 
        $validador->obtener_ape(), 
        $validador->obtener_usu(), 
        $validador->obtener_email(), 
        password_hash($validador->obtener_clave(), PASSWORD_DEFAULT),//usamos el metodo Password_hash para encriptar la contraseña proporcionada por el susuario
                                                                    //este metodo usa dos valores, 1 es el texto/valor a encriptar y el segundo es el tipo de algoritmo a usar
        '', 
        '' );

        $usuario_inserta = RepositorioUsuario :: insertar_usuarios(Conexion :: obtener_con(), $usuario);

        if($usuario_inserta){
            Redireccion ::redirigir(RUTA_REGISTRO_CORRECTO.'?nombre=' . $usuario->get_nombre());
        }
    }
    Conexion :: cerrar_con();
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