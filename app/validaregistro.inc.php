<?php
include_once 'repusuario.inc.php';
class ValidaRegistro{
    private $aviso_ini;
    private $aviso_fin;

    private $nombre;
    private $apellidos;
    private $usuario;
    private $email;
    private $clave;

    private $error_nombre;
    private $error_apellidos;
    private $error_usuario;
    private $error_email;
    private $error_clave1;
    private $error_clave2;

    public function __construct($nombre, $apellidos, $usuario, $email, $clave1, $clave2)
    {
        $this ->aviso_ini="<br><div class='alert alert-danger' role='alert'>";//variable para colocoar el aviso de error con formato bootstrap
        $this ->aviso_fin="</div>";//cerramos el aviso

        $this ->nombre = "";
        $this ->apellidos = "";
        $this ->usuario = "";
        $this ->email = "";
        $this ->clave ="";

        $this ->error_nombre = $this -> valida_nom($nombre);
        $this ->error_apellidos = $this -> valida_ape($apellidos);
        $this ->error_usuario = $this -> valida_usu($usuario);
        $this ->error_email = $this -> valida_email($email);
        $this ->error_clave1 = $this -> valida_clave1($clave1);
        $this ->error_clave2 = $this -> valida_clave2($clave1,$clave2);
        if($this ->error_clave1 === "" && $this ->error_clave2 === ""){
            $this ->clave = $clave1;
        }
    }
// creamos una funcion para saber si hay datos en las cajas de texto
    private function var_iniciada($var){
        if (isset($var) && !empty($var)){
            return true;
        }else{
            return false;
        }
    }
// empezamos a validar si los datos ingresados cumplen con las normas del registro
    private function valida_nom($nombre){
        if(!$this -> var_iniciada($nombre)){
            return "Debes escribir tu Nombre";
        }else{
            $this ->nombre = $nombre;
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
            $this ->apellidos = $apellidos;
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
            $this ->usuario = $usuario;
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
            $this ->email = $email;
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
            return "Debes ingresar la misma Contraseña";
        }

        if (!$this -> var_iniciada($clave2)){
            return "Debes repetir tu contraseña";
        }

        if($clave1 != $clave2){
            return "Ambas Contraseñas deben coincidir";
        }
        return "";
    }
//en caso de que haya algun error en el formulario, debemos mantener los datos ingresados hasta el momento, con las sig funciones
//en este caso para las contraseñas estas por seguridad deben ingresarlas nuevamente aunque ya las hayan escrito
    public function obtener_nom(){
        return $this ->nombre;
    }
    public function obtener_ape(){
        return $this ->apellidos;
    }
    public function obtener_usu(){
        return $this ->usuario;
    }
    public function obtener_email(){
        return $this ->email;
    }
    public function obtener_clave(){
        return $this ->clave;
    }
//con las sig funciones obtenemos los errores de las validaciones anteriores
    public function obtener_error_nom(){
        return $this ->error_nombre;
    }
    public function obtener_error_ape(){
        return $this ->error_apellidos;
    }
    public function obtener_error_usu(){
        return $this ->error_usuario;
    }
    public function obtener_error_ema(){
        return $this ->error_email;
    }
    public function obtener_error_cl1(){
        return $this ->error_clave1;
    }
    public function obtener_error_cl2(){
        return $this ->error_clave2;
    }
// con las siguientes funciones mantenemos y mostramos el valor del imput, puede ser el valor insertado o el valor del placeholder
    public function mostrar_nom(){
        if($this ->nombre !==''){
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrar_ape(){
        if($this ->apellidos !==''){
            echo 'value="' . $this->apellidos . '"';
        }
    }

    public function mostrar_usu(){
        if($this ->usuario !==''){
            echo 'value="' . $this->usuario . '"';
        }
    }

    public function mostrar_ema(){
        if($this ->email !==''){
            echo 'value="' . $this->email . '"';
        }
    }

//con las siguientes funciones miostramos los errores en el formulario debajo de cada input al que corresponda
    public function mostrar_err_nom(){
        if($this ->error_nombre !==""){
            echo $this->aviso_ini . $this -> error_nombre . $this->aviso_fin;
        }
    }

    public function mostrar_err_ape(){
        if($this ->error_apellidos !==""){
            echo $this->aviso_ini . $this -> error_apellidos . $this->aviso_fin;
        }
    }

    public function mostrar_err_usu(){
        if($this ->error_usuario !==""){
            echo $this->aviso_ini . $this -> error_usuario . $this->aviso_fin;
        }
    }

    public function mostrar_err_ema(){
        if($this ->error_email !==""){
            echo $this->aviso_ini . $this -> error_email . $this->aviso_fin;
        }
    }

    public function mostrar_err_cl1(){
        if($this ->error_clave1 !==""){
            echo $this->aviso_ini . $this -> error_clave1 . $this->aviso_fin;
        }
    }

    public function mostrar_err_cl2(){
        if($this ->error_clave2 !==""){
            echo $this->aviso_ini . $this -> error_clave2 . $this->aviso_fin;
        }
    }

//validamos si todo es correcto
    public function registro_valido(){
        if($this->error_nombre==="" && 
            $this->error_apellidos==="" &&
            $this->error_usuario==="" &&
            $this->error_email==="" &&
            $this->error_clave1==="" &&
            $this->error_clave2===""){
                return true;
        }else{
            return false;
        }
    }
}
