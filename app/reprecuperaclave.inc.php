<?php
class RepositorioRecuperaClave{
    public static function genera_peticion ($conexion, $usuario_id, $url_secreta){
        $peticion_generada = false;
        if(isset($conexion)){
            try{
                $sql ="INSERT INTO recupera_clave(usuario_id, url_secreta, fecha) VALUES (:usuario_id, :url_secreta, NOW())";
                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindValue(':usuario_id', $usuario_id, PDO::PARAM_STR);
                $sentencia -> bindValue(':url_secreta', $url_secreta, PDO::PARAM_STR);

                $peticion_generada = $sentencia -> execute();
            }catch(PDOException $ex){
                print 'ERROR' . $ex ->getMessage();
            }
        }

        return $peticion_generada;
    }

    public static function url_secreta_existe($conexion, $url_secreta){
            $url_existe = false;
            if(isset($conexion)){
                try{
                    $sql = "SELECT * FROM recupera_clave WHERE url_secreta = :url_secreta";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindValue(':url_secreta', $url_secreta, PDO::PARAM_STR);
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
            return $url_existe;
        }
    
    }
    public static function obt_idusu_mediante_urlsecreta($conexion, $url_secreta){
        $id_usuario = false;
        if(isset($conexion)){
            try{
                include_once 'recupera_clave.inc.php';
                $sql = "SELECT * FROM recupera_clave WHERE url_secreta = :url_secreta";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindValue(':url_secreta', $url_secreta, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if(!empty($resultado)){
                    $id_usuario = $resultado['usuario_id'];
                }
            }catch(PDOException $ex){
                print "ERROR " . $ex->getMessage();
            }
        return $id_usuario;
    }

}
}
?>
