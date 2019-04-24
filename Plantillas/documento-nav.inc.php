<?php 
Conexion::abrir_con();
$totalusu = RepositorioUsuario::obtener_usuarios(Conexion::obtener_con());
/*echo count($totalusu); esto fue una prueba de conexion y consulta a la base de datos*/ 
Conexion::cerrar_con();
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
                <a class="navbar-brand" href="#">Arion</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-compressed" aria-hidden="true"></span> Productos</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Contacto</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios Registrados
                            <?php echo $totalusu?>
                        </a>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Iniciar Sesión</a></li>
                    <li><a href="/Arionx/Registro.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Registro</a></li>
                </ul>
            </div>
        </div>
    </nav>
