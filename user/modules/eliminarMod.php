<?php
include("../../connection.php");
$id = $_POST['id'];
$sql = "UPDATE `herramientas` SET estado = 0 WHERE id_h = $id";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
	$json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
?>