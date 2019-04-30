<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/entrada.inc.php';

class RepositorioEntrada {

    public function insertar_entrada($conexion, $entrada){
        $entrada_insertada = false;

        if(isset($conexion)){
            try{
                $sql = "INSERT INTO entradas (autor_id, titulo, url, texto, fecha, activa) VALUES (:autor_id, :titulo, :url, :texto, NOW(), 0)";
                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindValue(':autor_id', $entrada->get_autorid(), PDO::PARAM_STR);
                $sentencia -> bindValue(':titulo', $entrada ->get_titulo(), PDO::PARAM_STR);
                $sentencia -> bindValue(':url', $entrada ->get_url(), PDO::PARAM_STR);
                $sentencia -> bindValue(':texto', $entrada ->get_texto(), PDO::PARAM_STR);
                $entrada_insertada = $sentencia -> execute();
            }catch(PDOException $ex){
                print "ERROR" . $ex ->getMessage();
            }
        }
        return $entrada_insertada;

    }
    public static function obtener_entradas_fechasc($conexion){
        $entradas = [];
        if (isset($conexion)){
            try{
                $sql = "SELECT * FROM entradas ORDER BY fecha DESC LIMIT 5";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchall();
                if(count($resultado)){
                    foreach($resultado as $fila){
                        $entradas[] = new Entrada($fila['id'],
                        $fila['autor_id'],
                        $fila['titulo'],
                        $fila['url'],
                        $fila['texto'],
                        $fila['fecha'],
                        $fila['activa']);
                    }
                }
            }catch(PDOException $ex){
                print "ERROR" .$ex->getMessage();
            }
        }
        return $entradas;
    }
}
?>