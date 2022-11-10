<?php
include("../../connection.php");
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$imagen = $_POST["imagen"];

//falta implementar las categorias...?
$sql = "INSERT INTO `herramientas`(`nombre`, `cant`,`estado`,`url_img`) VALUES ('".$producto."','".$cantidad."','1','".$imagen."')";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
	$json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;

}

?>