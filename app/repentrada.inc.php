<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/entrada.inc.php';

class RepositorioEntrada
{

    public function insertar_entrada($conexion, $entrada)
    {
        $entrada_insertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO entradas (autor_id, titulo, url, texto, fecha, activa) VALUES (:autor_id, :titulo, :url, :texto, NOW(), 0)";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':autor_id', $entrada->get_autorid(), PDO::PARAM_STR);
                $sentencia->bindValue(':titulo', $entrada->get_titulo(), PDO::PARAM_STR);
                $sentencia->bindValue(':url', $entrada->get_url(), PDO::PARAM_STR);
                $sentencia->bindValue(':texto', $entrada->get_texto(), PDO::PARAM_STR);
                $entrada_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $entrada_insertada;
    }
    public static function obtener_entradas_fechasc($conexion)
    {
        $entradas = [];
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM entradas ORDER BY fecha DESC LIMIT 5";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchall();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                            $fila['id'],
                            $fila['autor_id'],
                            $fila['titulo'],
                            $fila['url'],
                            $fila['texto'],
                            $fila['fecha'],
                            $fila['activa']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $entradas;
    }
    public static function obtener_entrada_url($conexion, $url)
    {
        $entrada = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM entradas Where url LIKE :url";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':url', $url, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $entrada = new Entrada(
                        $resultado['id'],
                        $resultado['autor_id'],
                        $resultado['titulo'],
                        $resultado['url'],
                        $resultado['texto'],
                        $resultado['fecha'],
                        $resultado['activa']
                    );
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $entrada;
    }

    public static function obtener_entradas_azar($conexion, $limite)
    {
        $entradas = [];
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM entradas ORDER BY RAND() LIMIT $limite";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                $entradas = $resultado;
                /*if(count($resultado)){
                    foreach($resultado as $fila){
                        $entradas = new Entrada(
                        $fila['id'],
                        $fila['autor_id'],
                        $fila['titulo'],
                        $fila['url'],
                        $fila['texto'],
                        $fila['fecha'],
                        $fila['activa']);
                    }
                }*/
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $entradas;
    }

    public static function contar_entradas_activas_usu($conexion, $usuario_id){
        $total_entradas = '0';
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total_entradas FROM entradas Where autor_id = :autor_id AND activa= 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':autor_id', $usuario_id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $total_entradas;
    }
    public static function contar_entradas_inactivas_usu($conexion, $usuario_id){
        $total_entradas = '0';
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total_entradas FROM entradas Where autor_id = :autor_id AND activa= 0";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':autor_id', $usuario_id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $total_entradas;
    }
}
?>