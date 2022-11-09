<?php 
    require("db.php");

    $dni = $_POST['dniPrestado'];
    $nombreApellido = $_POST['nomyapePrestado'];
    $curso = $_POST['cursoPrestado'];
    $grupo = $_POST['grupo'];
    $idHerramientas = json_decode($_POST['idHerramientas']);
    $numbTotalHerramientas = json_decode($_POST['numbHerramientras']);
    $time = time();
    $fecha = date("d-m-Y (H:i:s)", $time);    

    $sql = "INSERT INTO `retiros`(`id_r`, `dni`, `nom_ape`, `grupo`, `curso`, `estado`, `fecha_ret`, `fecha_dev`) VALUES ('','".$dni."','".$nombreApellido."','".$grupo."','".$curso."','1','".$fecha."','')";
    $sqlEX = mysqli_query($connection, $sql);
    
    if($sqlEX){
        //echo mysql_insert_id($connection);
        //echo "enviado correctamente!";
        $ult_id = mysqli_insert_id($connection);
        foreach ($idHerramientas as $pos => $value) {
           $sql2 = "INSERT INTO `rel_rehe`(`id`, `id_retiros`, `id_herramientas`, `cantidad`) VALUES ('','".$ult_id."','".$value."','".$numbTotalHerramientas[$pos]."')";
           $sqlEX2 = mysqli_query($connection, $sql2);
        }
    
    } else{
        echo "Error de envio!";
    }

    // SELECT * FROM rel_rehe INNER JOIN retiros ON rel_rehe.id_retiros = retiros.id
?>