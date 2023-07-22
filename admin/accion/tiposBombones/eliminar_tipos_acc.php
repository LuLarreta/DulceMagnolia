<?PHP 
require_once "../../../funciones/autoload.php";


$id = $_GET['id'] ?? FALSE;

try{
    $tipos = (new TipoBombones())->get_x_tipo($id);
    $tipos->eliminar();
    header('Location: ../../index.php?sec=views/tipoBombones/tipos_bombones_admin');
} catch(Exception $e) {
    die("Error al eliminar");
}