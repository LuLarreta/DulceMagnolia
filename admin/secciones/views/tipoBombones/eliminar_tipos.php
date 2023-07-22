<?PHP
$id = $_GET['id'] ?? FALSE;
$tipos = (new TipoBombones())->get_x_tipo($id);
?>
<div class="container  bg-light shadow p-4 ">
    <div class="container-fluid">
        <h1 class="d-flex justify-content-center p-3">¿Está seguro que desea eliminar este Tipo de Bombones?</h1>
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
                                    <h2>Nombre</h2>
                                    <p><?= $tipos->getNombre() ?></p>
                                </div>
                                <div class="col-12">
                                    <h2>Proceso</h2>
                                    <p><?= $tipos->getProceso() ?></p>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <a href="accion/tiposBombones/eliminar_tipos_acc.php?id=<?= $tipos->getId() ?>" role="button" class="d-block btn  fs-3 bg-magnolia text-white">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>