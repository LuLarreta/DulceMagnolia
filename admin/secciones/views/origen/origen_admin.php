<?PHP
$origen = (new Origen())->lista_completa();
?>

<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Administrar Pais de Origen</h1>
        <div class="table-responsive bg-texto p-3">
            <table class="table table-striped border_nav border-end-0 ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Calidad</th>
                        <th scope="col">Herramientas</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($origen as $O) { ?>
                        <tr>
                            <th scope="row"><?= $O->getId() ?></th>
                            <td><?= $O->getPais() ?></td>
                            <td><?= $O->getCalidad() ?></td>
                            <td>
                                <a href="index.php?sec=views/origen/editar_origen&id=<?= $O->getId() ?>" class="btn btn-primary">Modificar</a>
                                <a href="index.php?sec=views/origen/eliminar_origen&id=<?= $O->getId() ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>
            <div class="container ">
                <div class="container-fluid ">
                    <div class="row justify-content-evenly">
                        <div class="col-8 my-3  d-flex  flex-column-reverse"> <a href="index.php?sec=views/origen/agregar_origen" type="button" class="btn fs-3 bg-magnolia text-white">Agregar</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>