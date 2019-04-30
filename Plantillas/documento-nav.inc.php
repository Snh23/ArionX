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
            <button type="button" class="navbar-toggle collapsing" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">este boton despliega la barra de navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SERVIDOR ?>">Arion</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo SERVIDOR ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
                <li><a href="<?php echo RUTA_PRODUCTOS ?>"><span class="glyphicon glyphicon-compressed" aria-hidden="true"></span> Productos</a></li>
                <li><a href="<?php echo RUTA_CONTACTO ?>"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Contacto</a></li>
            </ul>
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Gestor <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    Entradas
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Comentarios
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Usuarios
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Favoritos
                                </a>
                            </li>
                        </ul>
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
                    <li><a href="<?php echo RUTA_LOGIN ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Iniciar Sesión</a></li>
                    <li><a href="<?php echo RUTA_REGISTRO ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Registro</a></li>
                <?php
            }
            ?>
            </ul>
        </div>
    </div>
</nav>