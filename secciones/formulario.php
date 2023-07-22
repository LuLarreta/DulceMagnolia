<section id="contacto" class="bg-light shadow p-5 container">
    <div class="container-fluid ">
        <h2 class="text-center p-2 m-3">Contactanos</h2>
        <form action="datos/datos_formulario.php" method="GET">
            <div class="row bg-texto justify-content-around p-3 shadow">

                <div class="col-12 col-lg-5">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre" aria-describedby="a-nombre">
                    <p class="form-text" id="a-nombre">No ingrese caracteres especiales</p>
                </div>

                <div class="col-12 col-lg-5">
                    <label class="form-label" for="apellido">Apellido</label>
                    <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese su Apellido" aria-describedby="a-apellido">
                    <p class="form-text" id="a-apellido">No ingrese caracteres especiales</p>
                </div>

                <div class="col-12 col-lg-5">
                    <label class="form-label" for="telefono">Telefono</label>
                    <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Ingrese su Numero de Telefono" aria-describedby="a-telefono">
                    <p class="form-text" id="a-telefono">Ingrese solo números</p>
                </div>

                <div class="col-12 col-lg-5">
                    <label class="form-label" for="ciudad">Ciudad de Residecia</label>
                    <input class="form-control" type="text" name="ciudad" id="ciudad" placeholder="Ingrese su Ciudad de Residecia" aria-describedby="a-ciudad">
                    <p class="form-text" id="a-ciudad">Ingrese solo la ciudad en donde vive</p>
                </div>

                <div class="col-12 col-lg-6">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Ingrese su Email" aria-describedby="a-email">
                    <p class="form-text" id="a-email">Ingrese su email sin mayusculas</p>
                </div>

                <div class="col-10">
                    <label for="consulta" class="form-label">Ingrese su Consulta</label>
                    <textarea class="form-control" id="consulta" name="consulta" rows="3"></textarea>
                </div>

                <div class="form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="check" name="check">
                    <label for="check" class="form-check-label">Desea recibir todas las novedades de Dulce
                        Magnolia</label>
                </div>

                <div class="d-flex justify-content-center">
                    <input type="submit" value="Enviar" class="btn text-dark bg-light bg-gradient btn-primary">
                </div>

            </div>
        </form>
    </div>
</section>