<?php

include('database.php');

$search = $_POST['search'];
if(!empty($search)) {
  $query = "SELECT * FROM herramientas WHERE nombre LIKE '$search%'";
  $result = mysqli_query($connection, $query);
  
  if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'id' => $row['id'],
      'name' => $row['nombre'],
      'description' => $row['descripcion']
      
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
}

?>