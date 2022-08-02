<?php

include('database.php');

if(isset($_POST['id'])) {

  $id = $_POST['id'];

  // echo "su id es: " .$id;
  // $id = mysqli_real_escape_string($connection, $_POST['id']);

  $query = "SELECT * FROM herramientas WHERE id = {$id}";

  $result = mysqli_query($connection, $query);

  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  else{


  $json = array();


  while($row = mysqli_fetch_array($result)) {
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

  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}

  
}

?>