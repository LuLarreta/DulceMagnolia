<?PHP 
require_once "../../../funciones/autoload.php";
$id = $_GET['id'] ?? FALSE;

if($id){
    (new Carrito())->eliminarProducto($id);
    header('Location: ../../../index.php?sec=carrito');
}