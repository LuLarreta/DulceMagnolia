<?PHP 
require_once "../../../funciones/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;

try {
    $chocolate = (new TipoChocolate)->get_x_tipo($id);
    $chocolate->editar($postData['nombre']);
  header('Location: ../../index.php?sec=views/tiposChocolate/tipos_chocolate_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar");

}