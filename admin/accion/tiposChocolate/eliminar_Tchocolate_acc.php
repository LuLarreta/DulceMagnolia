<?PHP 
require_once "../../../funciones/autoload.php";


$id = $_GET['id'] ?? FALSE;

try{
    $chocolate = (new TipoChocolate())->get_x_tipo($id);
    $chocolate->eliminar();
    header('Location: ../../index.php?sec=views/tiposChocolate/tipos_chocolate_admin');
} catch(Exception $e) {
    die("Error al eliminar");
}