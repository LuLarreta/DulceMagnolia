<?PHP

$paises = (new Origen())->lista_completa();
$tipos = (new TipoChocolate())->lista_completa();

?>

<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Agregar Chocolates</h1>
        <div class=" bg-texto p-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <form action="accion/chocolate/agregar_chocolate_acc.php" method="POST" enctype="multipart/form-data">
                            <div class="p-2">
                                <label for="nombre" class="form-label fs-4">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" require>
                            </div>
                            <div class="p-2">
                                <label for="origen_id" class="form-label fs-4">Pais de Origen</label>
                                <div class="form-control">
                                    <select name="origen_id" id="origen_id" class="border-0 w-100 fs-5" require>
                                        <option selected disabled value="">Seleccione Pais de Origen</option>
                                        <?PHP foreach ($paises as $p) { ?>
                                            <option value="<?= $p->getId() ?>"><?= $p->getPais() ?></option>
                                        <?PHP } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2">
                                <label for="tipo_chocolate_id" class="form-label fs-4">Tipo de Chocolate</label>
                                <div class="form-control">
                                    <select name="tipo_chocolate_id" id="tipo_chocolate_id" class="border-0 w-100 fs-5" require>
                                        <option selected disabled value="">Seleccione Tipo de Chocolate</option>
                                        <?PHP foreach ($tipos as $t) { ?>
                                            <option value="<?= $t->getId() ?>"><?= $t->getTipoChocolate() ?></option>
                                        <?PHP } ?>
                                    </select>

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