<?php
class Entrada
{
    //atributos
    private $id;
    private $autor_id;
    private $titulo;
    private $texto;
    private $fecha;
    private $activa;

    //constructor
    public function __constructor($id, $autor_id, $titulo, $texto, $fecha, $activa)
    { 
        //se inician dentro del cpnstructor
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> fecha = $fecha;
        $this -> activa = $activa;
    }

    //getters-obtener, recueprar o acceder al valor asignado al atributo y utilizarlo en cierto metodo.
    public function get_id(){
        return $this->id;
    }

    public function get_autorid(){
        return $this->autor_id;
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
    public function are_activa(){
        return $this->activa;
    }
    //setters- sirven para asignar un valor inicial a algun atributo, es decir podemos modificar el valor del atributo que deseemos
    public function set_titulo($titulo){
        $this -> titulo =$titulo;
    }
    public function set_texto($texto){
        $this -> texto = $texto;
    }
    public function set_activa($activa){
        $this -> activa = $activa;
    }
}
