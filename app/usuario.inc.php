<?php 
 //el nombre de la clase por convencion empiezan con mayuscula
class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $fecha_reg;
    private $activo;

    public function __construct($id, $nombre, $apellidos, $email, $password, $fecha_reg, $activo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->fecha_reg = $fecha_reg;
        $this->activo = $activo;
    }

    public function get_id(){
        return $this->id;
    }
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_apellidos(){
        return $this->apellidos;
    }
    public function get_email(){
        return $this->email;
    }
    public function get_password(){
        return $this->password;
    }
    public function get_fecha_reg(){
        return $this->fecha_reg;
    }
    public function get_activo(){
        return $this->activo;
    }


    public function state_id(){
        return $this->id;
    }
    public function state_nombre(){
        return $this->nombre;
    }
    public function state_apellidos(){
        return $this->apellidos;
    }
    public function state_email(){
        return $this->email;
    }
    public function state_password(){
        return $this->password;
    }
    public function state_fecha_reg(){
        return $this->fecha_reg;
    }
    public function state_activo(){
        return $this->activo;
    }
}
?>