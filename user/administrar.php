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
            <li class="nav-item" >
                <a class="nav-link active" href="#" >Inventario</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="prestamos.php" >Prestamos</a>
            </li>
        </ul>

        <!-- Page Content-->
        <div class="container vh-100">
            <div class="row">
                <div class="mt-3">
                    <button class="btn btn-dark mx-auto d-block mb-3" data-bs-toggle="modal" data-bs-target="#agregarModal">Agregar Producto <i class="fas fa-plus fa-sm"></i></button>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="item card h-100">

                                <img class="card-img-top img-auto item-image" src="https://d22fxaf9t8d39k.cloudfront.net/374a13364262e0d88d1af22b44e72abfe3f33e6ba02d77ed1464af542bb3b1fe67397.jpeg" alt="..." />
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold item-title">Amon Gus</h5>
                                    <p>Cantidad 9</p>
                                    <a class="btn btn-outline-dark mt-auto item-button addToCart">Editar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="item card h-100">

                                <img class="card-img-top img-auto item-image" src="https://www.discordianos.com/uploads/monthly_2020_10/amongus-impostor.png.c1d0b40abe30fb087a570c84c81740a4.png" alt="..." />
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold item-title">Amogu</h5>
                                    <p>Cantidad 9</p>
                                    <a class="btn btn-outline-dark mt-auto item-button addToCart">Editar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="item card h-100">

                                <img class="card-img-top img-auto item-image" src="https://i0.wp.com/imagenesparapeques.com/wp-content/uploads/2021/01/Imagenes-Among-Us-naranja.png?fit=874%2C960&ssl=1" alt="..." />
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold item-title">A Mongus</h5>
                                    <p>Cantidad 9</p>
                                    <a class="btn btn-outline-dark mt-auto item-button addToCart">Editar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="item card h-100">

                                <img class="card-img-top img-auto item-image" src="http://d3ugyf2ht6aenh.cloudfront.net/stores/001/019/373/products/2145101-2c736d9df6afdea59716286989994643-480-0.jpg" alt="..." />
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold item-title">Excavadora CAT x-674fs</h5>
                                    <p>Cantidad 9</p>
                                    <a class="btn btn-outline-dark mt-auto item-button addToCart">Editar</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        /*
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
                    */
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- START MODAL COMPRA -->
        <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarModalLabel">Gracias por su compra</h5>
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
        
        <?php
        include('modules/footer.php');
        ?>
        
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>