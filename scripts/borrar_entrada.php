<?php

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/redireccion.inc.php';

if(isset($_POST['borrar_entrada'])){
    $id_entrada = $_POST['id_borrar'];
    Conexion::abrir_con();
    RepositorioEntrada::del_comentarios_entradas(Conexion::obtener_con(), $id_entrada);
    Conexion::cerrar_con();
    Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);
}else{
    //redirigir al gestor de entradas
}
?>