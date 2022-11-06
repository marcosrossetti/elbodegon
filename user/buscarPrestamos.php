<?php 
include("../connection.php");
  $sql = "SELECT * FROM `retiros` WHERE estado = 1";
  $sqlEX = mysqli_query($connection, $sql);
  $row = mysqli_fetch_array($sqlEX);

  foreach($sqlEX as $row){
      $id = $row['id'];
      $dni = $row['dni'];
      $nombre_Ape = $row['nom_ape'];
      $grupo = $row['grupo'];
      //falta curso del alumno en la BD
      $fecha = $row['fecha_ret'];


      echo'
          <tr>
              <th scope="row">'.$id.'</th>
              <td>'.$dni.'</td>
              <td>'.$nombre_Ape.'</td>
              <td>'.$grupo.'</td>
              <td>Lorem Ipsum</td>
              <td><button  type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Examinar</button></td>
              <td>'.$fecha.'</td>
              <td>
              <button type="button" class="btn btn-success">Entrego</button>
              <button type="button" class="btn btn-danger">Mandar Alerta</button>
              </td>
          </tr>
          ';
  }


?>