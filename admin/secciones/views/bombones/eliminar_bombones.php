<?PHP
$id = $_GET['id'] ?? FALSE;
$bombones = (new Bombones())->producto_x_id($id);
?>


<div class="container  bg-light shadow p-4 ">
    <div class="container-fluid">
        <h1 class="d-flex justify-content-center p-3">¿Está seguro que desea eliminar este bombón?</h1>
        <div class="container bg-texto p-3">
            <div class="container-fluid">
                <div class="row">
                <h2 class="border-bottom rounded text-center my-3 text-deco p-4 "><?= $bombones->getNombre(); ?></h2>
                            <!-- empieza el row izquierdo -->
                            <div class="col-12 col-lg-6">
                                <div class="container ">
                                    <div>
                                        <img src="../img/productos/<?= $bombones->getImagen(); ?>" class="img-fluid shadow d-block m-auto" alt="Foto de <?= $bombones->getNombre(); ?>">
                                    </div>
                                    <p class="card-text text-center py-2 "><?= $bombones->getDetalle(); ?></p>
                                </div>
                            </div>
                            <!-- termina el row izquierdo -->

                            <!-- empieza el row derecho -->
                            <div class="col-12 col-lg-6">
                                <div class="container fs-6">
                                    <div class="row d-flex flex-column">
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1 fw-bold">Peso:</p>
                                                <p class="m-1"><?= $bombones->getPeso(); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1 fw-bold">Fecha de vencimiento:</p>
                                                <p class="m-1"><?= $bombones->getVencimiento(); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1 fw-bold">Calorias:</p>
                                                <p class="m-1"><?= $bombones->getCalorias(); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1 fw-bold">Chocolate Utilizado:</p>
                                                <p class="m-1"><?= $bombones->getChocolateId(); ?></p>
                                            </div>
                                        </div>
                                     
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1 fw-bold">Tipo de Chocolate:</p>
                                                <p class="m-1"><?= $bombones->getTipoChocolate()?></p>
                                            </div>
                                        </div> 
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="container border-bottom">
                                                        <p class="m-1 fw-bold">Pais de Origen:</p>
                                                        <p class="m-1"><?= $bombones->getNombrePais()?></p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="container border-bottom">
                                                        <p class="m-1 fw-bold">Calidad:</p>
                                                        <p class="m-1"><?= $bombones->getCalidadChocolate()?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="container border-bottom">
                                                <p class="m-1 fw-bold">Ingredientes Destacados:</p>
                                                <p class="m-1"><?= $bombones->getIngredientesString() ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12">
                                        <p class="card-text fs-1 text-center">$<?= $bombones->getPrecio(); ?></p>
                                    </div>
                                </div>
                            </div><!-- termina el row derecho -->
                        </div>
                </div>
                <div class="container">
                    <div class="row">
                        <a href="accion/bombones/eliminar_bombones_acc.php?id=<?= $bombones->getId() ?>" role="button" class="d-block btn  fs-3 bg-magnolia text-white">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>