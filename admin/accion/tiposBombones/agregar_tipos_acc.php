<?PHP 
require_once "../../../funciones/autoload.php";


$postData = $_POST;




try {
    (new TipoBombones())->insertar($postData['nombre'], $postData['proceso']);
  header('Location: ../../index.php?sec=views/tipoBombones/tipos_bombones_admin');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo cargar");

}