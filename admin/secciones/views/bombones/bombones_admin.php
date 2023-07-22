<?PHP
$bombones = (new Bombones())->catalogo_completo();

?>

<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Administrar Bombones</h1>
       
        <div class="container bg-texto p-3">
            <div class="table-responsive">
            <table class="table table-striped border_nav border-end-0 ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                         <th scope="col">Detalle</th>
                        <th scope="col">Tipo de Bombones</th>
                        <th scope="col">Tipo de Chocolate</th>
                        <th scope="col">Ingredientes</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Vencimiento</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Calorias</th>
                        <th scope="col">Herramientas</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($bombones as $b) { ?>
                        <tr>
                            <th scope="row"><?= $b->getId() ?></th>
                            <td><img src="../img/productos/<?= $b->getImagen() ?>" alt="Foto de <?= $b->getNombre() ?> " class="img-fluid"></td>
                            <td><?= $b->getNombre() ?></td>
                            <td><?= $b->getDetalle() ?></td>
                            <td><?= $b->getTipoBombones()?></td>
                            <td><?= $b-> getChocolateId()?></td> <!--Falta hacer el array para que aparezcan todos los datos -->
                            <td><?= $b->getIngredientesString() ?></td>
                            <td><?= $b->getPrecio() ?></td>
                            <td><?= $b->getVencimiento() ?></td>
                            <td><?= $b->getPeso() ?></td>
                            <td><?= $b->getCalorias() ?></td>
                            <td>
                                <a href="index.php?sec=views/bombones/editar_bombones&id=<?= $b->getId() ?>" class="btn btn-primary">Modificar</a>
                                <a href="index.php?sec=views/bombones/eliminar_bombones&id=<?= $b->getId() ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>
            <div class="container ">
                <div class="container-fluid ">
                    <div class="row justify-content-evenly">
                        <div class="col-8 my-3  d-flex  flex-column-reverse"> <a href="index.php?sec=views/bombones/agregar_bombones" type="button" class="btn fs-3 bg-magnolia text-white">Agregar</a></div>
                    </div>
                </div>
            </div></div>
        </div>
    </div>
</div>