<?php
include("../../connection.php");
$id = $_POST['id'];

$sql = "SELECT * FROM `herramientas` WHERE `id` = $id ";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
	$row = mysqli_fetch_array($sqlEX);
	$nombre = $row['nombre'];
	$cantidad = $row['cant'];
	$img = $row["url_img"];

	$data = array(
    'nombre' => $nombre,
    'cantidad' => $cantidad,
    'img' => $img
);
	$json = json_encode($data);

	echo $json;
}
?>