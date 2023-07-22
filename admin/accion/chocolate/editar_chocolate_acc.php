<?PHP 
require_once "../../../funciones/autoload.php";


$postData = $_POST;
$id = $_GET['id'] ?? FALSE;




try {
    $chocolate = (new Chocolate)->get_x_chocolate($id);
    $chocolate->editar($postData['nombre'], $postData['origen_id'], $postData['tipo_chocolate_id']);
  header('Location: ../../index.php?sec=views/chocolate/chocolate_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar");

}