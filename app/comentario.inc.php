<?php
class Comentario{
    //atributos
    private $id;
    private $autor_id;
    private $entrada_id;
    private $titulo;
    private $texto;
    private $fecha;

    //contructor
    public function __construct($id, $autor_id, $entrada_id, $titulo, $texto, $fecha)
    {
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> entrada_id = $entrada_id;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> fecha = $fecha;
    }

    public function get_id(){
        return $this->id;
    }
    public function get_autorid(){
        return $this->autor_id;
    }
    public function get_entradaid(){
        return $this->entrada_id;
    }
    public function get_titulo(){
        return $this->titulo;
    }
    public function get_texto(){
        return $this->texto;
    }
    public function get_fecha(){
        return $this->fecha;
    }

    public function set_titulo($titulo){
        $this -> titulo = $titulo;
    }
    public function set_texto($texto){
        $this -> texto = $texto;
    }
}
?>