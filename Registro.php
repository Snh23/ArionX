<?php
include_once 'app/conexion.inc.php';
include_once 'app/repusuario.inc.php';
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
                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"><!--mandaremos los datos a la misma pagina-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="nombre" type="text" class="form-control" placeholder="ej.Macario">
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input name="apellidos" type="text" class="form-control" placeholder="ej.Paterno y Materno">
                        </div>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input name="usuario" type="text" class="form-control" placeholder="ej.Mac42">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" placeholder="ej.Cuenta@email.com">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input name="clave1"type="password" class="form-control" placeholder="**********">
                        </div>
                        <div class="form-group">
                            <label>Repite tu contraseña</label>
                            <input name="clave2" type="password" class="form-control" placeholder="**********">
                        </div>
                        <br>
                        <div class="form-group text-center">
                        <button name="limpiar" type="reset" class="btn btn-default btn-primary">Limpiar Datos</button>
                        <button name="enviar" type="submit" class="btn btn-default btn-primary">Enviar Datos</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




<?php
include_once 'Plantillas/documento-cierre.inc.php';
?>