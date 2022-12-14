<?php
   
  include('../../config/config.php');
  session_start();

  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){

    header('location: ../../index.php');
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <?php include('../../menu.php')?>
  <div class="container">
        <h1 class="text-center mt-5">Administrador estudiantes opcion de grado. </h1>
  </div>

  </body>
</html>
