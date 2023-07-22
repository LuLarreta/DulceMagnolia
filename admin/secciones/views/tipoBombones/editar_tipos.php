<?PHP
$id = $_GET['id'] ?? FALSE;
$tipos = (new TipoBombones())->get_x_tipo($id);
?>
<div class="container  bg-light shadow p-4 ">
    <div class="container-fluid">
        <div>
            <h1 class="d-flex justify-content-center p-3">Editar Tipo de Bombones</h1>
            <div class=" bg-texto p-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                <form action="accion/tiposBombones/editar_tipos_acc.php?id=<?= $tipos->getId() ?>" method="POST" enctype="multipart/form-data">
                    <div class="p-2">
                        <label for="nombre" class="form-label fs-4">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $tipos->getNombre() ?>" require>
                    </div>
                    <div class="p-2">
                        <label for="proceso" class="form-label  fs-4">Proceso</label>
                        <textarea class="form-control" id="proceso" name="proceso" rows="4" require><?= $tipos->getProceso() ?> </textarea>
                    </div>
                    <div class="m-3  d-flex  flex-column-reverse">
                    <button type="submit" class="btn fs-3 bg-magnolia text-white">Cargar</button></div> 
                </form>
            </div></div></div>
        </div></div>
    </div>
</div>