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
        <link rel="stylesheet" href="css/prestarHerramientas.css">
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
                            <div class="card h-100">

                                <a href="#"><img class="card-img-top img-auto" src="'.$url_img.'" alt="..." /></a>
                                <div class="card-body text-center">

                                    <h5 class="card-title fw-bold">'.$nombre.'</h5>

                                    <p>Cantidad '.$cantidad.'</p>
                                    <a class="btn btn-outline-dark mt-auto" id="agregarBtn" data-nombre="'.$nombre.'" data-id="'.$id.'">Agregar</a>
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

                       <div id="contCont">
                           
                       </div>
                        
                        

                    </ul>
                    <button class="btn btn-success w-100">Enviar</button>
                </div>
            </div>
        </div>
        <footer class="py-5 bg-black">
            <div class="container">
                <p class="m-0 text-center text-white small">Prestado de herramientas &copy; 2022</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <script>
            var contenidos = [];
            var ids = [];
            var cant = [];

             $(document).on('click', '#agregarBtn',function () {


                 let nombre = $(this).data('nombre');
                let id = $(this).data('id');
                console.log(id , nombre);

                if(ids.length == 0){
                    addCart();
                }

                for(let i = 0; i < ids.length; i++){


                    if(ids[i] == id){
                        console.log("break");
                        break;
                    }else{
                        if(i == ids.length-1){
                            addCart();

                        }
                    }
                }



                
                



                // $('#formadorForm').submit(e => {
                //     e.preventDefault();
                //     //creacion de objeto de almacenamiento de los inputs "postData"
                //     const postData = {
                //     //guardamos los input dentro de un objeto
                //     nuevoFor : $("#nuevoFor").val(),
                //     id : $("#idFormador").val()
                //     };
                //     //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                //     const url = "modulos/modCursos/editarFor.php";
                //     //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                //     console.log(postData, url);
                //     //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                //     //procesamiento de dichos datos)
                //     $.post(url, postData, (response) => {

                //     const rta = JSON.parse(response);
                //     console.log(rta);
                //     if(rta == 1){
                //         window.location = "administrarCursos.php";
                //     }
                    
                //     });
                // });


                function addCart(){
                    ids.push(id);
                    cant.push();



                            let contenido = `
                            <div class="producto${id}">
                <div class="row g-0">
                            <li class="list-group-item">${nombre}</li>
                        </div>

                <div class="row g-0 mb-3">
                            <div class="btn-group btn-group-sm" role="group" aria-label="btnCantidad"> <!-- col-3 -->
                                <button id="menos" type="button" onclick="$('.cantidad${id}').html() <= 1 ? 1 : $('.cantidad${id}').html(parseInt($('.cantidad${id}').html()) - 1);" class="btn btn-dark"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-dark cantidad${id}" id="cantidadP" value="5">1</button>
                                <button type="button" id="mas" tas="${id}" onclick="$('.cantidad${id}').html(parseInt($('.cantidad${id}').html()) + 1);" class="btn btn-dark"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-danger" onclick="eliminarElemento(${id})"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        </div>

                `;

                
                contenidos.push(contenido);
                $("#contCont").html(contenidos);

                $(document).on('click', '#mas',function () {
                let cantidadP = $("#cantidadP", this).text();
                console.log(cantidadP);
                

             });

                $(document).on('click', '#menos',function () {
                let cantidadP = $("#cantidadP").text();
                console.log(cantidadP);
                

             });
                
                

                }


            });

             function eliminarElemento(idE){
                
                $('.producto' + idE).remove();
                let i = 0;
                ids.forEach(id => {
                    if(id == idE){
                        ids.splice(i,1);
                        contenidos.splice(i,1);


                    }

                    i++;
                });

                console.log(idE);







             }





             // $(document).on('click', '#',function () {

             // });

        </script>
    </body>
</html>