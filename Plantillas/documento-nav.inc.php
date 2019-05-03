<?php
include_once 'app/controlsesion.inc.php';
include_once 'app/config.inc.php';

Conexion::abrir_con();
$totalusu = RepositorioUsuario::obtener_usuarios(Conexion::obtener_con());
/*echo count($totalusu); esto fue una prueba de conexion y consulta a la base de datos*/
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsing" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">este boton despliega la barra de navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SERVIDOR ?>">Arion</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <?php
            if(!ControlSesion::sesion_iniciada()){
                ?>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo RUTA_ENTRADA ?>"><span class="glyphicon glyphicon-compressed"
                            aria-hidden="true"></span> Entradas</a></li>
                <li><a href="<?php echo RUTA_GESTOR_COMENTARIOS ?>"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        Inicio</a></li>
                <li><a href="<?php echo RUTA_FAVORITOS ?>"><span class="glyphicon glyphicon-star"
                            aria-hidden="true"></span> Favoritos</a></li>
            </ul>
            <?php
            }
            ?>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (ControlSesion::sesion_iniciada()) {
                    ?>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_GESTOR ?>">
                        <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Gestor
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_LOGOUT ?>">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar Sesión
                    </a>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios Registrados
                        <?php echo $totalusu ?>
                    </a>
                </li>
                <li><a href="<?php echo RUTA_LOGIN ?>"><span class="glyphicon glyphicon-log-in"
                            aria-hidden="true"></span> Iniciar Sesión</a></li>
                <li><a href="<?php echo RUTA_REGISTRO ?>"><span class="glyphicon glyphicon-plus"
                            aria-hidden="true"></span> Registro</a></li>
                <?php
            }
            ?>
            </ul>
        </div>
    </div>
</nav>