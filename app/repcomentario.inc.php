<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/comentario.inc.php';

class RepositorioComentario {

    public function insertar_comentario($conexion, $comentario){
        $comentario_insertado = false;

        if(isset($conexion)){
            try{
                $sql = "INSERT INTO comentarios (autor_id, entrada_id, titulo, texto, fecha) VALUES (:autor_id, :entrada_id, :titulo, :texto, NOW())";
                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindValue(':autor_id', $comentario->get_autorid(), PDO::PARAM_STR);
                $sentencia -> bindValue(':entrada_id', $comentario->get_entradaid(), PDO::PARAM_STR);
                $sentencia -> bindValue(':titulo', $comentario ->get_titulo(), PDO::PARAM_STR);
                $sentencia -> bindValue(':texto', $comentario ->get_texto(), PDO::PARAM_STR);
                $comentario_insertado = $sentencia -> execute();
            }catch(PDOException $ex){
                print "ERROR" . $ex ->getMessage();
            }
        }
        return $comentario_insertado;

    }
    public static function obtener_comentario($conexion, $entrada_id){
        $comentarios = array();
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM comentarios WHERE entrada_id = :entrada_id";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindValue(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    foreach($resultado as $fila){
                        $comentarios[] = new Comentario($fila['id'],
                        $fila['autor_id'],
                        $fila['entrada_id'],
                        $fila['titulo'],
                        $fila['texto'],
                        $fila['fecha']);
                    }
                }
            }catch (PDOException $ex){
                print "ERROR" . $ex->getMessage();
            }
        }
        return $comentarios;
    }

    public static function contar_comentarios_activos_usu($conexion, $usuario_id){
        $total_comentarios = '0';
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total_comentarios FROM comentarios Where autor_id = :autor_id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':autor_id', $usuario_id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $total_comentarios = $resultado['total_comentarios'];
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $total_comentarios;
    }

}
?>