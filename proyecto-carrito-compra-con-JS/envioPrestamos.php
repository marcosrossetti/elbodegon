<?php 
    require("db.php");
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $dni = $_POST['dniPrestado'];
    $nombreApellido = $_POST['nomyapePrestado'];
    $curso = $_POST['cursoPrestado'];
    $grupo = $_POST['grupo'];
    $idHerramientas = json_decode($_POST['idHerramientas']);
    $numbTotalHerramientas = json_decode($_POST['numbHerramientras']);    
    $fecha = date('Y-m-d');
    echo $fecha;

    $sql = "INSERT INTO `retiros`(`id_r`, `dni`, `nom_ape`, `grupo`, `curso`, `estado`, `fecha_ret`, `fecha_dev`) VALUES ('','".$dni."','".$nombreApellido."','".$grupo."','".$curso."','1','".$fecha."','')";
    $sqlEX = mysqli_query($connection, $sql);
    
    if($sqlEX){
        //echo mysql_insert_id($connection);
        //echo "enviado correctamente!";
        $ult_id = mysqli_insert_id($connection);
        foreach ($idHerramientas as $pos => $value) {
            $sql2 = "INSERT INTO `rel_rehe`(`id`, `id_retiros`, `id_herramientas`, `cantidad`) VALUES ('','".$ult_id."','".$value."','".$numbTotalHerramientas[$pos]."')";
            $sqlEX2 = mysqli_query($connection, $sql2);

            $sql3 = "SELECT `cant` FROM `herramientas` WHERE `id_h` = $value";
            $sqlEX3 = mysqli_query($connection,$sql3);
            $row = mysqli_fetch_array($sqlEX3);
            
            $cantidad = $row['cant'];
            $cantidad = $cantidad - $numbTotalHerramientas[$pos];
            if($cantidad == 0){
                $sql6 = "UPDATE `herramientas` SET `cant`=$cantidad ,`estado`='0' WHERE `id_h` = $value";
                $sqlEX6 = mysqli_query($connection, $sql6);
                if($sqlEX6){
                    echo "Envio actualizado!";
                }
            } else {
                $sql4 = "UPDATE `herramientas` SET `cant`= $cantidad WHERE `id_h` = $value";
                $sqlEX4 = mysqli_query($connection, $sql4);
                if($sqlEX4){
                    echo "Envio actualizado!";
                }
        }
    
    } else{
        echo "Error de envio!";
    }

    // SELECT * FROM rel_rehe INNER JOIN retiros ON rel_rehe.id_retiros = retiros.id
?>