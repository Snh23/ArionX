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
                            $fila['activo'],
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

    public static function insertar_usuarios($conexion, $usuario){
        $usuario_inserta = false;

        if(isset($conexion)){
            try{
                $sql = "INSERT INTO usuarios (nombre, apellidos, usuario, email, password, fecha_reg, activo) VALUES (:nombre, :apellidos, :usuario, :email, :password, NOW(), 0)";
                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':nombre', $usuario->get_nombre(), PDO::PARAM_STR);
                $sentencia -> bindParam(':apellidos', $usuario ->get_apellidos(), PDO::PARAM_STR);
                $sentencia -> bindParam(':usuario', $usuario ->get_usuario(), PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $usuario ->get_email(), PDO::PARAM_STR);
                $sentencia -> bindParam(':password', $usuario ->get_password(), PDO::PARAM_STR);
                $usuario_inserta = $sentencia -> execute();
            }catch(PDOException $ex){
                print "ERROR" . $ex ->getMessage();
            }
        }
        return $usuario_inserta;
    }
}
