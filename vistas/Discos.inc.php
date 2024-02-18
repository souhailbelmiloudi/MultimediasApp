<div class="container">
    <h1>Discos</h1>

    <div class="card bg-light mb-3">
        <div class="card-body">
            <h4 class="card-title">Buscador</h4>
            <!--Error-->
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>
            <form id="peli-form" method="POST" action="disco" class="form-inline">
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
    <!-- Tabla de discos -->
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Grupo Musical</th>
                        <th>Año</th>
                        <th>Publicación</th>
                        <th>Duración</th>
                        <th>ISWC</th>
                        <th>Género</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaDiscos as $value) : ?>
                        <tr>
                            <td><?php echo $value->getId() ?></td>
                            <td><?php echo $value->getTitulo() ?></td>
                            <td><?php echo $value->getGrupo_musico() ?></td>
                            <td><?php echo $value->getAnio() ?></td>
                            <td><?php echo $value->getPublicacion() ?></td>
                            <td><?php echo $value->getduracion_minutos() ?> min</td>
                            <td><?php echo $value->getIdentificador() ?></td>
                            <td><?php echo $value->getGenero() ?></td>
                            <td>
                                <!-- <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=editar&tipo=Disco&id=<?php echo $value->getId() ?>" class="btn btn-warning">Editar</a>
                                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=borrar&tipo=Disco&id=<?php echo $value->getId() ?>" class="btn btn-danger">Borrar</a> -->
                                <a href="editar/Disco/<?php echo $value->getId() ?>" class="btn btn-warning">Editar</a>
                                <a href="borrar/Disco/<?php echo $value->getId() ?>" class="btn btn-danger">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
