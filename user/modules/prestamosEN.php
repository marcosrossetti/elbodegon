<?php
include("../../connection.php");
$id_r = $_POST['id'];

$sql = "UPDATE `retiros` SET estado = 0 WHERE id_r = $id_r";
$sqlEX = mysqli_query($connection, $sql);


if($sqlEX){


   $sql2 = "SELECT * FROM `rel_rehe` INNER JOIN `retiros` ON `rel_rehe`.`id_retiros` = `retiros`.`id_r` WHERE `rel_rehe`.`id_retiros` = $id_r";
    $sqlEX2 = mysqli_query($connection, $sql2);
    $row = mysqli_fetch_array($sqlEX2);

    foreach($sqlEX2 as $row){
        $cant = $row['cantidad'];
        $id = $row['id_herramientas'];

          $sql3 = "SELECT * FROM `herramientas` WHERE `id_h` = $id";
          $sqlEX3 = mysqli_query($connection,$sql3);
          $row2 = mysqli_fetch_array($sqlEX3);
          $num = $row2['cant'];
          $est = $row2['estado'];
          if ($est == 0) {
            $cant = $cant + $num;
            $sql4 = "UPDATE `herramientas` SET `cant`= $cant ,`estado`='1' WHERE `id_h` = $id";
            $sqlEX4 = mysqli_query($connection, $sql4);
          }else{
            $cant = $cant + $num;
            $sql4 = "UPDATE `herramientas` SET `cant`= $cant WHERE `id_h` = $id";
            $sqlEX4 = mysqli_query($connection, $sql4);
            if($sqlEX4){
                    
            }
          }
        
    }
                    $json = "1";
                    $jsonStr = json_encode($json);
                    echo $jsonStr;
}

?>