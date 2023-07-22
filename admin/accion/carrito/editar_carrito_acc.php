<?PHP 
require_once "../../../funciones/autoload.php";

$postData = $_POST;

if(!empty($postData)){
    (new Carrito())->actualizarCantidades($postData['cantidad']);
    header('Location: ../../../index.php?sec=carrito');
}