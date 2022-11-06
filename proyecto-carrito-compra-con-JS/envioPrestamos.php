<?php 
    require("db.php");

    $dni = $_POST['dniPrestado'];
    $nombreApellido = $_POST['nomyapePrestado'];
    $curso = $_POST['cursoPrestado'];
    $grupo = $_POST['grupoPrestado'];
    $idHerramientas = $_POST['idHerramientas'];
    $numbTotalHerramientas = $_POST['numbHerramientras'];
    $time = time();
    $fecha = date("d-m-Y (H:i:s)", $time);

    

    $sql = "INSERT INTO retiros(`id`, `dni`, `nom_ape`, `grupo`, `curso`, `id_herramienta`, `tipo`, `cant_ret`, `estado`, `fecha_ret`, `fecha_dev`) VALUES ('','".$dni."','".$nombreApellido."','".$grupo."','".$curso."','".$idHerramientas."','','".$numbTotalHerramientas."','1','".$fecha."','')";
    $sqlEX = mysqli_query($connection, $sql);

    if($sqlEX){
        echo "enviado correctamente!";
    
    } else{
        echo "Error de envio!";

    }
?>