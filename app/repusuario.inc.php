<?php
class RepositorioUsuario
{
    public static function obtener_todos($conexion)
    {
        $usuarios = array();
        if (isset($conexion)) {
            try {
                include_once 'usuario.inc.php';
                $sql = 'SELECT * FROM usuarios';
                $sentencia = $conexion->prepare($sql); /*prepare sirve para evitar que se devuelvan caracteres y que el sql a ejecutar ers seguro*/
                $sentencia->execute(); /* esta linea es necesaria para ejecutar la sentenica de sql*/
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                            $fila['id'],
                            $fila['nombre'],
                            $fila['apellidos'],
                            $fila['usuario'],
                            $fila['email'],
                            $fila['password'],
                            $fila['fecha_reg'],
                            $fila['activo']
                        );
                    }
                } else {
                    print 'No hay usuarios';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    public static function obtener_usuarios($conexion)
    {
        $totalusu = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM usuarios"; /*creamos el query con formato sql y se lo asignamos a la variable $sql*/

                $sentencia = $conexion->prepare($sql); /*se declara la variable sentencia la cual tomara la conexion y preparara el query creado con la variable $sql*/
                $sentencia->execute(); /*se ejecuta */
                $resultado = $sentencia->fetch(); /*no se usa fechtall ya quelo unico que recuperaremos sera un dato, en este caso es el contador*/
                $totalusu = $resultado['total']; /*la variable creada en un inicio $totalusu toma el resultado de la obtenido en esa variable $resultado*/
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $totalusu; /*regresamos el valor obtenido, en este caso $totalusu tiene el dato guardado del campo total*/
    }

    public static function insertar_usuarios($conexion, $usuario)
    {
        $usuario_inserta = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarios (nombre, apellidos, usuario, email, password, fecha_reg, activo) VALUES (:nombre, :apellidos, :usuario, :email, :password, NOW(), 0)";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':nombre', $usuario->get_nombre(), PDO::PARAM_STR);
                $sentencia->bindValue(':apellidos', $usuario->get_apellidos(), PDO::PARAM_STR);
                $sentencia->bindValue(':usuario', $usuario->get_usuario(), PDO::PARAM_STR);
                $sentencia->bindValue(':email', $usuario->get_email(), PDO::PARAM_STR);
                $sentencia->bindValue(':password', $usuario->get_password(), PDO::PARAM_STR);
                $usuario_inserta = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usuario_inserta;
    }
    public static function usu_existe($conexion, $usuario)
    { //creamos la funcion para validar si el nombre existe
        $usu_existe = true; //variable donde sabresmo si existe o no el nombre
        if (isset($conexion)) { //verificamos la conexion si existe
            try { //si existe 
                $sql = "SELECT * FROM usuarios WHERE usuario = :usuario"; //creamos el query para asber si el nombre existe
                $sentencia = $conexion->prepare($sql); //preparamos el query creado para ejecutarlo
                $sentencia->bindvalue(":usuario", $usuario, PDO::PARAM_STR); //pasamos el valor de la variable $nombre al alias nombre para que sea tomado en el WHERE del query
                $sentencia->execute(); //ejecutamos la sentencia creada
                $resultado = $sentencia->fetchAll(); //tomamos el resultado 
                if (count($resultado)) { //si el resultado es positivo pasamos el valor true y si no existe le pasaremos false 
                    $usu_existe = true;
                } else {
                    $usu_existe = false;
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usu_existe; //regresamos el valor true/false
    }

    public static function ema_existe($conexion, $email)
    { //creamos la funcion para validar si el nombre existe
        $ema_existe = true; //variable donde sabresmo si existe o no el nombre
        if (isset($conexion)) { //verificamos la conexion si existe
            try { //si existe 
                $sql = "SELECT * FROM usuarios WHERE email = :email"; //creamos el query para asber si el nombre existe
                $sentencia = $conexion->prepare($sql); //preparamos el query creado para ejecutarlo
                $sentencia->bindvalue(":email", $email, PDO::PARAM_STR); //pasamos el valor de la variable $nombre al alias nombre para que sea tomado en el WHERE del query
                $sentencia->execute(); //ejecutamos la sentencia creada
                $resultado = $sentencia->fetchAll(); //tomamos el resultado 
                if (count($resultado)) { //si el resultado es positivo pasamos el valor true y si no existe le pasaremos false 
                    $ema_existe = true;
                } else {
                    $ema_existe = false;
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $ema_existe; //regresamos el valor true/false
    }

    public static function obtener_usu_por_ema($conexion, $email)
    {
        $usuario = null;
        if (isset($conexion)) {
            try {
                include_once 'usuario.inc.php';
                $sql = "SELECT * FROM usuarios WHERE email = :email";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $usuario = new Usuario(
                        $resultado['id'],
                        $resultado['nombre'],
                        $resultado['apellidos'],
                        $resultado['usuario'],
                        $resultado['email'],
                        $resultado['password'],
                        $resultado['fecha_reg'],
                        $resultado['activo']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario;
    }

    public static function obtener_usu_por_id($conexion, $id)
    {
        $usuario = null;
        if (isset($conexion)) {
            try {
                include_once 'usuario.inc.php';
                $sql = "SELECT * FROM usuarios WHERE id = :id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $usuario = new Usuario(
                        $resultado['id'],
                        $resultado['nombre'],
                        $resultado['apellidos'],
                        $resultado['usuario'],
                        $resultado['email'],
                        $resultado['password'],
                        $resultado['fecha_reg'],
                        $resultado['activo']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario;
    }

    public static function actualizar_pass($conexion, $id_usuario, $nueva_clave){
        $actualiza_correcta = false;
        if(isset($conexion)){
            try{
                $sql= "UPDATE usuarios SET password = :password where id = :id";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindValue(':password', $nueva_clave, PDO::PARAM_STR);
                $sentencia -> bindValue(':id', $id_usuario, PDO::PARAM_STR);
                $sentencia -> execute();

                $resultado = $sentencia -> rowCount();
                if(count($resultado)){
                    $actualiza_correcta = true;
                }else{
                    $actualiza_correcta = false;
                }
            }catch(PDOException $ex){
                print 'ERROR' . $ex -> getMessage();
            }
            return $actualiza_correcta;
        }
    }
}
