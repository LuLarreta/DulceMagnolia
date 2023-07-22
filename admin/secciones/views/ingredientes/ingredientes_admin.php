<?PHP
$ingredientes = (new Ingredientes())->listaCompleta();
?>
<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Administrar Ingredientes</h1>
        <div class="table-responsive bg-texto p-3">
            <table class="table table-striped border_nav border-end-0 ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Herramientas</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($ingredientes as $I) { ?>
                        <tr>
                            <th scope="row"><?= $I->getId() ?></th>
                            <td><?= $I->getNombreIngredientes() ?></td>
                            <td>
                                <a href="index.php?sec=views/ingredientes/editar_ingrediente&id=<?= $I->getId() ?>" class="btn btn-primary">Modificar</a>
                                <a href="index.php?sec=views/ingredientes/eliminar_ingrediente&id=<?= $I->getId() ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>
            <div class="container ">
                <div class="container-fluid ">
                    <div class="row justify-content-evenly">
                        <div class="col-8 my-3  d-flex  flex-column-reverse"> <a href="index.php?sec=views/ingredientes/agregar_ingrediente" type="button" class="btn fs-3 bg-magnolia text-white">Agregar</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>