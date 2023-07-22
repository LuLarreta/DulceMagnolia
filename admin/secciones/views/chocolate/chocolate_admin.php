<?PHP
$chocolate = (new Chocolate())->lista_completa();
/* echo "<pre>";
print_r($chocolate);
echo "</pre>"; */



?>

<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Administrar Chocolate</h1>
        <div class="table-responsive bg-texto p-3">
            <table class="table table-striped border_nav border-end-0 ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Tipo de Chocolate</th>
                        <th scope="col">Herramientas</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($chocolate as $C) { ?>
                        <tr>
                            <th scope="row"><?= $C->getId() ?></th>
                            <td><?= $C->getNombreChocolate() ?></td>
                            <td><?= $C->getOrigenPais() ?></td>
                            <td><?= $C->getTipoChocolate() ?></td>
                            <td>
                                <a href="index.php?sec=views/chocolate/editar_chocolate&id=<?= $C->getId() ?>" class="btn btn-primary">Modificar</a>
                                <a href="index.php?sec=views/chocolate/eliminar_chocolate&id=<?= $C->getId() ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>
            <div class="container ">
                <div class="container-fluid ">
                    <div class="row justify-content-evenly">
                        <div class="col-8 my-3  d-flex  flex-column-reverse"> <a href="index.php?sec=views/chocolate/agregar_chocolate" type="button" class="btn fs-3 bg-magnolia text-white">Agregar</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>