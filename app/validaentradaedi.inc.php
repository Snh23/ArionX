<?php
include_once 'repentrada.inc.php';
include_once 'valida.inc.php';

class ValidaEntradaEdi extends Valida{
    private $cambios_realizados;
//campos con los cambios realizados en la edicion
    private $checkbox;
//campos con el contenido antes de la edicion
    private $titulo_ori;
    private $url_ori;
    private $texto_ori;
    private $checkbox_ori;


    public function __construct($titulo, $titulo_ori, $url, $url_ori, $texto, $texto_ori, $checkbox, $checkbox_ori, $conexion)
    {
        $this -> titulo = $this -> devolver_var_di_ini($titulo);
        $this -> url = $this -> devolver_var_di_ini($url);
        $this -> texto = $this -> devolver_var_di_ini($texto);
        $this -> checkbox = $this -> devolver_var_di_ini($checkbox);

        $this -> titulo_ori = $this -> devolver_var_di_ini($titulo_ori);
        $this -> url_ori = $this -> devolver_var_di_ini($url_ori);
        $this -> texto_ori = $this -> devolver_var_di_ini($texto_ori);
        $this -> checkbox_ori = $this -> devolver_var_di_ini($checkbox_ori);

        if($this -> titulo == $this ->titulo_ori && 
        $this -> url == $this ->url_ori && 
        $this -> texto == $this ->texto_ori && 
        $this -> checkbox == $this ->checkbox_ori){
        $this -> cambios_realizados = false;
        }else{
            $this -> cambios_realizados = true;
        }

        if ($this -> cambios_realizados){
            echo 'Hay cambios';
            $this ->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
            $this ->aviso_cierre ="</div>";

            if($this -> titulo !== $this -> titulo_ori){
                $this -> error_titulo = $this -> valida_titulo($conexion, $this -> titulo);
            }else{
                $this -> error_titulo ="";
            }
            
            if($this -> url !== $this ->urlo_ori){
                $this -> error_url = $this -> valida_url($conexion, $this -> url);
            }else{
                $this -> error_url ="";
            }

            if($this -> texto !== $this -> texto_ori){
                $this -> error_texto = $this -> valida_texto($conexion, $this -> texto);
            }else{
                $this -> error_texto ="";
            }

        }else{
            echo 'No hay cambios';
        }
    }
    private function devolver_var_di_ini($variable){
        if($this -> variable_iniciada($variable)){
            return $variable;
        }else{
            return "";
        }
    }

    public function hay_cambios(){
        return $this -> cambios_realizados;
    }

    public function get_titulo_ori(){
        return $this -> titulo_ori;
    }
    public function get_url_ori(){
        return $this -> url_ori;
    }
    public function get_texto_ori(){
        return $this -> texto_ori;
    }
    public function get_checkbox_ori(){
        return $this -> checkbox_ori;
    }
    public function get_checkbox(){
        return $this -> checkbox;
    }
}
