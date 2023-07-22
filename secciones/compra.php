<?PHP

$id = $_GET['id'] ?? FALSE;
$bombonesId = new Bombones();
$producto = $bombonesId->producto_x_id($id);

?>

<?PHP if (!empty($producto)) { ?>
    <div class="container bg-light shadow ancho p-3">
        <div class="container-fluid">
            <div class="container bg-rosa shadow p-3">
                <div class="container">
                    <div class="container-fluid  bg-light shadow my-3 py-2 rounded fs-5 align-items-center">
                        <div class="row ">
                            <h2 class="border-bottom rounded text-center my-3 text-deco p-4 "><?= $producto->getNombre(); ?></h2>
                            <!-- empieza el row izquierdo -->
                            <div class="col-12 col-lg-6">
                                <div class="container ">
                                    <div>
                                        <img src="img/productos/<?= $producto->getImagen(); ?>" class="img-fluid shadow d-block m-auto" alt="Foto de <?= $producto->getNombre() ?>">
                                    </div>
                                    <p class="card-text text-center "><?= $producto->getDetalle(); ?></p>
                                </div>
                            </div>
                            <!-- termina el row izquierdo -->

                            <!-- empieza el row derecho -->
                            <div class="col-12 col-lg-6">
                                <div class="container fs-6">
                                    <div class="row d-flex flex-column">
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1">Peso:</p>
                                                <p class="m-1"><?= $producto->getPeso(); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1">Fecha de vencimiento:</p>
                                                <p class="m-1"><?= $producto->getVencimiento(); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1">Calorias:</p>
                                                <p class="m-1"><?= $producto->getCalorias(); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1">Chocolate Utilizado:</p>
                                                <p class="m-1"><?= $producto->getChocolateId() ?></p>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1">Tipo de Chocolate:</p>
                                                <p class="m-1"><?= $producto->getTipoChocolate() ?> </p>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="container border-bottom">
                                                        <p class="m-1">Pais de Origen:</p>
                                                        <p class="m-1"><?= $producto->getNombrePais() ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="container border-bottom">
                                                        <p class="m-1">Calidad:</p>
                                                        <p class="m-1"><?= $producto->getCalidadChocolate() ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1">Ingredientes Destacados:</p>
                                                <p class="m-1"><?= $producto->getIngredientesString() ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12">
                                        <p class="card-text fs-1 text-center">$<?= $producto->getPrecio() ?></p>
                                    </div>
                                </div>
                            </div><!-- termina el row derecho -->
                        </div>
                        <div class="container ">
                            <div class="container-fluid ">
                                <form action="admin/accion/carrito/agregar_carrito_acc.php" method="GET">
                                    <div class="row justify-content-evenly   m-3 ">
                                        <div class="col-8 col-lg-6 my-3  d-flex flex-column">
                                            <label for="cantidad">Cantidad:</label>
                                            <input type="number" class="form-control" value="1" name="cantidad" id="cantidad">
                                        </div>
                                        <div class="col-8 col-lg-6 my-3  d-flex flex-column-reverse ">
                                            <input type="submit" value="Comprar" class="btn fs-3 bg-magnolia text-white">
                                            <input type="hidden" value="<?= $id ?>" name="id" id="id">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?PHP } else { ?>
    <div class="col">
        <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
    </div>
<?PHP } ?>