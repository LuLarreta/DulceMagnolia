<?PHP

echo "<pre>";
print_r($_GET);
echo "</pre>";


$nombre = $_GET['nombre'];

$apellido = $_GET['apellido'];

$telefono = $_GET['telefono'];

$ciudad = $_GET['ciudad'];

$email = $_GET['email'];

$consulta = $_GET['consulta'];



header('Location: ../index.php?sec=formularioEnviado ');