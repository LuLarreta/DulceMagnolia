<?PHP 
require_once "../../../funciones/autoload.php";


$id = $_GET['id'] ?? FALSE;

try{
    $origen = (new Origen())->get_x_origen($id);
    $origen->eliminar();
    header('Location: ../../index.php?sec=views/origen/origen_admin');
} catch(Exception $e) {
    die("Error al eliminar");
}