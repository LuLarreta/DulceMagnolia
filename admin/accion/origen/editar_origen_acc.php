<?PHP 
require_once "../../../funciones/autoload.php";


$postData = $_POST;
$id = $_GET['id'] ?? FALSE;




try {
    $origen = (new Origen)->get_x_origen($id);
    $origen->editar($postData['pais'], $postData['calidad']);
  header('Location: ../../index.php?sec=views/origen/origen_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar");

}