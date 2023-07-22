<?PHP 

class Usuario 
{
    private $id;
    private $email;
    private $nombre_usuario;
    private $nombre_completo;
    private $password;
    private $rol;


/**
 * Encontrar usuario por email
 * @param string $email El email de usuario
 */
    public function usuario_x_email(string $email): ?Usuario
    {
        $conexion = Conexion::getConexion();
    $query = "SELECT * FROM usuarios WHERE email = ?";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute([$email]);
    
     $resultado = $PDOStatement->fetch();

     if (!$resultado) {
        return null;
    }
    return $resultado;
    }

      /**
     * trae el valor del id
     */ 
    public function getId()
    {
        return $this->id;
    }
     /**
     * trae el valor del email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
     /**
     * trae el valor del nombre del usuario
     */ 
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }
 /**
     * trae el valor del nombre completo
     */ 
    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }
/**
     * trae el valor del password
     */ 
    public function getPassword()
    {
        return $this->password;
    }
/**
     * trae el valor del rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

}