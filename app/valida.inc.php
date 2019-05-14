<?php

abstract class Validador{
    protected $aviso_inicio;
    protected $aviso_cierre;

    protected $titulo;
    protected $url;
    protected $texto;

    protected $error_titulo;
    protected $error_url;
    protected $error_texto;

    function __construct(){
    }
    protected function variable_iniciada($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }
    }

    protected function valida_titulo($conexion, $titulo){
        if(!$this -> variable_iniciada($titulo)){
            return "Debes escribir un titulo";
        }else{
            $this -> titulo = $titulo;
        }

        if(strlen($titulo) > 255){
            return "El titulo no puede ocupar mas de 255 caracteres";
        }

        if(RepositorioEntrada::titulo_existe($conexion, $titulo)){
            return "Ya existe una entrada con ese titulo, por favor escribe uno diferente";
        }
    }

    protected function valida_url($conexion, $url){
        if(!$this -> variable_iniciada($url)){
            return "Debes escribir una URL, sin espacios.";
        }else{
            $this -> url =$url;
        }

        $url_tratada = str_replace(' ', '', $url);
        $url_tratada = preg_replace('/\s+/ ', '',$url_tratada);

        if(strlen($url) != strlen($url_tratada)){ //con esto verificamos si la url escrita tiene espacios, contamos el largo de ingresado asi contanmos y eliminamos los espacios, comparamos con el primer conteo
            return "La URL no puede contener espacios vacios";
        }

        if(RepositorioEntrada::url_existe($conexion, $url)){
            return "Ya existe una URl con ese nombre, por favor escibe una diferente";
        }
    }

    protected function valida_texto($conexion, $texto){
        if(!$this -> variable_iniciada($texto)){
            return "El contenido no puede estar vacio";
        }else{
            $this -> texto = $texto;
        }
    }

    public function get_titulo(){
        return $this->titulo;
    }

    public function get_url(){
        return $this->url;
    }

    public function get_texto(){
        return $this->texto;
    }

    public function mostrar_titulo(){
        if($this -> titulo != ""){
            echo 'value = "' . $this -> titulo . '"';
        }
    }

    public function mostrar_url(){
        if($this -> url != ""){
            echo 'value = "' . $this -> url . '"';
        }
    }

    public function mostrar_texto(){
        if($this -> texto != "" && strlen(trim($this -> texto)) > 0){
            echo $this -> texto;
        }
    }

    public function mostrar_error_titulo(){
        if($this -> error_titulo != ""){
            echo $this -> aviso_inicio . $this -> error_titulo . $this -> aviso_cierre;
        }
    }

    public function mostrar_error_url(){
        if($this -> error_url != ""){
            echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;
        }
    }

    public function mostrar_error_texto(){
        if($this -> error_texto != ""){
            echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;
        }
    }

    public function entrada_valida(){
        if($this -> error_titulo =="" && $this -> error_url =="" && $this -> error_texto ==""){
            return true;
        }else{
            return false;
        }
    }
}
?>