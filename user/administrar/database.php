<?php

$connection = mysqli_connect(
  'localhost', 'root', '', 'pozo'
);

// for testing connection
if($connection) {
 echo 'database is connected';
}

?>