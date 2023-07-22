<?PHP 
require_once "../../../funciones/autoload.php";

$postData = $_POST;



try {
    (new Ingredientes())->insertar($postData['nombre']);
  header('Location: ../../index.php?sec=views/ingredientes/ingredientes_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo cargar");

}