<?PHP
$id = $_GET['id'] ?? FALSE;
$chocolate = (new TipoChocolate())->get_x_tipo($id);
?>
<div class="container  bg-light shadow p-4 ">
    <div class="container-fluid">
        <div>
            <h1 class="d-flex justify-content-center p-3">Editar Chocolates</h1>
            <div class=" bg-texto p-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                <form action="accion/tiposChocolate/editar_Tchocolate_acc.php?id=<?= $chocolate->getId() ?>" method="POST" enctype="multipart/form-data">
                    <div class="p-2">
                        <label for="nombre" class="form-label fs-4">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $chocolate->getTipoChocolate() ?>" require>
                    </div>
                    <div class="m-3  d-flex  flex-column-reverse">
                    <button type="submit" class="btn fs-3 bg-magnolia text-white">Cargar</button></div>
                </form>
            </div></div></div>
        </div></div>
    </div>
</div>