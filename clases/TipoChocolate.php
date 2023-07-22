<?PHP 

class TipoChocolate {

    private $id;
    private $nombre;

/**
     * Devuelve la lista completa
     */
    public function lista_completa(): array
    {
        $conexion = Conexion::getConexion();
    $query = "SELECT * FROM tipos_chocolate";
    
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();
    
     $listaCompleta = $PDOStatement->fetchAll();
    
    return $listaCompleta;
    
    }
     /**
     * Devuelve los datos de un tipo de chocolate en particular
     */
    public function get_x_tipo(int $id): ?TipoChocolate

{ 
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM tipos_chocolate WHERE id = ?";

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
    $query = "INSERT INTO `tipos_chocolate` (`id`, `nombre`) VALUES (NULL, :nombre)";

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
    $query = "UPDATE `tipos_chocolate` SET nombre = :nombre WHERE id = :id";

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
    $query = "DELETE FROM tipos_chocolate WHERE id = ?";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([$this->id]);
}

public function getId()
{
    return $this->id;
}

public function getTipoChocolate()
{
    return $this->nombre;
}

}