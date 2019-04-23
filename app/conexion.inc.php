<?php 
class Conexion {
    private static $conexion;

    public static function abrir_con(){
        if (!isset(self::$conexion)){
            try{
                include_once 'config.inc.php';
                self::$conexion = new PDO("mysql:host = $nombre_serv; dbname = $nombre_bd; $nombre_usu; $pass_serv");
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/*configurando modo de errores, para que cada que pase un error se lanzara una excepcion y podremos ver que paso*/
                self::$conexion -> exec("SET CHARACTER SET utf8");/*se llama a la base de datos en modo de lectura universal */
                print"CONEXION ABIERTA" . "<br>";
            }catch (PDOException $ex){
                print"ERROR: ". $ex -> getMessage() . "<br>";
                die();/*cierra la conexion en caso de error*/
            }
        }
    }

    public static function cerrar_con(){
        if (isset(self::$conexion)){
            self::$conexion = null;
            print "CONEXION CERRADA";
        }
    }

    public static function obtener_con(){
        return self::$conexion;
    }
}
/*requiere - pide un archivo y en caso de no encontrarlo detiene todo el servicio
  include - intenta tomar el archivo y lanza una advertencia y continua con el proceso
  _once (se usa en amboscasos anteriores) se incluye para utilizar solo una vez el archivo a llamar*/
?>