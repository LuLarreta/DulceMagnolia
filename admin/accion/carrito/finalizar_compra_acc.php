<?PHP 
require_once "../../../funciones/autoload.php";

$productos = (new Carrito())->getCarrito();
echo "<pre>";
print_r($productos);
echo "</pre>";

try {
    $datosCompra = [
        "id_usuario" => 3,
        "fecha" => date("Y-m-d", time()),
        "importe" => (new Carrito())->precioTotal(),
    ];
    $detalleCompra = [];

    foreach ($productos as $key => $value){
        $detalleCompra[$key] = $value['cantidad'];
    }
    echo "<pre>";
    print_r($datosCompra);
    echo "</pre>";
    echo "<pre>";
    print_r($detalleCompra);
    echo "</pre>";

    (new Carrito())->insertarCompraFinalizada($datosCompra, $detalleCompra);
    header('Location: ../../../index.php?sec=compraEnviada ');
    

} catch(Exception $e){
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("Error al comprar");
}