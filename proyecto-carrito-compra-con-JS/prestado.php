<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <title>Deposito Digital</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/prestarHerramientas.css">
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand text-white" href="index.php">El Bodegon</a>
            </div>
        </nav>

        <ul class="nav nav-tabs bg-light pt-2">
            <li class="nav-item">
                <a class="nav-link " aria-current="true" href="index.php" >Inicio</a>
            </li>

            <li class="nav-item" >
                <a class="nav-link active" href="#" >Inventario</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="prestamos.php" >Prestamos</a>
            </li>
        </ul>

        <!-- Page Content-->
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mt-5">
                    <div class="row">
                        
                        <?php
                        include("db.php");
                        $sql = "SELECT * FROM `herramientas` WHERE 1";
                        $sqlEX = mysqli_query($connection,$sql);
                        $row = mysqli_fetch_array($sqlEX);

                        foreach($sqlEX as $row){
                            $nombre = $row['nombre'];
                            $cantidad = $row['cant'];
                            $url_img = $row['url_img'];
                            $id = $row['id'];



                        echo '
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="item card h-100">

                                <img class="card-img-top img-auto item-image" src="'.$url_img.'" alt="..." />
                                <div class="card-body text-center">

                                    <h5 class="card-title fw-bold item-title">'.$nombre.'</h5>

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
                    <button class="btn btn-success w-100 comprarButton" type="button" data-bs-toggle="modal" data-bs-target="#comprarModal">Enviar</button>
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
                        <h5 class="modal-title" id="comprarModalLabel">Gracias por su compra</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Pronto recibirá su pedido</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL COMPRA -->

        <footer class="py-5 bg-black">
            <div class="container">
                <p class="m-0 text-center text-white small">Prestado de herramientas &copy; 2022</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <script src="./tienda.js"></script>

    </body>
</html>