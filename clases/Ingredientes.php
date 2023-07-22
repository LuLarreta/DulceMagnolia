<?PHP
class Ingredientes
{
    private $id;
    private $nombre;


/**
 * Devuelve la lista completa de ingredientes
 */
    public function listaCompleta(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM ingredientes";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $listaCompleta = $PDOStatement->fetchAll();
        return $listaCompleta;
    }




    /**
     * Devuelve los datos de un ingrediente en particular
     */
    public function get_x_ingrediente(int $id): Ingredientes

    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM ingredientes WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [$id]
        );

        $resultado = $PDOStatement->fetch();

        return $resultado ?? null;
    }

    public function insertar(string $nombre){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `ingredientes` (`id`, `nombre`) VALUES (NULL, :nombre)";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                
            ]
        );
    
    }


    public function editar( $nombre){
        $conexion = Conexion::getConexion();
        $query = "UPDATE `ingredientes` SET nombre = :nombre WHERE id = :id";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
              
            ]
        );
    
    }
    public function eliminar(){

        $conexion = Conexion::getConexion(); 
        $query = "DELETE FROM ingredientes WHERE id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }
    

    public function getId()
    {
        return $this->id;
    }

    public function getNombreIngredientes()
    {
        return $this->nombre;
    }
}
