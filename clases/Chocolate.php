<?PHP

class Chocolate
{
    private $id;
    private $nombre;
    private $origen_id;
    private $tipo_chocolate_id;

    private static $createValues = ['id', 'nombre'];



    /**
     * Devuelve la lista completa
     * necesito ese query para el catalogo de compras
     */
    public function lista_completa(): array
    {
        $listaCompleta = [];
        $conexion = Conexion::getConexion();

        $query = "SELECT c.id, c.nombre, c.origen_id, c.tipo_chocolate_id, o.pais, o.calidad, tc.nombre AS tipoChocolate 
        FROM chocolate c 
        LEFT JOIN origen_chocolate o ON c.origen_id = o.id 
        LEFT JOIN tipos_chocolate tc ON c.tipo_chocolate_id = tc.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while ($resultado = $PDOStatement->fetch()) {
            $listaCompleta[] = $this->crearChocolate($resultado);
        }


        return $listaCompleta;
    }

    /**
     * Devuelve los datos de un chocolate en particular
     */
    public function get_x_chocolate(int $id): ?Chocolate

    {
        // Verificar que $id sea un valor entero válido
        if (!is_int($id)) {
            throw new InvalidArgumentException("El ID del chocolate debe ser un valor entero.");
        }
        $conexion = Conexion::getConexion();
        $query = "SELECT c.id, c.nombre, c.origen_id, c.tipo_chocolate_id, o.pais, o.calidad, tc.nombre AS tipoChocolate 
        FROM chocolate c 
        LEFT JOIN origen_chocolate o ON c.origen_id = o.id 
        LEFT JOIN tipos_chocolate tc ON c.tipo_chocolate_id = tc.id 
        WHERE c.id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$id]);

        $resultado = $this->crearChocolate($PDOStatement->fetch());

        return $resultado ?? null;
    }


    public function crearChocolate($chocolateData): Chocolate
    {
        $chocolate = new self();

        foreach (self::$createValues as $value) {
            $chocolate->{$value} = $chocolateData[$value];
        }



        if (isset($chocolateData['origen_id']) && $chocolateData['origen_id'] !== null) {
            $origen = new Origen();
            $chocolate->origen_id = $origen->get_x_origen($chocolateData['origen_id']);
        }

        if (isset($chocolateData['tipo_chocolate_id']) && $chocolateData['tipo_chocolate_id'] !== null) {
            $tipoChocolate = new TipoChocolate();
            $chocolate->tipo_chocolate_id = $tipoChocolate->get_x_tipo($chocolateData['tipo_chocolate_id']);
        }
        return $chocolate;
    }



    public function insertar(string $nombre, int $origen_id, int $tipo_chocolate_id)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `chocolate` (`id`, `nombre`, `origen_id`, `tipo_chocolate_id`) VALUES (NULL, :nombre, :origen_id, :tipo_chocolate_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'origen_id' => $origen_id,
                'tipo_chocolate_id' => $tipo_chocolate_id,
            ]
        );
    }

    public function editar($nombre, $origen_id, $tipo_chocolate_id)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `chocolate` SET nombre = :nombre, origen_id = :origen_id, tipo_chocolate_id = :tipo_chocolate_id WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'origen_id' => $origen_id,
                'tipo_chocolate_id' => $tipo_chocolate_id,
            ]
        );
    }

    public function eliminar()
    {

        $conexion = Conexion::getConexion();
        $query = "DELETE FROM chocolate WHERE id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }




    /**
     * trae el valor de id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * trae el valor de nombre
     */
    public function getNombreChocolate()
    {
        return $this->nombre;
    }
    /**
     * trae el valor de nombre de Pais
     */
    public function getOrigenPais()
    {
        if ($this->origen_id !== null) {
            return $this->origen_id->getPais();
        }
        return; // Devuelve cualquier un valor vacio si no se encontro
    }
    /**
     * trae el valor de tipo de chocolate
     */
    public function getTipoChocolate()
    {
        if ($this->tipo_chocolate_id !== null) {
            return $this->tipo_chocolate_id->getTipoChocolate();
        }
        return; // Devuelve cualquier un valor vacio si no se encontro
    }
    /**
     * trae el valor de calidad
     */
    public function getCalidad()
    {
        if ($this->origen_id !== null) {
            return $this->origen_id->getCalidad();
        }
        return; // Devuelve cualquier un valor vacio si no se encontro
    }
}
