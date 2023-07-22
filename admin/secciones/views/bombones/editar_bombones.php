<?PHP
$id = $_GET['id'] ?? FALSE;
$bombones = (new Bombones())->producto_x_id($id);

$tipo_bombones = (new TipoBombones())->lista_completa();
$ingredientes = (new Ingredientes())->listaCompleta();
$chocolate = (new Chocolate())->lista_completa();
$gestorImagenes = (new Imagen());


?>


<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Editar Bombones</h1>
        <div class=" bg-texto p-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <form action="accion/bombones/editar_bombones_acc.php?id=<?= $bombones->getId() ?>" method="POST" enctype="multipart/form-data">
                            <div class="p-2">
                                <label for="nombre" class="form-label fs-4">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $bombones->getNombre() ?>" require>
                            </div>
                            <div class="p-2">
                                <label for="detalle" class="form-label fs-4">Detalle</label>
                                <textarea class="form-control" id="detalle" name="detalle" rows="4" required><?= $bombones ? $bombones->getDetalle() : '' ?></textarea>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                <div class="col-lg-6 col-12 mb-3 p-2">
                                    <label for="imagen" class="form-label fs-4">Imagen Actual</label>
                                    <img src=../img/productos/<?= $bombones->getImagen() ?> alt="Imagen de <?= $bombones->getNombre() ?>" class="img-fluid">
                                    <input class="form-control" type="hidden" id="imagen_og" name="imagen_og" value="<?= $bombones->getImagen() ?>">
                                </div>

                                <div class="col-lg-6 col-12 mb-3 p-2">
                                    <label for="imagen" class="form-label fs-4">Reemplazar Imagen</label>
                                    <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*">
                                </div>
                            </div></div>
                            <div class="p-2">
                                <label for="tipo_bombones" class="form-label fs-4">Tipo de Bombon</label>
                                <div class="form-control">
                                    <select name="tipo_bombones" id="tipo_bombones" class="border-0 w-100 fs-5" require>
                                        <option selected disabled value="">Seleccione un Tipo de Bombon</option>
                                        <?PHP foreach ($tipo_bombones as $T) { ?>
                                            <option value="<?= $T->getId() ?>" <?= $bombones && $bombones->getTipoBombones() === $T->getNombre() ? 'selected' : ''  ?>><?= $T->getNombre() ?></option>
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
                                            <option value="<?= $C->getId() ?>" <?= $bombones && $bombones->getChocolateId() === $C->getNombreChocolate() ? 'selected' : '' ?>><?= $C->getNombreChocolate() ?> | <?= $C->getOrigenPais() ?> | <?= $C->getTipoChocolate() ?></option>
                                        <?PHP } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2">
                                <label for="ingredientes" class="form-label fs-4">Ingredientes</label>
                                <div class="form-control">
                                    <div class="row">
                                        <?php foreach ($ingredientes as $I) { ?>
                                            <?php
                                            // Verificamos si el ID del ingrediente actual está presente en los ingredientes asociados
                                            $ingredientesAsociados = $bombones ? $bombones->getIngredientes() : [];
                                            $estaSeleccionado = in_array($I->getId(), $ingredientesAsociados);
                                            ?>
                                            <div class="col-lg-4">
                                                <input type="checkbox" name="ingredientes[]" id="<?= $I->getId() ?>" value="<?= $I->getId() ?>" <?= $estaSeleccionado ? 'checked' : ''; ?>>
                                                <label for="<?= $I->getId() ?>" class="fs-5"><?= $I->getNombreIngredientes() ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                            <div class="row">
                            <div class="p-2 col-lg-6 col-12">
                                <label for="precio" class="form-label fs-4">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" value="<?= $bombones->getPrecioBien() ?>" max="9999999.99" min="0" step="0.01"  required>
                            </div>
                            <div class=" p-2 col-lg-6 col-12">
                                <label for="peso" class="form-label fs-4">Peso</label>
                                <input type="number" class="form-control" id="peso" name="peso" value="<?= $bombones->getPeso() ?>" max="9999999.99" min="0" step="0.01" require>
                            </div></div></div>
                            <div class="container">
                            <div class="row">
                            <div class="p-2 col-lg-6 col-12">
                                <label for="kcal" class="form-label fs-4">Calorias</label>
                                <input type="number" class="form-control" id="kcal" name="kcal" value="<?= $bombones->getCalorias() ?>" min="0" max="999" require>
                            </div>
                            <div class="p-2 col-lg-6 col-12">
                                <label for="vto" class="form-label fs-4">Vencimiento</label>
                                <input type="date" class="form-control" id="vto" name="vto" value="<?= $bombones->getVencimiento() ?>" require>
                            </div></div></div>

                            <div class="m-3  d-flex  flex-column-reverse">
                                <button type="submit" class="btn fs-3 bg-magnolia text-white">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>