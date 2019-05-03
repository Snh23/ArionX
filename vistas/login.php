<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/validalogin.inc.php';
include_once 'app/repusuario.inc.php';
include_once 'app/controlsesion.inc.php';
include_once 'app/redireccion.inc.php';

if(ControlSesion::sesion_iniciada()){
    Redireccion::redirigir(SERVIDOR);
}

if(isset($_POST['login'])){
    Conexion :: abrir_con();
    $validador = new ValidadorLogin($_POST['email'],
    $_POST['clave'],
    Conexion::obtener_con());

    if($validador -> obtener_error()===''&&
    !is_null($validador -> obtener_usuario())){
        ControlSesion::inicio_sesion(
            $validador -> obtener_usuario() ->get_id(),
            $validador -> obtener_usuario() ->get_usuario()
        );
        Redireccion::redirigir(SERVIDOR);
    }
    Conexion::cerrar_con();
}

$titulo = 'Login';
include_once 'Plantillas/documento-declaracion.inc.php';
include_once 'Plantillas/documento-nav.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel panel-heading text-center">
                    <h4>Iniciar Sesión</h4>
                </div>
                <div class="panel panel-body">
                    <form role="form" method="POST" action="<?php echo RUTA_LOGIN; ?>">
                        <h2>Introduce Tus Datos</h2>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" 
                            <?php if(isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])){
                                echo 'value="' . $_POST['email'] . '"';
                            }
                            ?>
                            required autofocus>
                        <br>
                        <label for="clave" class="sr-only">Contraseña</label>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required>
                        <br>
                        <br>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">
                            Iniciar Sesión
                        </button>
                </form>
                <br>
                <br>
                <div class="text-center">
                    <a href="#">¿Olvidaste tu Contraseña</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>