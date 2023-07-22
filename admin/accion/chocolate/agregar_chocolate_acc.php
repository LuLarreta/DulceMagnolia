<?PHP 
require_once "../../../funciones/autoload.php";


$postData = $_POST;




try {
    (new Chocolate())->insertar($postData['nombre'], $postData['origen_id'], $postData['tipo_chocolate_id']);
  header('Location: ../../index.php?sec=views/chocolate/chocolate_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo cargar");

}