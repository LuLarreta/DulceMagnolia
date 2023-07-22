<?PHP 
require_once "../../../funciones/autoload.php";


$id = $_GET['id'] ?? FALSE;

try{
    $bombones = (new Bombones())->producto_x_id($id);
    $bombones->eliminar();
    header('Location: ../../index.php?sec=views/bombones/bombones_admin');
} catch(Exception $e) {
    echo "Error al eliminar: " . $e->getMessage();
}