<?PHP 
require_once "../../../funciones/autoload.php";


$postData = $_POST;
$id = $_GET['id'] ?? FALSE;




try {
    $tipos = (new TipoBombones)->get_x_tipo($id);
    $tipos->editar($postData['nombre'], $postData['proceso']);
  header('Location: ../../index.php?sec=views/tipoBombones/tipos_bombones_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar");

}