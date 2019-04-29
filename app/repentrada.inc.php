<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/entrada.inc.php';

class RepositorioEntrada {

    public function insertar_entrada($conexion, $entrada){
        $entrada_insertada = false;

        if(isset($conexion)){
            try{
                $sql = "INSERT INTO entradas (autor_id, titulo, texto, fecha, activa) VALUES (:autor_id, :titulo, :texto, NOW(), 0)";
                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindValue(':autor_id', $entrada->get_autorid(), PDO::PARAM_STR);
                $sentencia -> bindValue(':titulo', $entrada ->get_titulo(), PDO::PARAM_STR);
                $sentencia -> bindValue(':texto', $entrada ->get_texto(), PDO::PARAM_STR);
                $entrada_insertada = $sentencia -> execute();
            }catch(PDOException $ex){
                print "ERROR" . $ex ->getMessage();
            }
        }
        return $entrada_insertada;

    }

}
?>