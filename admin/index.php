<?PHP
require_once "../funciones/autoload.php";

/** 
 *echo "<pre>";
 *print_r($_SESSION);
 *echo "</pre>";
 */

$secciones_validas = [
    //para que en la pestana arriba aparezca el titulo de la seccion en donde estemos
    "loguin" => [
        "titulo" => "Iniciar Sesion",
        "restringido" => FALSE
    ],
    "panel" => [
        "titulo" => "Panel de Control",
        "restringido" => TRUE
    ],
    "views/chocolate/chocolate_admin" => [
        "titulo" => "Panel de Chocolate",
        "restringido" => TRUE
    ],
    "views/chocolate/agregar_chocolate" => [
        "titulo" => "Agregar Chocolate",
        "restringido" => TRUE
    ],
    "views/chocolate/editar_chocolate" => [
        "titulo" => "Editar Chocolate",
        "restringido" => TRUE
    ],
    "views/chocolate/eliminar_chocolate" => [
        "titulo" => "Eliminar Chocolate",
        "restringido" => TRUE
    ],
    "views/ingredientes/ingredientes_admin" => [
        "titulo" => "Panel de Ingredientes",
        "restringido" => TRUE
    ],
    "views/ingredientes/editar_ingrediente" => [
        "titulo" => "Editar Ingredientes",
        "restringido" => TRUE
    ],
    "views/ingredientes/eliminar_ingrediente" => [
        "titulo" => "Eliminar Ingredientes",
        "restringido" => TRUE
    ],
    "views/ingredientes/agregar_ingrediente" => [
        "titulo" => "Agregar Ingredientes",
        "restringido" => TRUE
    ],
    "views/origen/origen_admin" => [
        "titulo" => "Panel de Origen",
        "restringido" => TRUE
    ],
    "views/origen/editar_origen" => [
        "titulo" => "Editar Origen",
        "restringido" => TRUE
    ],
    "views/origen/eliminar_origen" => [
        "titulo" => "Eliminar Origen",
        "restringido" => TRUE
    ],
    "views/origen/agregar_origen" => [
        "titulo" => "Agregar Origen",
        "restringido" => TRUE
    ],
    "views/tipoBombones/tipos_bombones_admin" => [
        "titulo" => "Panel de Tipos de Bombones",
        "restringido" => TRUE
    ],
    "views/tipoBombones/agregar_tipos" => [
        "titulo" => "Agregar Tipos de Bombones",
        "restringido" => TRUE
    ],
    "views/tipoBombones/editar_tipos" => [
        "titulo" => "Editar Tipos de Bombones",
        "restringido" => TRUE
    ],
    "views/tipoBombones/eliminar_tipos" => [
        "titulo" => "Eliminar Tipos de Bombones",
        "restringido" => TRUE
    ],
    "views/tiposChocolate/tipos_chocolate_admin" => [
        "titulo" => "Panel de Tipos de Chocolates",
        "restringido" => TRUE
    ],
    "views/tiposChocolate/agregar_Tchocolate" => [
        "titulo" => "Agregar Tipos de Chocolates",
        "restringido" => TRUE
    ],
    "views/tiposChocolate/editar_Tchocolate" => [
        "titulo" => "Editar Tipos de Chocolates",
        "restringido" => TRUE
    ],
    "views/tiposChocolate/eliminar_Tchocolate" => [
        "titulo" => "Eliminar Tipos de Chocolates",
        "restringido" => TRUE
    ],
    "views/bombones/bombones_admin" => [
        "titulo" => "Panel de Bombones",
        "restringido" => TRUE
    ],
    "views/bombones/agregar_bombones" => [
        "titulo" => "Agregar Bombones",
        "restringido" => TRUE
    ],
    "views/bombones/editar_bombones" => [
        "titulo" => "Editar Bombones",
        "restringido" => TRUE
    ],
    "views/bombones/eliminar_bombones" => [
        "titulo" => "Eliminar Bombones",
        "restringido" => TRUE
    ],

];

$seccion =  $_GET['sec'] ??  "panel";
//evitar que se puedan ver archivos que no hay que ver
if (array_key_exists($seccion, $secciones_validas)) {
    $vista = $seccion;

    if ($secciones_validas[$seccion]['restringido']) {
        (new Autenticacion())->verify();
    }

    $titulo = $secciones_validas[$seccion]['titulo'];
} else {
    $vista = "404";
    $titulo = "404 - No se encontro la pagina";
}

$rolUsuario = $_SESSION['loggedIn']['rol'] ?? 'invitado';

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulce Magnolia | <?= $titulo ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/css.css">

</head>

<body class="bg-magnolia">
    <header class="bg-magnolia">
        <h1 class="d-none">Dulce Magnolia</h1>
    </header>

    <div>
        <div class="container-fluid bg-texto p-0 ">

            <nav class="navbar navbar-expand-lg p-3  bg-lucia bg-gradient">
                <a class="navbar-brand mx-auto">
                    <p class="text-deco text-center pt-3">Dulce Magnolia</p>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#barraNavegacion" aria-controls="barraNavegacion" aria-expanded="false" aria-label="Despliega Navegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end " id="barraNavegacion">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item my-lg-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none ms-1  ps-1 pe-2 py-2 border_nav  " href="index.php?sec=panel">Panel de Control</a></li>
                        <li class="nav-item my-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none ms-1  ps-1 pe-2 py-2 border_nav  " href="index.php?sec=views/bombones/bombones_admin">Bombones</a></li>
                        <li class="nav-item my-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=views/chocolate/chocolate_admin">Chocolate</a></li>
                        <li class="nav-item my-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=views/ingredientes/ingredientes_admin">Ingredientes</a></li>
                        <li class="nav-item my-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=views/origen/origen_admin">Origen</a></li>
                        <li class="nav-item my-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=views/tipoBombones/tipos_bombones_admin">Tipos Bombones</a></li>
                        <li class="nav-item my-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=views/tiposChocolate/tipos_chocolate_admin">Tipos Chocolate</a></li>
                        <li class="nav-item my-lg-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "d-none" : "" ?>"><a class="nav-link text-dark text-decoration-none  ms-1 pe-py-2 me-1 " href="index.php?sec=loguin">Iniciar Sesion</a></li>
                        <li class="nav-item my-lg-2 <?= ($rolUsuario === 'administrador' || $rolUsuario === 'superadmin') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none  ms-1 pe-py-2 me-1 " href="accion/loguear/logout_acc.php">Cerrar Sesion</a></li>
                        
                        
                        
                        
                        
                        
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <main class="m-3 p-3">
        <div class="container">
            <?PHP
            require_once file_exists("secciones/$vista.php") ? "secciones/$vista.php" : "secciones/404.php";
            ?>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>