<?PHP 
require_once "../../../funciones/autoload.php";


$id = $_GET['id'] ?? FALSE;

try{
    $chocolate = (new Chocolate())->get_x_chocolate($id);
    $chocolate->eliminar();
    header('Location: ../../index.php?sec=views/chocolate/chocolate_admin');
} catch(Exception $e) {
    die("Error al eliminar");
}