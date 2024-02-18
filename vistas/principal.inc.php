<div class="container-fluid mt-3">
 <!-- start tabla libros -->
  <div class="row bg-light">
    <div class="col-sm-4 justify-content-center">
      <h1>Libros</h1>
      <table class="table">
          <tr>
            <th>Titulo</th>
            <th>Genero</th>
          </tr>
          <?php foreach ($listaLibros as  $libro) : ?>
          <tr>
            <td><?php echo $libro->getTitulo() ?></td>
            <td><?php echo $libro->getGenero() ?></td>
          </tr>
          <?php endforeach; ?>
          
      </table>

         <a href="libro" class="btn btn-info">Ver Todos</a>
    </div>
    <!-- end tabla libros -->

    <!-- start tabla peliculas -->

    <div class="col-sm-4">
      <h1>Peliculas</h1>
       <table class="table">
          <tr>
            <th>Titulo</th>
            <th>Genero</th>
          </tr>
          <?php foreach ($listaPeliculas as  $pelicula) : ?>
          <tr>
            <td><?php echo $pelicula->getTitulo() ?></td>
            <td><?php echo $pelicula->getGenero() ?></td>
            
          </tr>
          <?php endforeach; ?>

          
      </table>

         <a href="pelicula" class="btn btn-info">Ver Todos</a>
    </div>
    <!-- end tabla peliculas -->

    <!-- start tabla discos -->
    <div class="col-sm-4">
      <h1>Discos</h1>

       <table class="table">
          <tr>
            <th>Titulo</th>
            <th>Genero</th>
          </tr>
          <?php foreach ($listaDiscos as  $disco) : ?>
          <tr>
            <td><?php echo $disco->getTitulo() ?></td>
            <td><?php echo $disco->getGenero() ?></td>

          </tr>
          <?php endforeach; ?> 
      </table>

         <a href="disco" class="btn btn-info">Ver Todos</a>
    </div>
  </div>
    <!-- end tabla discos -->
 </div>