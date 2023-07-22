<?PHP 
class Autenticacion {

     /**
     * Verifica las credenciales del usuario, y de ser correctas, guarda los datos en la sesión
     * @param string $email El email de usuario
     * @param string $password El password de usuario
     * @return bool Devuelve TRUE en caso que las credenciales sean correctas, FALSE en caso de que no lo sean
     */
    public function login(string $email, string $password): ?bool
    {
        $datosUsuario = (new Usuario())->usuario_x_email($email);

        if ($datosUsuario) {
        if (password_verify($password, $datosUsuario->getPassword())) {
            $datosLogin['username'] = $datosUsuario->getNombreUsuario();
            $datosLogin['id'] = $datosUsuario->getId();
            $datosLogin['rol'] = $datosUsuario->getRol();
            $_SESSION['loggedIn'] = $datosLogin;
            return TRUE;
        } else {
            (new Alerta())->add_alerta('danger', "El password ingresado no es correcto.");
            return FALSE;
        }
    } else {
        (new Alerta())->add_alerta('warning', "El usuario ingresado no se encontró en nuestra base de datos.");
        return NULL;
    }
    }

   public function logout()
    {
       
        if (isset($_SESSION['loggedIn'])) {
           unset($_SESSION['loggedIn']);
        };
    }

    public function verify(): bool
    {
        if (isset($_SESSION['loggedIn'])) {
            $_SESSION['loggedIn']['rol'] = $this->getRolUsuario();
           return true;
        } else {
            header('location: index.php?sec=login');
            return false;
        }
   }
   private function getRolUsuario(): ?string {
    // Verifica si el usuario está autenticado
    if (isset($_SESSION['loggedIn']['rol'])) {
        // Retorna el rol del usuario almacenado en la sesión
        return $_SESSION['loggedIn']['rol'];
    } else {
        return null;
    }
   }
}