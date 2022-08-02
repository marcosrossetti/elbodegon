<?php

  include('database.php');

if(isset($_POST['id'])) {
  $task_name = $_POST['name']; 
  $task_description = $_POST['description'];
  $id = $_POST['id'];
  $task_cant = $_POST['cant'];
  $task_estado = $_POST['estado'];
  $task_foto = $_POST['foto'];
  $task_devolucion = $_POST['devolucion'];
  $task_id_cat = $_POST['id_cat'];
  $query = "UPDATE herraminetas SET nombre = '$task_name', descripcion = '$task_description', cant = 'task_cant', estado = 'task_estado', foto = 'task_foto', id_cat = 'task_id_cat' WHERE id = '$id'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }
  echo "Task Update Successfully";  

}

?>