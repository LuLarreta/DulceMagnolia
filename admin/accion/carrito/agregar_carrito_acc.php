<?PHP 
require_once "../../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;
$cantidad = $_GET['cantidad'] ?? 1;


if($id){
    (new Carrito())->agregarItems($id, $cantidad);
    header('Location: ../../../index.php?sec=carrito');
}





?>