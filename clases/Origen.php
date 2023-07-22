<?PHP
class Origen
{
    private $id;
    private $pais;
    private $calidad;

    /**
     * Devuelve la lista completa
     */
    public function lista_completa(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM origen_chocolate";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $listaCompleta = $PDOStatement->fetchAll();

        return $listaCompleta;
    }

    /**
     * Devuelve los datos de un origen en particular
     */
    public function get_x_origen(int $id): ?Origen

    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM origen_chocolate WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [$id]
        );

        $resultado = $PDOStatement->fetch();

        return $resultado ?? null;
    }
    public function editar($pais, $calidad)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `origen_chocolate` SET pais = :pais, calidad = :calidad WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'pais' => $pais,
                'calidad' => $calidad,

            ]
        );
    }
    public function insertar($pais,  $calidad)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `origen_chocolate` (`id`, `pais`, `calidad`) VALUES (NULL, :pais, :calidad)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'pais' => $pais,
                'calidad' => $calidad,

            ]
        );
    }
    public function eliminar()
    {

        $conexion = Conexion::getConexion();
        $query = "DELETE FROM origen_chocolate WHERE id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }


    public function getId()
    {
        return $this->id;
    }
    public function getPais()
    {
        return $this->pais;
    }
    public function getCalidad()
    {
        return $this->calidad;
    }
}
