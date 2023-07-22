<?PHP 
include_once '../funciones/autoload.php';
?>

<div class="container bg-light shadow ancho p-3 ">
    <div class="container-fluid">
        <div class="container bg-rosa shadow p-3">
            <div class="container">
                <div class="container-fluid  bg-light shadow my-3 py-2 rounded fs-5 align-items-center">
                    <h1 class="text-center m-3 fw-bold">Iniciar Sesión</h1>
                    <div>
			<?= (new Alerta())->get_alertas(); ?>
		</div> 
                    <form class="row justify-content-center" action="accion/loguear/loguin_acc.php" method="POST">
                        <div class="col-12 col-lg-8 m-3">
                            <label for="email" class="form-label p-2 ">Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-12 col-lg-8 m-3">
                            <label for="password" class="form-label p-2 ">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col-12 col-lg-6 my-3  d-flex  flex-column-reverse">
                            <button type="submit" class="btn fs-3 bg-magnolia text-white">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>