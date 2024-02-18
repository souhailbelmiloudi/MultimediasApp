<div class="container">
    <h1>Libros</h1>

    <div class="card bg-light mb-3">
        <div class="card-body">
            <h4 class="card-title">Buscador</h4>
             <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>
            <form id="libro" class="form-inline" method="POST" action="libro">
               <div class="input-group mb-3">
            <input type="text" name="id" placeholder="ID" class="form-control">
                    <div class="input-group-append">
                        <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Botón de inserción -->
    <div class="row">
        <div class="col-sm-12 mb-3">
            <a href="insertar" class="btn btn-success mb-3">Insertar</a>
        </div>
    </div>
    <!-- Tabla de libros -->
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Género</th>
                        <th>Año</th>
                        <th>Publicación</th>
                        <th>Extensión</th>
                        <th>ISBN</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaLibros as $libro) : ?>
                        <tr>
                            <td><?php echo $libro->getId(); ?></td>
                            <td><?php echo $libro->getTitulo(); ?></td>
                            <td><?php echo $libro->getAutor(); ?></td>
                            <td><?php echo $libro->getGenero(); ?></td>
                            <td><?php echo $libro->getAnio(); ?></td>
                            <td><?php echo $libro->getPublicacion(); ?></td>
                            <td><?php echo $libro->getExtension(); ?></td>
                            <td><?php echo $libro->getIdentificador(); ?></td>
                  
                            <td>
                                <!-- <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=editar&tipo=Libro&id=<?php echo $libro->getId() ?>" class="btn btn-warning">Editar</a>
                                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=borrar&tipo=Libro&id=<?php echo $libro->getId() ?>" class="btn btn-danger">Borrar</a> -->
                                      <a href="editar/Libro/<?php echo $libro->getId() ?>" class="btn btn-warning">Editar</a>
                                      <a href="borrar/Libro/<?php echo $libro->getId() ?>" class="btn btn-danger">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
