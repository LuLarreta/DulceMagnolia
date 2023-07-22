<?PHP 
require_once "../../../funciones/autoload.php";


$id = $_GET['id'] ?? FALSE;

try{
    $ingrediente = (new Ingredientes())->get_x_ingrediente($id);
    $ingrediente->eliminar();
    header('Location: ../../index.php?sec=views/ingredientes/ingredientes_admin');
} catch(Exception $e) {
    die("Error al eliminar");
}