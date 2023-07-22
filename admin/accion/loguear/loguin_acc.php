<?PHP
require_once "../../../funciones/autoload.php";

$postData = $_POST;
$login = (new Autenticacion())->login($postData['email'], $postData['password']);
$rolUsuario = $_SESSION['loggedIn']['rol'] ?? 'invitado';

if ($login) {

    switch ($rolUsuario) {
        case 'administrador':
            header('Location: ../../index.php?sec=panel');
            break;
        case 'superadmin':
            header('Location: ../../index.php?sec=panel');
            break;
        case 'usuario':
            header('Location: ../../../index.php?sec=home');
            break;
    }
} else {

    header('location: ../../index.php?sec=loguin');
}
