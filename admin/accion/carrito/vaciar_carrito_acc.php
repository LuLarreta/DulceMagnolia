<?PHP 
require_once "../../../funciones/autoload.php";

(new Carrito())->vaciarCarrito();
header('Location: ../../../index.php?sec=carrito');
