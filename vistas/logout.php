<?php
include_once 'app/controlsesion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/config.inc.php';

ControlSesion::cerrar_sesion();
Redireccion::redirigir(SERVIDOR);
?>