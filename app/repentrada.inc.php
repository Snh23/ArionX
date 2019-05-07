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
                $sql = "INSERT INTO entradas (autor_id, titulo, url, texto, fecha, activa) VALUES (:autor_id, :titulo, :url, :texto, NOW(), :publica)";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':autor_id', $entrada->get_autorid(), PDO::PARAM_STR);
                $sentencia->bindValue(':titulo', $entrada->get_titulo(), PDO::PARAM_STR);
                $sentencia->bindValue(':url', $entrada->get_url(), PDO::PARAM_STR);
                $sentencia->bindValue(':texto', $entrada->get_texto(), PDO::PARAM_STR);
                $sentencia->bindValue(':publica', $entrada->are_activa(), PDO::PARAM_STR);
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

    public static function obtener_entradas_usuario_fechadesc($conexion, $id_usuario)
    {
        $entradas_obtenidas = [];
        if (isset($conexion)) {
            try {
                $sql = "SELECT a.id, a.autor_id, a.url, a.titulo, a.texto, a.fecha, a.activa, COUNT(b.id) AS 'Cantidad_Comentarios' ";
                $sql.="FROM entradas a ";
                $sql.="LEFT JOIN comentarios b ON a.id = b.entrada_id ";
                $sql.="WHERE a.autor_id = :autor_id ";
                $sql.="GROUP BY a.id ";
                $sql.="ORDER BY a.fecha DESC";
                $sentencia = $conexion->prepare($sql);
                $sentencia ->bindValue(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if(count($resultado)){
                    foreach($resultado as $fila){
                        $entradas_obtenidas[] = array(
                        new Entrada(
                            $fila['id'],
                            $fila['autor_id'],
                            $fila['url'],
                            $fila['titulo'],
                            $fila['texto'],
                            $fila['fecha'],
                            $fila['activa']
                        ),
                        $fila['Cantidad_Comentarios']
                    );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $entradas_obtenidas;
    }

    public static function titulo_existe($conexion, $titulo){
        $titulo_existe = true;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM entradas WHERE titulo = :titulo";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindValue(':titulo', PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if(count($resultado)){
                    $titulo_existe = true;
                }else{
                    $titulo_existe = false;
                }
            }catch(PDOException $ex){
                print "ERROR " . $ex->getMessage();
            }
        }
        return $titulo_existe;
    }

    public static function url_existe($conexion, $url){
        $titulo_existe = true;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM entradas WHERE url = :url";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindValue(':url', PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if(count($resultado)){
                    $url_existe = true;
                }else{
                    $url_existe = false;
                }
            }catch(PDOException $ex){
                print "ERROR " . $ex->getMessage();
            }
        }
        return $url_existe;
    }
//CASE_INSENSITIVE - no distingue entre mayusculas y minusculas - esto es en la base de datos.
}
/*SELECT a.id, a.autor_id, a.url, a.titulo, a.texto, a.fecha, a.activa, COUNT(b.id) AS 'Cantidad_Comentarios' 
FROM entradas a 
LEFT JOIN comentarios b ON a.id = b.entrada_id 
WHERE a.autor_id = 5 
GROUP BY a.id 
ORDER BY a.fecha DESC */
?>