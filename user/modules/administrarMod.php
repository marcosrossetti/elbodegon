<?php
include("../../connection.php");
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$imagen = $_POST["imagen"];


$sql = "INSERT INTO `herramientas`(`nombre`, `cant`,`url_img`) VALUES ('".$producto."','".$cantidad."','".$imagen."')";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
	$json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;

}

?>