<?php
include("../../connection.php");
$id = $_POST['id'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$imagen = $_POST['imagen'];

$sql = "UPDATE `herramientas` SET `nombre`='".$producto."',`cant`='".$cantidad."', `url_img`='".$imagen."' WHERE `id` = '".$id."' ";
$sqlEX = mysqli_query($connection, $sql);
if($sqlEX){
	$json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;

}

?>