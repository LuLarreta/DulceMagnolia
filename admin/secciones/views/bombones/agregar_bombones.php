<?PHP

$tipo_bombones = (new TipoBombones())->lista_completa();
$ingredientes = (new Ingredientes())->listaCompleta();
$chocolate = (new Chocolate())->lista_completa();


?>


<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Agregar Bombones</h1>
        
        <div class=" bg-texto p-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <form action="accion/bombones/agregar_bombones_acc.php" method="POST" enctype="multipart/form-data">
                            <div class="p-2">
                                <label for="nombre" class="form-label fs-4">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" require>
                            </div>
                            <div class="p-2">
                                <label for="detalle" class="form-label fs-4">Detalle</label>
                                <textarea class="form-control" id="detalle" name="detalle" rows="4" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input class="form-control" type="file" id="imagen" name="foto" required>
                            </div>
                            <div class="p-2">
                                <label for="tipo_bombones" class="form-label fs-4">Tipo de Bombon</label>
                                <div class="form-control">
                                    <select name="tipo_bombones" id="tipo_bombones" class="border-0 w-100 fs-5" require>
                                        <option selected disabled value="">Seleccione un Tipo de Bombon</option>
                                        <?PHP foreach ($tipo_bombones as $T) { ?>
                                            <option value="<?= $T->getId() ?>"><?= $T->getNombre() ?></option>
                                        <?PHP } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2">
                                <label for="chocolate" class="form-label fs-4">Tipo de Chocolate</label>
                                <div class="form-control">
                                    <select name="chocolate" id="chocolate" class="border-0 w-100 fs-5" require>
                                        <option selected disabled value="">Seleccione un Tipo de Chocolate</option>
                                        <?PHP foreach ($chocolate as $C) { ?>
                                            <option value="<?= $C->getId() ?>"><?= $C->getNombreChocolate() ?> | <?= $C->getOrigenPais() ?> | <?= $C->getTipoChocolate() ?></option>
                                        <?PHP } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2">
                                <label for="ingredientes" class="form-label fs-4">Ingredientes</label>
                                <div class="form-control">
                                    <?php foreach ($ingredientes as $I) { ?>
                                        <div>
                                            <input type="checkbox" name="ingredientes[]" id="<?= $I->getId() ?>" value="<?= $I->getId() ?>">
                                            <label for="<?= $I->getId() ?>"><?= $I->getNombreIngredientes() ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="p-2">
                                <label for="precio" class="form-label fs-4">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" max="9999999.99" min="0" step="0.01" require>
                            </div>
                            
                            <div class="p-2">
                                <label for="peso" class="form-label fs-4">Peso</label>
                                <input type="number" class="form-control" id="peso" name="peso" step="0.01" require>
                            </div>
                            <div class="p-2">
                                <label for="kcal" class="form-label fs-4">Calorias</label>
                                <input type="number" class="form-control" id="kcal" name="calorias" min="0" max="999" require>
                            </div>
                            <div class="p-2">
                                <label for="vto" class="form-label fs-4">Vencimiento</label>
                                <input type="date" class="form-control" id="vto" name="vencimiento" require>
                            </div>
                            
                                <div class="m-3  d-flex  flex-column-reverse">
                                    <button type="submit" class="btn fs-3 bg-magnolia text-white">Cargar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>