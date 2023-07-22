<?PHP 
require_once "../../../funciones/autoload.php";

(new Autenticacion())->logout();
header('location: ../../index.php?sec=loguin');