<?PHP


$bombones = (new Carrito())->getCarrito();

?>

<h1 class="d-flex justify-content-center p-3">Tu Carrito De Compras</h1>
<div>
    <div class="container bg-light shadow ancho p-3">
        <div class="container-fluid">
            <div class="container bg-rosa shadow p-3">
                <div class="container">
                    <div class="container-fluid  bg-light shadow my-3 py-2 rounded fs-5 align-items-center">
                        <?PHP if (count($bombones)) { ?>
                            <form action="admin/accion/carrito/editar_carrito_acc.php" method="POST">
                                <?PHP foreach ($bombones as $key => $bombon) { ?>
                                    <div class="row ">
                                        <div class="container border-bottom ">
                                            <div class="container-fluid">
                                                <div class="row m-3 align-items-center">
                                                    <div class="col-lg-3 col-12 ">
                                                        <img src="img/productos/<?= $bombon['imagen'] ?>" class="img-fluid shadow d-block m-auto" alt="Foto de <?= $bombon['producto'] ?>">
                                                    </div>
                                                    <div class="col-lg-9 col-12">
                                                        <h2 class=" text-center my-3 fs-4 text-deco p-1 "><?= $bombon['producto']  ?></h2>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-12 px-5 text-center">
                                                                <label for="cantidad_<?= $key ?>" class="fs-6 p-2">Cantidad</label>
                                                                <input type="number" class="form-control text-end px-2" value="<?= $bombon['cantidad'] ?>" id="cantidad_<?= $key ?>" name="cantidad[<?= $key ?>]">
                                                            </div>
                                                            <div class="col-lg-6 col-12 my-2 d-flex flex-column align-items-end border-bottom ">
                                                                <p class="fs-6">Precio unitario</p>
                                                                <p class="">$ <?= $bombon['precio'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6  d-flex justify-content-center align-items-end">
                                                                <a href="admin/accion/carrito/eliminar_producto_acc.php?id=<?= $key ?>">
                                                                    <p class="btn btn-dark">Eliminar Item</p>
                                                                </a>
                                                            </div>
                                                            <div class="col-6  d-flex flex-column align-items-end">
                                                                <p class="fs-6">Subtotal</p>
                                                                <p class="fw-bold">$ <?= number_format($bombon['precio2'] * $bombon['cantidad'], 2, ",", ".") ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?PHP } ?>
                                    </div>
                                    <div class="row justify-content-end align-items-center">
                                        <div class="col-6">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12 my-2 d-flex justify-content-center"><a href="admin/accion/carrito/vaciar_carrito_acc.php" role="button" class="btn btn-dark">Vaciar Carrito</a></div>
                                                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                                                        <input type="submit" value="Actulizar Cantidades" class="btn btn-warning">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="fs-6 text-end">Total </p>
                                            <p class="fw-bold fs-2 text-end">$<?= number_format((new Carrito())->precioTotal(), 2, ",", ".") ?></p>
                                        </div>
                                    </div>
                                    <div class="row p-2 m-2">
                                        <div class="col-6 d-flex justify-content-center">
                                            <a href="index.php?sec=catalogo" role="button" class="btn fs-3 text-danger  btn-light">Seguir Comprando</a>
                                        </div>
                                        <div class=" col-6 d-flex justify-content-center">
                                            <a href="admin/accion/carrito/finalizar_compra_acc.php" role="button" class="btn fs-3 bg-magnolia text-white">Finalizar compra</a>
                                        </div>
                                    </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?PHP } else { ?>
<div class="bg-texto p-3">
            <p class="fs-3 text-center">Tu carrito está vacío</p>
        </div>

        <?PHP } ?>
</div>