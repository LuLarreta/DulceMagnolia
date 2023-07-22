<div class="container bg-light shadow p-4 ">
    <div class="contaier-fluid">
        <h1 class="d-flex justify-content-center p-3">Agregar Origen</h1>
        <div class=" bg-texto p-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <form action="accion/origen/agregar_origen_acc.php" method="POST" enctype="multipart/form-data">
                            <div class="p-2">
                                <label for="pais" class="form-label fs-4">Pais</label>
                                <input type="text" class="form-control" id="pais" name="pais" require>
                            </div>
                            <div class="p-2">
                                <label for="calidad" class="form-label fs-4">Calidad</label>
                                <input type="text" class="form-control" id="calidad" name="calidad" require>
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