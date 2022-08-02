<?php

  include('database.php');

  $query = "SELECT * from herramientas";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }
//para empaquetar los datos a enviar utilizamos json array
  $json = array();
  //Iteramos los resultados de la consulta y los guardamos en un array de json
  while($row = mysqli_fetch_array($result)) {
    //definicion y guardado de datos en un arreglo de json
    $json[] = array(
      'id' => $row['id'],
      'name' => $row['nombre'],
      'description' => $row['descripcion'],
      'cant' => $row['cant'],
      'estado' => $row['estado'],
      'foto' => $row['foto'],
      'devolucion' =>$row['devolucion'],
      'id_cat' => $row['id_cat']
      
    );
  }
  //compimimos el array para devolverlo en ajax
  echo json_encode($json);
  
?>