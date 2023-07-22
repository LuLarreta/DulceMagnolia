<?PHP
$productos = (new Carrito())->getCarrito();

?>
<section class="bg-light shadow p-5 container">
    <div class="container-fluid ">
        <h2 class="text-center m-3 p-2">¡Su compra se ha enviado con éxito!</h2>
        <div class="bg-texto p-3">
            <p class="fs-3 text-center">¡Gracias por elegirnos! Prepararemos su pedido para que lo tengas cuanto antes.</p>
        </div>
        <h3 class="text-center">Detalles de su compra</h3>
        <?PHP if (count($productos)) { ?>
            <?PHP foreach ($productos as $key => $item) { ?>
                <div class="row ">
                    <div class="container border-bottom ">
                        <div class="container-fluid">
                            <div class="row m-3 align-items-center">
                                <div class="col-lg-3 col-12 ">
                                    <img src="img/productos/<?= $item['imagen'] ?>" class="img-fluid shadow d-block m-auto" alt="Foto de <?= $bombon['producto'] ?>">
                                </div>
                                <div class="col-lg-9 col-12">
                                    <h4 class=" text-center my-3 fs-4 text-deco p-1 "><?= $item['producto']  ?></h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-12 px-5 text-center">
                                            <label for="cantidad_<?= $key ?>" class="fs-6 p-2">Cantidad</label>
                                            <input type="number" class="form-control text-end px-2" value="<?= $item['cantidad'] ?>" id="cantidad_<?= $key ?>" name="cantidad[<?= $key ?>]">
                                        </div>
                                        <div class="col-lg-6 col-12 my-2 d-flex flex-column align-items-end border-bottom ">
                                            <p class="fs-6">Precio unitario</p>
                                            <p class="">$ <?= $item['precio'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12  d-flex flex-column align-items-end">
                                            <p class="fs-6">Subtotal</p>
                                            <p class="fw-bold">$ <?= number_format($item['precio2'] * $item['cantidad'], 2, ",", ".") ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?PHP } ?>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end align-items-center">
                    <div class="col-12 mx-5">
                        <p class="fs-6 text-end">Total </p>
                        <p class="fw-bold fs-2 text-end">$<?= number_format((new Carrito())->precioTotal(), 2, ",", ".") ?></p>
                    </div>
                </div>
            <?PHP } ?>
    </div>
  
    <script>
        setTimeout(function() {
            window.location.href = "index.php?sec=home"; // Redirige al Home después de 40 segundos
        }, 20000); // 40 segundos en milisegundos
    </script> 

    <?PHP (new Carrito())->vaciarCarrito();  ?>
</section>