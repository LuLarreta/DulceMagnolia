<?PHP
require_once "../../../funciones/autoload.php";


$postData = $_POST;
$id = $_GET['id'] ?? FALSE;
$fileData = $_FILES['imagen'] ?? FALSE;




try {

    $bombones = (new Bombones())->producto_x_id($id);

    if (!empty($fileData['tmp_name'])) {
        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../../img/productos", $fileData);
        (new Imagen())->borrarImagen(__DIR__ . "/../../../img/productos/" . $postData['imagen_og']);
    }else {
        $imagen = $postData['imagen_og'];
    }
  
       
   
    $bombones->editar(
        
        $postData['nombre'],
        $postData['detalle'],
        $postData['tipo_bombones'],
        $postData['chocolate'],
        $postData['ingredientes'],
        $postData['precio'],
        $postData['peso'],
        $postData['kcal'],
        $postData['vto'],

        $imagen
    );

    (new Alerta())->add_alerta('warning', "El Bombon <strong>{$postData['nombre']}</strong> se editó correctamente");
    header('Location: ../../index.php?sec=views/bombones/bombones_admin');

} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar");
}
