<?PHP 

class Carrito 
{
    /**
     * Agrega contenido al carrito 
     */
    public function agregarItems(int $bombonID, int $cantidad)
    {
        $bombones = (new Bombones)->producto_x_id($bombonID);
        if ($bombones) {
            $_SESSION['carrito'][$bombonID] = [
                'producto' => $bombones->getNombre(),
                'imagen' => $bombones->getImagen(),
                'precio' => $bombones->getPrecio(),
                'precio2' => $bombones->getPrecioBien(),
                'cantidad' => $cantidad

            ];
        }
    }
    /**
     * Elimina un producto en particular del carrito 
     * @param int $bombonID el Id del producto a eliminar
     */
    public function eliminarProducto(int $bombonID){
        if (isset($_SESSION['carrito'][$bombonID])) {
            unset($_SESSION['carrito'][$bombonID]);
        }

    }
     /**
     * Vacia todos los productos del carrito 
     */
    public function vaciarCarrito() {
        $_SESSION['carrito'] = [];
    }
     /**
     * Actualiza la cantidad de unidades de todos los productos del carrito 
     * @param array $cantidades Array asociativvo con las cantidades de cada ID
     */
    public function actualizarCantidades(array $cantidades){
        foreach ($cantidades as $key => $value){
            if (isset($_SESSION['carrito'][$key])){
                $_SESSION['carrito'][$key]['cantidad'] = $value;
            }
        }
    }
    /**
     * Devuelve el precio total de todos los productos del carrito
     */
    public function precioTotal(){
        $total = 0;
        if (!empty($_SESSION['carrito'])){
            foreach ($_SESSION['carrito'] as $item){
                $total += $item['precio2'] * $item['cantidad'];
            }
        }
        return $total;

    }
    /**
     * Devuelve el contenido del carrito 
     */
    public function getCarrito() : array {
        if (!empty($_SESSION['carrito'])){
            return $_SESSION['carrito'];
        }else {
            return[];
        }
    }
    public function insertarCompraFinalizada(array $datosCompra, array $detalleCompra) {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO compras VALUES (NULL, :id_usuario, :fecha, :importe)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id_usuario" => $datosCompra['id_usuario'],
            "fecha" => $datosCompra['fecha'],
            'importe' => $datosCompra['importe']
        ]);

        $insertarId = $conexion->lastInsertId();

        foreach ($detalleCompra as $key => $value) {
            $query = "INSERT INTO productos_x_compra VALUES (NULL, :compra_id, :productos_id, :cantidad)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "compra_id" => $insertarId,
                "productos_id" => $key,
                'cantidad' => $value,
            ]);
        }


    
    }



}