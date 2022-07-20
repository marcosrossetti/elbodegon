<?php
include("../connection.php");

$clave = $_POST['password'];


error_reporting(0);

$query = "SELECT * FROM `users` WHERE `dni` = '$clave' OR `password` = '$clave' ";
  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_assoc($result);

  $error ='error';

  if($row['dni'] == $clave || $row['password'] == $clave){

    $_SESSION['dni'] = $row['dni'];
    $_SESSION['nom_ape'] = $row['nom_ape'];
    
    

     $json2 = array();

     $json2[]=array(
      'nom_ape'=>$_SESSION['nom_ape'],
      'dni'=>$_SESSION['dni']
     );

    $json_string2 = json_encode($json2[0]);
    echo $json_string2;

    // header("location: ../user.php");


   

    
  }
  else if($row['dni'] != $clave || $row['password'] != $clave || $clave == ""){
    
    $json3 = array();

     $json3[]=array(
      'error'=>$error
     );

    $json_string3 = json_encode($json3[0]);
    echo $json_string3;
    

  }

 ?>