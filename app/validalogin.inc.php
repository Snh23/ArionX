<?php
include_once 'repusuario.inc.php';

class ValidadorLogin{
    private $usuario;
    private $error;

    public function __construct($email, $clave, $conexion){
        $this -> error ="";
        if(!$this -> var_iniciada($email) || !$this -> var_iniciada($clave)){
            $this ->usuario=null;
            $this ->error ="Debes introducir tu email y tu contraseña.";
        }else{
            $this -> usuario = RepositorioUsuario :: obtener_usu_por_ema($conexion, $email);
            if(is_null($this -> usuario)|| !password_verify($clave, $this-> usuario ->get_password())){
                $this -> error = "Datos incorrectos";
            }
        }
    }

    private function var_iniciada($var){
        if (isset($var) && !empty($var)){
            return true;
        }else{
            return false;
        }
    }

    public function obtener_usuario(){
        return $this -> usuario;
    }
    public function obtener_error(){
        return $this -> error;
    }
    public function mostrar_error(){
        if($this -> error !==''){
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this ->error;
            echo "</div><br>";
        }
    }
}
?>