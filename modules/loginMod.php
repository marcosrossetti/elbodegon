<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
  
</body>
</html>

<?php
include("../connection.php");
session_start();

$clave = $_POST['password'];


error_reporting(0);

$query = "SELECT * FROM `users` WHERE `dni` = '$clave' OR `password` = '$clave' ";
  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_assoc($result);

  $error ='error';

  if($row['dni'] == $clave || $row['password'] == $clave){

    $_SESSION['dni'] = $row['dni'];
    $_SESSION['nom_ape'] = $row['nom_ape'];
    
    

     

    header("location: ../user/index.php");


   

    
  }
  else if($row['dni'] != $clave || $row['password'] != $clave || $clave == ""){
    
    echo' <script> swal({
      title: "Credenciales incorrectas",
      text: "",
      icon: "error"
  }).then(function() {
      window.location = "../index.php";
  }); </script>';
    

  }

 ?>