<?PHP

class Bombones
{
    private $id;
    private $nombre;
    private $tipo_bombones_id;
    private $imagen;
    private $precio;
    private $vencimiento;
    private $peso;
    private $detalle;
    private $calorias;
    private $chocolate_id;
    private $ingredientes;


    private static $createValues = ['id', 'nombre', 'imagen', 'precio', 'vencimiento', 'peso', 'detalle', 'calorias'];

    public function insertar($nombre, $detalle, $imagen, $tipo_bombones_id, $chocolate_id, $precio, $vencimiento, $peso, $calorias, $ingredientes)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `bombones` (`nombre`, `detalle`, `imagen`, `tipo_bombones_id`, `chocolate_id`, `precio`, `vencimiento`, `peso`, `calorias`) VALUES (:nombre, :detalle, :imagen, :tipo_bombones_id, :chocolate_id, :precio, :vencimiento, :peso, :calorias)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'detalle' => $detalle,
            'imagen' => $imagen,
            'tipo_bombones_id' => $tipo_bombones_id,
            'chocolate_id' => $chocolate_id,
            'precio' => $precio,
            'vencimiento' => $vencimiento,
            'peso' => $peso,
            'calorias' => $calorias,
        ]);
        $bombon_id = $conexion->lastInsertId();

        // Insertar las relaciones de muchos a muchos en la tabla ingredientes_x_bombones
        $this->insertarIngredientesBombones($conexion, $bombon_id, $ingredientes);
    }
    private function insertarIngredientesBombones($conexion, $bombon_id, $ingredientes)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO ingredientes_x_bombones (bombones_id, ingredientes_id) VALUES (:bombon_id, :ingrediente_id)";
        $PDOStatement = $conexion->prepare($query);

        foreach ($ingredientes as $ingrediente_id) {
            $PDOStatement->execute(['bombon_id' => $bombon_id, 'ingrediente_id' => $ingrediente_id]);
        }
    }


    public function editar($nombre, $detalle, $tipo_bombones_id, $chocolate_id, $ingredientes, $precio, $peso, $calorias, $vencimiento, $imagen)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `bombones` SET 
        nombre = :nombre,
        detalle = :detalle,
        tipo_bombones_id = :tipo_bombones_id, 
        chocolate_id = :chocolate_id,
        precio = :precio,
        peso = :peso,
        calorias = :calorias,
        vencimiento = :vencimiento,
        imagen = :imagen 
        WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'detalle' => $detalle,
                'tipo_bombones_id' => $tipo_bombones_id,
                'chocolate_id' => $chocolate_id,
                'precio' => $precio, 
                'peso' => $peso,
                'calorias' => $calorias,
                'vencimiento' => $vencimiento,
                'imagen' => $imagen
            ]
        );

        // Actualizar las relaciones de muchos a muchos en la tabla ingredientes_x_bombones
        $this->editarIngredientesBombones($conexion, $ingredientes);
       
    }
    private function editarIngredientesBombones($conexion, $ingredientes)
    {
        $query_delete = "DELETE FROM ingredientes_x_bombones WHERE bombones_id = :bombon_id";
        $query_insert = "INSERT INTO ingredientes_x_bombones (bombones_id, ingredientes_id) VALUES (:bombon_id, :ingrediente_id)";
        $PDOStatement_delete = $conexion->prepare($query_delete);
        $PDOStatement_insert = $conexion->prepare($query_insert);

        // Eliminar todas las relaciones existentes para este bombón
        $PDOStatement_delete->execute(['bombon_id' => $this->id]);

        // Insertar las relaciones de muchos a muchos en la tabla ingredientes_x_bombones
        foreach ($ingredientes as $ingrediente_id) {
            $PDOStatement_insert->execute(['bombon_id' => $this->id, 'ingrediente_id' => $ingrediente_id]);
        }
    }

    public function eliminar()
    {
        $conexion = Conexion::getConexion();
        try {

            $query_delete_relaciones = "DELETE FROM ingredientes_x_bombones WHERE bombones_id = ?";
            $PDOStatement_delete_relaciones = $conexion->prepare($query_delete_relaciones);
            $PDOStatement_delete_relaciones->execute([$this->id]);
    
            $query_delete_chocolate = "DELETE FROM bombones WHERE id = ?";
            $PDOStatement_delete_chocolate = $conexion->prepare($query_delete_chocolate);
            $PDOStatement_delete_chocolate->execute([$this->id]);
        } catch (Exception $e) {
            throw new Exception("Error al eliminar el chocolate: " . $e->getMessage());
        }
    }



    /**
     * Devuelve el catalogo completo
     */
    public function catalogo_completo(): array
    {
        $catalogoCompleto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT b.*, GROUP_CONCAT(i.nombre SEPARATOR ' ') AS ingredientes
FROM bombones b
INNER JOIN ingredientes_x_bombones ib ON b.id = ib.bombones_id
INNER JOIN ingredientes i ON ib.ingredientes_id = i.id
GROUP BY b.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while ($resultado = $PDOStatement->fetch()) {
            $catalogoCompleto[] = $this->crearBombones($resultado);
        }


        return $catalogoCompleto;
    }




    /**
     * Devuelve el catalogo de un tipo particular
     * @param string $tipo Un string con el tipo de chocolate que es
     * @return Bombones[] Un array de bombones.
     */
    public function catalogo_x_tipo(int $tipo_bombones_id): array
    {

        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT b.*, GROUP_CONCAT(i.nombre) AS ingredientes
    FROM bombones b
    INNER JOIN ingredientes_x_bombones ib ON b.id = ib.bombones_id
    INNER JOIN ingredientes i ON ib.ingredientes_id = i.id
    WHERE b.tipo_bombones_id = ?
    GROUP BY b.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$tipo_bombones_id]);

        while ($resultado = $PDOStatement->fetch()) {
            $catalogo[] = $this->crearBombones($resultado);
        }
        return $catalogo;
    }
    /**
     * Crea objetos de Bombones
     */
    private function crearBombones($bombonesData): Bombones
    {
        $bombones = new self();
        foreach (self::$createValues as $value) {
            $bombones->{$value} = $bombonesData[$value];
        }

        $bombones->tipo_bombones_id = (new TipoBombones())->get_x_tipo($bombonesData['tipo_bombones_id']);
        $chocolate = (new Chocolate())->get_x_chocolate($bombonesData['chocolate_id']);
        $bombones->chocolate_id = $chocolate;

        $bombones->ingredientes = $bombonesData['ingredientes'];


        return $bombones;
    }


    /**
     * Devuelve los datos de un producto en particular del catalogo
     * @param int $idProducto EL id del producto, es irrepetible
     * @return mixed Un array con los datos del producto o Null si no se encontro nada
     */
    public function producto_x_id(int $idProducto): ?Bombones
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT b.*, GROUP_CONCAT(i.nombre SEPARATOR ' ') AS ingredientes FROM bombones b INNER JOIN ingredientes_x_bombones ib ON b.id = ib.bombones_id INNER JOIN ingredientes i ON ib.ingredientes_id = i.id WHERE b.id = ? GROUP BY b.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idProducto]);

        $resultado = $this->crearBombones($PDOStatement->fetch());

        return $resultado ?? null;
    }

    public function precio_formateado(): string
    {
        return number_format($this->precio, 2, ",", ".");
    }

    /**
     * Recorta una cantidad de palabras en un parrafo
     * @param string $texto Parrafo a reducir
     * @param int $cantidad Opcional Cantidad de palabras que muestra
     * @return string Devuelve las primeras x cantidad de palabras de un parrafo 
     */
    public function recortar_palabras(int $cantidad = 20): string
    {
        $texto = $this->detalle;

        $array = explode(" ", $texto);
        if (count($array) <= $cantidad) {
            $resultado = $texto;
        } else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array) . "...";
        }
        return $resultado;
    }

    /**
     * trae el valor del ID
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * trae el valor del nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * trae el valor del tipo_bombones
     */
    public function getTipoBombones()
    {
        return $this->tipo_bombones_id->getNombre();
    }
    /**
     * trae el valor de imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }
    /**
     * trae el valor de precio
     */
    public function getPrecio()
    {
        return $this->precio_formateado();
    }
    /**
     * trae el valor de vencimiento
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }
    /**
     * trae el valor de peso
     */
    public function getPeso()
    {
        return $this->peso;
    }
    /**
     * trae el valor de detalle
     */
    public function getDetalle()
    {
        return $this->detalle;
    }
    /**
     * trae el valor de calorias
     */
    public function getCalorias()
    {
        return $this->calorias;
    }
    /**
     * trae el array de ingredientes
     */
    public function getIngredientes()
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT ingredientes_id FROM ingredientes_x_bombones WHERE bombones_id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);

        return $PDOStatement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getIngredientesString()
    {
        return $this->ingredientes;
    }
    /**
     * trae el valor de nombre de chocolate_id
     */
    public function getChocolateId()
    {
        return $this->chocolate_id->getNombreChocolate();
    }
    /**
     * trae el valor de pais de chocolate_id
     */
    public function getNombrePais()
    {
        return $this->chocolate_id->getOrigenPais();
    }
    /**
     * trae el valor de calidad de chocolate_id
     */
    public function getCalidadChocolate()
    {
        return $this->chocolate_id->getCalidad();
    }
    /**
     * trae el valor de tipo de chocolate de chocolate_id
     */
    public function getTipoChocolate()
    {
        return $this->chocolate_id->getTipoChocolate();
    }
    public function getPrecioBien()
    {
        return $this->precio;
    }
}
