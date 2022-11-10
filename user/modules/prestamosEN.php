<?php
include("../../connection.php");
$id_r = $_POST['id'];

$sql = "UPDATE `retiros` SET estado = 0 WHERE id_r = $id_r";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
	$json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;

}

?>