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
                <a class="nav-link active" href="#">Prestar</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="prestamos.php">Devolución</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="administrar.php">Administrar</a>
            </li>
        </ul>

        <!-- Page Content-->
        <div class="container vh-100">
            <div class="row">
                <div class="col-lg-9 mt-5">
                    <div class="row">
                        
                        <?php
                        include("db.php");
                        $sql = "SELECT * FROM `herramientas` WHERE `estado` = 1";
                        $sqlEX = mysqli_query($connection,$sql);
                        $row = mysqli_fetch_array($sqlEX);

                        foreach($sqlEX as $row){
                            $nombre = $row['nombre'];
                            $cantidad = $row['cant'];
                            $url_img = $row['url_img'];
                            $id = $row['id_h'];



                        echo '
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="item card h-100">

                                <img class="card-img-top img-auto item-image" src="'.$url_img.'" alt="..." />
                                <div class="card-body text-center">

                                    <h5 class="card-title fw-bold item-title" id="'.$id.'">'.$nombre.'</h5>

                                    <p>Cantidad '.$cantidad.'</p>
                                    <a class="btn btn-outline-dark mt-auto item-button addToCart">Agregar</a>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                        ?>

                    </div>
                </div>

                <div class="col-lg-3">
                    <h1 class="my-4 text-center">Seleccionado</h1>
                    <ul class="list-group">
                        <!--<a class="list-group-item" href="#">Ver todos los productos</a>-->
                        <!--<a class="list-group-item" href="#">Retirar productos</a>-->

                        <div class="shopping-cart-items shoppingCartItemsContainer">
                        </div>
                        
                        

                    </ul>
                    <div class="shopping-cart-total">
                        <label>Total: </label> <label class="shoppingCartTotal">0</label>
                    </div>
                    <button class="btn btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#comprarModal">Enviar</button>
                    <div class="toast position-fixed bottom-0 end-0 p-3 bg-white" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 11">
                        <div class="toast-header">
                            <strong class="me-auto text-secondary">Elemento en el carrito</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Se aumentó correctamente la cantidad
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- START MODAL COMPRA -->
        <div class="modal fade" id="comprarModal" tabindex="-1" aria-labelledby="comprarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="comprarModalLabel">Completar Formulario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="datosAlumnos" method="post">
                        <label for="dniPrestado" class="form-label">DNI</label>
                        <input type="number" class="form-control mb-3" min="10000000" name="dniPrestado" id="dniPrestado" required>
                        <label for="nomyapePrestado" class="form-label">Nombre y Apellido</label>
                        <input type="text" class="form-control mb-3" name="nomyapePrestado" id="nomyapePrestado" required>
                        <label for="cursoPrestado" class="form-label">Curso</label>
                        <input type="text" class="form-control mb-3" name="cursoPrestado" id="cursoPrestado" placeholder="Ej: 4C" required>
                        <label for="grupoPrestado" class="form-label">Grupo</label>
                        <input type="text" class="form-control mb-3" name="grupoPrestado" id="grupoPrestado" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary comprarButton" id="guardar">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL COMPRA -->
        
        <?php
        include('modules/footer.php');
        ?>
        
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script src="../proyecto-carrito-compra-con-JS/tienda.js"></script>

    </body>
</html>