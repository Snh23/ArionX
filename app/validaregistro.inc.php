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
    private $error_clave1;
    private $error_clave2;

    public function __construct($nombre, $apellidos, $usuario, $email, $clave1, $clave2)
    {
        $this -> nombre = "";
        $this -> apellidos = "";
        $this -> usuario = "";
        $this -> email = "";

        $this -> error_nombre = $this -> valida_nom($nombre);
        $this -> error_apellidos = $this -> valida_ape($apellidos);
        $this -> error_usuario = $this -> valida_usu($usuario);
        $this -> error_email = $this -> valida_email($email);
        $this -> error_clave1 = $this -> valida_clave1($clave1);
        $this -> error_clave2 = $this -> valida_clave2($clave1,$clave2);
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
            return "Debes escribir tu Nombre";
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

    private function valida_ape($apellidos){
        if(!$this -> var_iniciada($apellidos)){
            return "Debes escribir tus Apellidos";
        }else{
            $this -> apellidos = $apellidos;
        }

        if (strlen($apellidos) < 4){
            return "Escribe tu Apellido Paterno y Materno";
        }
        return "";
    }

    private function valida_usu($usuario){
        if(!$this -> var_iniciada($usuario)){
            return "Debes escribir el nombre de usuario";
        }else{
            $this -> usuario = $usuario;
        }
    
        if (strlen($usuario) < 4){
            return "El Nombre de Usuario es muy corto";
        }

        if (strlen($usuario) > 25){
            return "El Nombre de Usuario es  muy largo";
        }

        return "";
    }

    private function valida_email($email){
        if(!$this-> var_iniciada($email)){
            return "Debes Proporcionar una cuenta de correo valida";
        } else {
            $this -> mail = $email;
        }
        return "";
    }

    private function valida_clave1($clave1){
        if (!$this -> var_iniciada($clave1)){
            return "Debes ingresar una contraseña";
        }
        return "";
    }
    private function valida_clave2($clave1, $clave2){
        if(!$this -> var_iniciada($clave1)){
            return "Debes ingresar la Contraseña";
        }

        if (!$this -> var_iniciada($clave2)){
            return "Debes repetir tu contraseña";
        }

        if($clave1 != $clave2){
            return "Ambas Contraseñas deben coincidir";
        }
        return "";
    }

    public function obtener_nom(){
        return $this -> nombre;
    }
    public function obtener_ape(){
        return $this -> apellidos;
    }
    public function obtener_usu(){
        return $this -> usuario;
    }
    public function obtener_email(){
        return $this -> email;
    }

    public function obtener_error_nom(){
        return $this -> error_nombre;
    }
}
?>