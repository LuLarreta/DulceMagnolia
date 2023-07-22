<?PHP

require_once "funciones/autoload.php";



$secciones_validas = [
    //para que en la pestana arriba aparezca el titulo de la seccion en donde estemos
    "home" => [
        "titulo" => "Home"
    ], "catalogo" => [
        "titulo" => "Nuestro Catalogo"
    ], "compra" => [
        "titulo" => "Comprar Online"
    ], "galeria" => [
        "titulo" => "Galeria de Fotos"
    ], "formulario" => [
        "titulo" => "Contactenos"
    ], "datos_del_alumno" => [
        "titulo" => "Quienes Somos"
    ], "carrito" => [
        "titulo" => "Carrito de Compras"
    ], "formularioEnviado" => [
        "titulo" => "Envio con Exito"
    ], "compraEnviada" => [
        "titulo" => "Envio con Exito"
    ]
];

$seccion = isset($_GET['sec']) ? $_GET['sec'] :  "home";
//evitar que se puedan ver archivos que no hay que ver
if (array_key_exists($seccion, $secciones_validas)) {
    $vista = $seccion;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/css.css">

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
                    <?PHP if($rolUsuario === 'invitado') { ?>
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item my-lg-2"><a class="nav-link text-dark text-decoration-none ms-1  ps-1 pe-2 py-2 border_nav  " href="index.php?sec=home">Home</a></li>
                        <li class="nav-item dropdown my-2"><a class="nav-link dropdown-toggle  text-dark text-decoration-none ms-1  pe-2  py-2  border_nav" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="index.php?sec=catalogo">Catalogo</a>
                            <ul class="dropdown-menu  bg-lucia  ">
                                <li><a class="dropdown-item p-2" href="index.php?sec=catalogo">Catalogo Completo</a></li>
                                <li><a class="dropdown-item p-2" href="index.php?sec=catalogo&tipo=3">Praline</a></li>
                                <li><a class="dropdown-item p-2" href="index.php?sec=catalogo&tipo=1">Bombones</a></li>
                                <li><a class="dropdown-item p-2" href="index.php?sec=catalogo&tipo=2">Trufas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item my-2"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=galeria">Galería</a></li>
                        <li class="nav-item my-2"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=datos_del_alumno">Quienes Somos</a></li>
                        <li class="nav-item my-2"><a class="nav-link text-dark text-decoration-none  ms-1 pe-2  py-2 border_nav " href="index.php?sec=formulario">Contacto</a></li>
                        <li class="nav-item my-2"><a class="nav-link text-dark text-decoration-none  ms-1 pe-2  py-2 border_nav" href="admin/index.php?sec=loguin">Iniciar Sesion</a></li>
                    </ul>
                    <?PHP } elseif ($rolUsuario === 'usuario') {?>
                        <ul class="navbar-nav align-items-center">
                        <li class="nav-item my-lg-2"><a class="nav-link text-dark text-decoration-none ms-1  ps-1 pe-2 py-2 border_nav  " href="index.php?sec=home">Home</a></li>
                        <li class="nav-item dropdown my-2"><a class="nav-link dropdown-toggle  text-dark text-decoration-none ms-1  pe-2  py-2  border_nav" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="index.php?sec=catalogo">Catalogo</a>
                            <ul class="dropdown-menu  bg-lucia  ">
                                <li><a class="dropdown-item p-2" href="index.php?sec=catalogo">Catalogo Completo</a></li>
                                <li><a class="dropdown-item p-2" href="index.php?sec=catalogo&tipo=3">Praline</a></li>
                                <li><a class="dropdown-item p-2" href="index.php?sec=catalogo&tipo=1">Bombones</a></li>
                                <li><a class="dropdown-item p-2" href="index.php?sec=catalogo&tipo=2">Trufas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item my-2"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=galeria">Galería</a></li>
                        <li class="nav-item my-2"><a class="nav-link text-dark text-decoration-none ms-1 pe-2  py-2 border_nav" href="index.php?sec=datos_del_alumno">Quienes Somos</a></li>
                        <li class="nav-item my-2"><a class="nav-link text-dark text-decoration-none  ms-1 pe-2  py-2 border_nav " href="index.php?sec=formulario">Contacto</a></li>
                        <li class="nav-item my-2"><a class="nav-link text-dark text-decoration-none  ms-1 pe-2  py-2 border_nav " href="index.php?sec=carrito">Carrito</a></li>
                        <li class="nav-item my-2 <?= ($rolUsuario === 'usuario') ? "d-none" : "" ?>"><a class="nav-link text-dark text-decoration-none  ms-1 pe-py-2 me-1 " href="admin/index.php?sec=loguin">Iniciar Sesion</a></li>
                        <li class="nav-item my-lg-2 <?= ($rolUsuario === 'usuario') ? "" : "d-none" ?>"><a class="nav-link text-dark text-decoration-none  ms-1 pe-py-2 me-1 " href="admin/accion/loguear/logout_acc.php">Cerrar Sesion</a></li>
                        
                    </ul>
                        <?PHP } ?>

                </div>
            </nav>

        </div>
    </div>


    <main class="m-3">
        <?PHP

            require_once file_exists("secciones/$vista.php") ? "secciones/$vista.php" : "secciones/404.php";
        







        ?>


    </main>


</body>

</html>