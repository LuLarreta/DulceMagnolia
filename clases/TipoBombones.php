<?PHP

class TipoBombones
{

    private $id;
    private $nombre;
    private $proceso;

     /**
     * Devuelve la lista completa
     */
    public function lista_completa(): array
    {
        $conexion = Conexion::getConexion();
    $query = "SELECT * FROM tipos_bombones";
    
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();
    
     $listaCompleta = $PDOStatement->fetchAll();
     
    
    return $listaCompleta;
    
    }


    public function get_x_tipo(int $id): ?TipoBombones

    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tipos_bombones WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [$id]
        );

        $resultado = $PDOStatement->fetch();

        return $resultado ?? null;
    }

    public function editar( $nombre, $proceso){
        $conexion = Conexion::getConexion();
        $query = "UPDATE `tipos_bombones` SET nombre = :nombre, proceso = :proceso WHERE id = :id";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'proceso' => $proceso,
                
            ]
        );
    
    }
    public function insertar( $nombre, $proceso){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `tipos_bombones` (`id`, `nombre`, `proceso`) VALUES (NULL, :nombre, :proceso)";
    
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'proceso' => $proceso,
                
            ]
        );
    
    }
    public function eliminar(){
    
        $conexion = Conexion::getConexion(); 
        $query = "DELETE FROM tipos_bombones WHERE id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }
    
    



    /**
     * devuelve el Id de TipoBombones
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * devuelve el nombre de TipoBombones
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * devuelve el proceso de TipoBombones
     */
    public function getProceso()
    {
        return $this->proceso;
    }
}
