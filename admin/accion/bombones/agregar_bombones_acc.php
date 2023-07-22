<?PHP
require_once "../../../funciones/autoload.php";


$postData = $_POST;
$fileData = $_FILES['foto'];
$ingredientes = $_POST['ingredientes'];


try {    
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../../img/productos", $fileData);
    (new Bombones())->insertar(
        $postData['nombre'], 
        $postData['detalle'], 
        $imagen,
        $postData['tipo_bombones'], 
        $postData['chocolate'], 
        $postData['precio'], 
        $postData['vencimiento'], 
        $postData['peso'], 
        $postData['calorias'],
        $ingredientes 
    );

    
    header('Location: ../../index.php?sec=views/bombones/bombones_admin');
} catch (Exception $e) {
  
  header('Location: ../../index.php?sec=views/bombones/agregar_bombones');
    
}