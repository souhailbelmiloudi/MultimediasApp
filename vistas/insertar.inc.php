<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1 class="text-center mb-4">Formulario Multimedia</h1>
            <?php if (!empty($errores)) : ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errores as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="POST" action="" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <select class="form-select" id="tipo" name="tipo">
                        <option selected disabled>Selecciona un tipo</option>
                        <option value="libro">Libro</option>
                        <option value="pelicula">Película</option>
                        <option value="disco">Disco</option>
                    </select>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control " id="titulo" name="titulo" required>
                    </div>
                    <div class="col">
                        <label for="anio" class="form-label">Año:</label>
                        <input type="number" class="form-control" id="anio" name="anio" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <label for="publicacion" class="form-label">Publicación:</label>
                        <input type="date" class="form-control" id="publicacion" name="publicacion" required>
                    </div>
                    <div class="col">
                        <label for="genero" class="form-label">Género:</label>
                        <input type="text" class="form-control" id="genero" name="genero" required>
                    </div>
                </div>
                <!-- conetnedor atributos de libro -->

                <div class="mb-3 row"  style="display: none;" id="libro">
                    <h5 class="text-primary">libro</h5>
                    <div class="col">
                        <label for="extension" class="form-label">Extension:</label>
                        <input type="number" class="form-control" id="extension" name="extension" required>
                    </div>
                    <div class="col">
                        <label for="Autor" class="form-label">Autor:</label>
                        <input type="text" class="form-control" id="autor" name="autor" required>
                    </div>
                </div>
                <!-- conetnedor atributos de pelicula -->
                <div class="mb-3 row"  style="display: none;"  id="pelicula">
                    <h5 class="text-primary">Peliculas</h5>
                    <div class="col">
                        <label for="director" class="form-label">Director:</label>
                        <input type="text" class="form-control" id="director" name="director" required>
                    </div>
                    <div class="col">
                        <label for="actores" class="form-label">Actores:</label>
                        <input type="text" class="form-control" id="actores" name="actores" required>
                    </div>
                    <div class="col">
                        <label for="duracion_minutos_pelicula" class="form-label">Duracion :</label>
                        <input type="number" class="form-control" id="duracion_minutos_pelicula" name="duracion_minutos_pelicula" required>
                    </div>
                </div>
                <!-- conetnedor atributos de disco -->
                 <div class="mb-3 row"  id="disco" style="display: none;">
                    <h5 class="text-primary">Disco</h5>
                    <div class="col">
                        <label for="grupo_musico" class="form-label">Grupo Musico:</label>
                        <input type="text" class="form-control" id="grupo_musico" name="grupo_musico" required>
                    </div>
                    <div class="col">
                        <label for="duracion_minutos_disco" class="form-label">Duracion :</label>
                        <input type="number" class="form-control" id="duracion_minutos_disco" name="duracion_minutos_disco" required>
                    </div>
                </div>
                <div class="mb-3" >
                    <label for="identificador" class="form-label">Identificador:</label>
                    <input type="text" class="form-control" id="identificador" name="identificador" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="insertar">Insertar</button>
                </div>
            </form>
        </div>
    </div>
</div>

