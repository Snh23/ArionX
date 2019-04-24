<?php 
class RepositorioUsuario {
    public static function obtener_todos($conexion){
        $usuarios = array();
        if(isset($conexion)){
            try{
                include_once 'usuario.inc.php';
                $sql = 'SELECT * FROM usuarios';
                $sentencia = $conexion -> prepare($sql);/*prepare sirve para evitar que se devuelvan caracteres y que el sql a ejecutar ers seguro*/
                $sentencia -> execute(); /* esta linea es necesaria para ejecutar la sentenica de sql*/
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)){
                    foreach ($resultado as $fila){
                        $usuarios[] = new Usuario(
                            $fila['id'],
                            $fila['nombre'],
                            $fila['apellidos'],
                            $fila['email'],
                            $fila['password'],
                            $fila['fecha_reg'],
                            $fila['activo'],
                        );
                    }
                } else{
                    print 'No hay usuarios';
                }
            }catch (PDOException $ex){
                print "ERROR" . $ex -> getMessage();
            }
        }
        return $usuarios;
    }

    public static function obtener_usuarios($conexion){
    $totalusu = null;
    if(isset($conexion)){
        try{
            $sql = "SELECT COUNT(*) as total FROM usuarios";/*creamos el query con formato sql y se lo asignamos a la variable $sql*/

            $sentencia = $conexion -> prepare($sql);/*se declara la variable sentencia la cual tomara la conexion y preparara el query creado con la variable $sql*/
            $sentencia -> execute();/*se ejecuta */
            $resultado = $sentencia -> fetch();/*no se usa fechtall ya quelo unico que recuperaremos sera un dato, en este caso es el contador*/
            $totalusu = $resultado['total'];/*la variable creada en un inicio $totalusu toma el resultado de la obtenido en esa variable $resultado*/
        }catch (PDOException $ex){
            print 'ERROR' . $ex -> getMessage();
            }
        }
    return $totalusu;/*regresamos el valor obtenido, en este caso $totalusu tiene el dato guardado del campo total*/
    }
}
