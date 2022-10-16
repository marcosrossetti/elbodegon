<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>El Pozo</title>
  </head>

  <body>
    <style>
      img {
        width: 110px;
        height: 150px;
      };
    </style>

    <?php
    include('modules/header.php');
    ?>

    <div class="text-center vh-100">
        <ul class="nav nav-tabs bg-light pt-2">
            <li class="nav-item">
                <a class="nav-link" href="prestarHerramientas.php">Prestar</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#">Devolución</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="administrar.php">Administrar</a>
            </li>
        </ul>
       
            <table class="table table-striped ">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Nombre Apellido</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Año</th>
                    <th scope="col">Herramienta/s</th>    
                    <th scope="col">Retirado</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>44935241</td>
                    <td>Tomas Alcuri</td>
                    <td>710</td>
                    <td>7mo</td>
                    <td><button  type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Examinar</button></td>
                    <td>27/06/2022</td>
                    <td>
                      <button type="button" class="btn btn-success">Entrego</button>
                      <button type="button" class="btn btn-danger">Mandar Alerta</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>  </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>  
                </tbody>
              </table>
         

      </div>

      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <div class="col">
            <div class="card">
              <img src="img/pinza.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Pinza</h5>
                <p class="card-text">Cantidad : 2</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="img/destornillador.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Destornillador</h5>
                <p class="card-text">Cantidad : 1</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="img/pala.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Pala</h5>
                <p class="card-text">Cantidad : 1</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="img/Sierra.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Sierra</h5>
                <p class="card-text">Cantidad : 4</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <?php
        include('modules/footer.php');
    ?>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>