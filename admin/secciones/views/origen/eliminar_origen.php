<?PHP
$id = $_GET['id'] ?? FALSE;
$origen = (new Origen())->get_x_origen($id);
?>
<div class="container  bg-light shadow p-4 ">
    <div class="container-fluid">
        <h1 class="d-flex justify-content-center p-3">¿Está seguro que desea eliminar este origen?</h1>
        <div class="container bg-texto p-3">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-4">
                        <img src="../img/jengi.png" alt="bombon asustado" class="img-fluid jengi-cards">
                    </div>
                    <div class=" col-8">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h2>Pais</h2>
                                    <p><?= $origen->getPais() ?></p>
                                </div>
                                <div class="col-12">
                                    <h2>Calidad</h2>
                                    <p><?= $origen->getCalidad() ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <a href="accion/origen/eliminar_origen_acc.php?id=<?= $origen->getId() ?>" role="button" class="d-block btn  fs-3 bg-magnolia text-white">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>