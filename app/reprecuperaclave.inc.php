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
}
?>
