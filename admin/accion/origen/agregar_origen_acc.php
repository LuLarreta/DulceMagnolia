<?PHP 
require_once "../../../funciones/autoload.php";

$postData = $_POST;

try {
    (new Origen())->insertar($postData['pais'], $postData['calidad']);
  header('Location: ../../index.php?sec=views/origen/origen_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo cargar");

}