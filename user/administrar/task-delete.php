<?php

include('database.php');

if(isset($_POST['id'])) {
  //si id contiene algo, bajamos id para procesarlo
  $id = $_POST['id'];
  $query = "DELETE FROM task WHERE id = $id"; 
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed.');
  }
  echo "Task Deleted Successfully";  

}

?>