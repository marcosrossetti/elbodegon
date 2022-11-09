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
                    <th scope="col">Dni</th>
                    <th scope="col">Nombre Apellido</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Año</th>
                    <th scope="col">Ver</th>   
                    <th scope="col">Fecha de Prestamo</th>
                    <th scope="col">Devolucion</th>
                  </tr>
                </thead>

                <tbody>

                  <?php
                  include("../connection.php");

                  $query = "SELECT * FROM `retiros`";
                  $queryEX = mysqli_query($connection, $query);
                  $fila = mysqli_fetch_array($queryEX);
                  foreach($queryEX as $fila){
                  $id = $fila['id_r']; 
                  $dni = $fila['dni'];
                  $nomApe = $fila['nom_ape'];
                  $grupo = $fila['grupo'];
                  $año = $fila['curso'];
                  $fechaR = $fila['fecha_ret'];

                  echo '
                  <tr>
                    <td scope="col">'.$dni.'</td>
                    <td scope="col">'.$nomApe.'</td>
                    <td scope="col">'.$grupo.'</td>
                    <td scope="col">'.$año.'</td>
                    <td scope="col"> <button  type="button" class="btn btn-dark" data-bs-toggle="modal" data-id="'.$id.'" id="examinar">Examinar</button> </td>   
                    <td scope="col">'.$fechaR.'</td>
                    <td scope="col"> <button type="button" class="btn btn-success">Entrego</button> </td>
                  </tr>
                  ';


                  
              }
                  ?>

                  
                </tbody>
              </table>
         

      </div>

      <div class="modal fade" id="modalExaminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Examinar Herramientas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                          <div id="divInfo"></div>
                        
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).on('click','#examinar',function (){
        console.log("jquery is working!");
        let id = $(this).data('id');
        console.log(id);

            const url = "modules/prestamoEX.php";

        const postData = {
            id : id
        };

        $.ajax({
             type: "POST",
             url: "modules/prestamoEX.php",
             data: {id:id},
             success: function(response) { 
            console.log(response);
            const rta = JSON.parse(response);

            
            let template = '';

                  
                   $.each(rta, function(i, item){
              // console.log(rta[i].nombreH); 
              const n = [ rta[i].nombreH ];
              const im = [ rta[i].url_img ];
              const c = [ rta[i].cantidad ];
              console.log(n);
              console.log(im);
              console.log(c);   

              template += `
                      <div class="col">
                                <div class="card">
                                  <img src="${im}" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h5 class="card-title">${n}</h5>
                                    <p class="card-text">${c}</p>
                                  </div>
                                </div>
                              </div>
                    `
                  }); 
        
        

              $("#modalExaminar").modal("show"); 
              $("#divInfo").html(template);

            

                 
            }});

            
        

        

        //    }
        //   });

                // let template = `
                
                // `;        
              
}); 

    </script>

  </body>
</html>