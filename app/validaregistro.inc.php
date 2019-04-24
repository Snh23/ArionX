<?php
class ValidaRegistro{
    private $nombre;
    private $apellidos;
    private $usuario;
    private $email;

    private $error_nombre;
    private $error_apellidos;
    private $error_usuario;
    private $error_email;


    public function __construct($nombre, $apellidos, $usuario, $email, $clave1, $clave2)
    {
        $this -> nombre = "";
        $this -> apellidos = "";
        $this -> usuario = "";
        $this -> email = "";

        $this -> error_nombre = $this -> valida_nom($nombre);
    }

    private function var_iniciada($var){
        if (isset($var) && !empty($var)){
            return true;
        }else{
            return false;
        }
    }

    private function valida_nom($nombre){
        if(!$this -> var_iniciada($nombre)){
            return "Debes escriubir tu Nombre";
        }else{
            $this -> nombre = $nombre;
        }
    

        if (strlen($nombre) < 4){
            return "El Nombre es muy corto";
        }

        if (strlen($nombre) > 25){
            return "El Nombre es  muy largo";
        }

        return "";
    }
}
?>