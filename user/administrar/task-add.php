<?php

  include('database.php');

if(isset($_POST['name'])) {
  # echo $_POST['name'] . ', ' . $_POST['description'];
  $task_name = $_POST['name'];
  $task_description = $_POST['description'];
  $task_cant = $_POST['cant'];
  $task_estado = $_POST['estado'];
  $task_foto = $_POST['foto'];
  $task_devolucion = $_POST['devolucion'];
  $task_id_cat = $_POST['id_cat'];

  $query = "INSERT INTO herramientas(nombre, descripcion, cant, estado, foto, devolucion, id_cat) VALUES ('$task_name', '$task_description','$task_cant','$task_estado','$task_foto','$task_devolucion','$task_id_cat')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('  Query Failed.');
  }

  echo "Task Added Successfully";  

}

?>