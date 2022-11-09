<?php
include("../../connection.php");
$id = $_POST['id'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];

$sql = "UPDATE `herramientas` SET `nombre`='".$producto."',`cant`='".$cantidad."' WHERE `id_h` = '".$id."' ";
$sqlEX = mysqli_query($connection, $sql);
if($sqlEX){
	$json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;

}

?>