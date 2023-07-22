<?PHP 
require_once "../../../funciones/autoload.php";


$postData = $_POST;
$id = $_GET['id'] ?? FALSE;

try {
    $ingrediente = (new Ingredientes)->get_x_ingrediente($id);
    $ingrediente->editar($postData['nombre']);
  header('Location: ../../index.php?sec=views/ingredientes/ingredientes_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar");

}