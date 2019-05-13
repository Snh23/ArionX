<?php
include_once 'repentrada.inc.php';
include_once 'valida.inc.php';

class ValidaEntrada extends Valida {
    public function __construct($titulo, $url, $texto, $conexion)
    {
        $this ->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this ->aviso_cierre ="</div>";

        $this ->titulo = "";
        $this ->url = "";
        $this ->texto = "";

        $this ->error_titulo = $this -> valida_titulo($conexion, $titulo);
        $this ->error_url = $this -> valida_url($conexion, $url);
        $this ->error_texto = $this -> valida_texto($texto);
    }

    
}
?>