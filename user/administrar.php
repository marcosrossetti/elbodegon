<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <title>Deposito Digital</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/prestarHerramientas.css">
    </head>
    <body>
        <!-- Navbar -->
        <?php
        include('modules/header.php');
        ?>
    

        <ul class="nav nav-tabs bg-light pt-2">
            <li class="nav-item">
                <a class="nav-link" href="prestarHerramientas.php">Prestar</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="prestamos.php" >Devolución</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#">Administrar</a>
            </li>
        </ul>

        <!-- Page Content-->
        <div class="container vh-100">
            <div class="row">
                <div class="mt-3">
                    <button class="btn btn-dark mx-auto d-block mb-3" data-bs-toggle="modal" data-bs-target="#agregarModal" id="buttonModal">Agregar Herramienta <i class="fas fa-plus fa-sm"></i></button>
                    <div class="row">
                        <?php
                            include("db.php");

                            $query = "SELECT * FROM `herramientas` WHERE `estado` = 1";
                            $result = mysqli_query($connection,$query);
                            $row = mysqli_fetch_array($result);

                            foreach($result as $row) {
                                $nombre = $row['nombre'];
                                $cantidad = $row['cant'];
                                $url_img = $row['url_img'];
                                $id = $row['id_h'];

                                echo'
                                    <div class="col-lg-3 col-md-6 mb-4">
                                        <div class="item card h-100">
            
                                            <img class="card-img-top img-auto item-image" src="'.$url_img.'" alt="'.$url_img.'" />
                                            <div class="card-body text-center">
                                                <h5 class="card-title fw-bold item-title">'.$nombre.'</h5>
                                                <p>Cantidad '.$cantidad.'</p>
                                                
                                                <button class="btn btn-outline-dark mt-auto item-button" data-id="'.$id.'" id="editar">Editar</button>

                                                <button class="btn btn-outline-danger mt-auto item-button" data-id="'.$id.'" id="eliminar">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal agregar -->
        <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarModalLabel">Agregar Herramienta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="agregarModal">
                            <label for="nombreProducto" class="form-label">Nombre</label>
                            <input type="text" class="form-control mb-3" id="producto" required>
                            <label for="cantidadProducto" class="form-label">Cantidad</label>
                            <input type="number" class="form-control mb-3" min="1" id="cantidad" required>
                            <label for="imagenProducto" class="form-label">Imagen (opcional)</label>
                            <input type="text" class="form-control mb-3" id="imagen">

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" id="submit" class="btn btn-primary">Enviar</button>
                        
                    </div>
                            </form>
                        </div>

                        
                </div>
            </div>
        </div>
        <!-- /Modal agregar -->
        <?php
        include('modules/footer.php');
        ?>
        
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript" src="../js/app1.js"></script>
    </body>
</html>