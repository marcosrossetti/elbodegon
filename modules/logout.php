<?php

//modulo de conexxion
include("../connection.php");

//continuamos la sesion
session_start();


//destruimos la sesion
session_destroy();


 ?>

<!--redirigimos al usuario al index.html -->
 <script type="text/javascript"> 
 	function back(){
 		window.location = "../index.php";
 	}
    
    back();
 </script>