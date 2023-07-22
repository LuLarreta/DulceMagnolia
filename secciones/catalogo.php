<?PHP
$filtro = $_GET['tipo'] ?? FALSE;


$misBombones = new Bombones();


if ($filtro && ($filtro != "completo")) {
    $catalogo = $misBombones->catalogo_x_tipo($filtro);
} else {
    $catalogo = $misBombones->catalogo_completo();
}

$rolUsuario = $_SESSION['loggedIn']['rol'] ?? 'invitado';
?>


<div class="container">
    <h1 class="d-flex justify-content-center p-3">¡Bienvenido a Nuestro Catalogo en línea!</h1>
    <p class="fs-5">
        ¡Bienvenido al dulce mundo de los <strong class="fw-normal">bombones exquisitos</strong>! En nuestra <em class="fw-normal">tienda en línea</em>, te invitamos a deleitar tus sentidos con una selección única de <strong class="fw-normal">bombones artesanales y cautivadores</strong>. Sumérgete en un universo de <strong class="fw-normal">sabores sofisticados</strong> y <strong class="fw-normal">texturas tentadoras</strong> mientras exploras nuestro extenso catálogo lleno de <strong class="fw-normal">pequeñas obras maestras del chocolate</strong>.</p>

    <?PHP if (!empty($catalogo)) { ?>
        <div class="row ">

            <?PHP foreach ($catalogo as $misBombones) { ?>

                <div class="col-12  col-lg-4 col-md-6 align-items-stretch ">
                    <div class="container m-1 p-2 bg-rosa shadow">
                        <div class="container bg-light shadow p-1 rounded fs-5 align-items-center">
                            <div class="container-fluid">
                                <div class="row ">

                                    <h2 class="col-12 bg-light  text-center text-deco fs-5 border-bottom p-3   align-items-stretch"><?= $misBombones->getNombre() ?></h2>
                                    <div class="col-12 "> <img src="img/productos/<?= $misBombones->getImagen() ?> " class="img-fluid shadow d-block m-auto" alt="Foto de <?= $misBombones->getNombre() ?>">
                                    </div>
                                    <div class="col-12 ">
                                        <p class="card-text m-2 "><?= $misBombones->recortar_palabras() ?></p>
                                    </div>
                                    <div class=" col-12 justify-content-end">
                                        <p class="card-text fs-2 text-end">$<?= $misBombones->getPrecio() ?></p>
                                    </div>
                                    <div class="col-12 d-flex flex-column-reverse justify-content-evenly">
                                        <?PHP
                                        if ($rolUsuario === 'invitado') { ?>
                                            <a href="admin/index.php?sec=loguin" type="button" class="btn bg-magnolia text-white fs-4 p-1">Comprar</a>
                                        <?PHP } else { ?>
                                            <a href="index.php?sec=compra&id=<?= $misBombones->getId() ?>" type="button" class="btn bg-magnolia text-white fs-4 p-1">Comprar</a>
                                        <?PHP }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?PHP } ?>
        </div>

    <?PHP } else { ?>
        <div class="col">
            <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
        </div>
    <?PHP } ?>

</div>