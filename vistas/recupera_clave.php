<?php
$titulo = 'Recupera Contraseña';

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
                    <h4>Recupera tu Contraseña</h4>
                </div>
                <div class="panel panel-body">
                    <form role="form" method="POST" action="<?php echo RUTA_GENERAR_URL_SECRETA; ?>">
                        <h2>Ingresa tu Email</h2>
                        <br>
                        <p>Escribe la direccion de correo electronico con la que te registraste y 
                            te enviaremos un email con el que podras restablecer tu contraseña</p>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" 
                            required autofocus>
                        <br>
                        <button type="submit" name="enviar_email" class="btn btn-lg btn-primary btn-block">
                            Enviar
                        </button>
                </form>
                <br>
                </div>
            </div>
        </div>
    </div>
</div>
?>