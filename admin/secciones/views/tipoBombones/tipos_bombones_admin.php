<?PHP
$tipos = (new TipoBombones())->lista_completa();
?>

<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Administrar Tipos de Bombones</h1>
        <div class="table-responsive bg-texto p-3">
            <table class="table table-striped border_nav border-end-0 ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Proceso</th>
                        <th scope="col">Herramientas</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($tipos as $T) { ?>
                        <tr>
                            <th scope="row"><?= $T->getId() ?></th>
                            <td><?= $T->getNombre() ?></td>
                            <td><?= $T->getProceso() ?></td>
                            <td>
                                <a href="index.php?sec=views/tipoBombones/editar_tipos&id=<?= $T->getId() ?>" class="btn btn-primary m-1">Modificar</a>
                                <a href="index.php?sec=views/tipoBombones/eliminar_tipos&id=<?= $T->getId() ?>" class="btn btn-danger m-1">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>
            <div class="container ">
                <div class="container-fluid ">
                    <div class="row justify-content-evenly">
                        <div class="col-8 my-3  d-flex  flex-column-reverse"> <a href="index.php?sec=views/tipoBombones/agregar_tipos" type="button" class="btn fs-3 bg-magnolia text-white">Agregar</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>