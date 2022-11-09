<?php
include("../../connection.php");
$id_r = $_POST['id'];
$listado = [];


$sql = "SELECT * FROM `rel_rehe` INNER JOIN `retiros` ON `rel_rehe`.`id_retiros` = `retiros`.`id_r` INNER JOIN `herramientas` ON `rel_rehe`.`id_herramientas` = `herramientas`.`id_h` WHERE `rel_rehe`.`id_retiros`= $id_r;";

$sqlEX = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($sqlEX);
$i = 0;

foreach($sqlEX as $row){
  $i += 1;



$nombreH = $row['nombre'];
$cantidad = $row['cantidad'];
$url_img = $row['url_img'];

$listado[] = array(
    'nombreH' => $nombreH,
    'cantidad' => $cantidad,
    'url_img' => $url_img
);
}

if($i != null){
    $json = json_encode($listado[$i]);
    echo $json;
}





 ?>