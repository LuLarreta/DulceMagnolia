<?PHP
/**
 * Clase para proveer la coneccion del proyecto
 */
class Conexion
{

    private const DB_SERVER = "localhost";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_NAME = "prog2_dulce_magnolia";

    private const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";charset=utf8mb4";
    private static ?PDO $db = null;

    private static function conectar()
    {
        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die('Error al conectar la Base de Datos');
        }
    } 
    

    /**
     * Devuelve la conexion PDO lista para usar
     * @return PDO
     */
    public static function getConexion(): PDO
    {
        if(self::$db === null){
            self::conectar();
        }
        return self::$db;
    }

}
