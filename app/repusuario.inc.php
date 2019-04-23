<?php 
class RepositorioUsuario {
    public static function obtener_todos($conexion){
        $usuarios = array();
        if(isset($conexion)){
            try{
                include_once 'usuario.inc.php';
                $sql = "SELECT * FROM usuarios";
                $sentencia = $conexion -> prepare($sql);/*aqui me quede*/
            }catch (PDOException $ex){
                print "ERROR" . $ex -> getMessage();
            }
        }
    }
}
?>