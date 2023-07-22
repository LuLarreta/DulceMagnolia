<?PHP
require "datos/alumnos.php";
foreach ($alumnos as $alumnos) { ?>

    <div class="d-flex container justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-6">
                <img src="img/<?= $alumnos['imagen'] ?>" class="rounded-circle img-fluid shadow-lg my-3" alt="Foto de <?= $alumnos['nombre'] ?>">
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-center">
                <div class="my-3 fs-3 text-black ">
                    <p class="text-deco"><?= $alumnos['nombre'] ?></p>
                    <p><?= $alumnos['edad'] ?></p>
                    <p><?= $alumnos['email'] ?></p>
                    <p><a class="text-decoration-none text-black" href="https://www.instagram.com/lucia_larreta_/">@<?= $alumnos['insta'] ?></a></p>
                </div>
            </div>
        </div>
    </div>
<?PHP } ?>