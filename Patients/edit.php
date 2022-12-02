<?php
     include('../config/config.php');
     include('Patient.php');
     $p = new Patient();
     $data = mysqli_fetch_object($p->getOne($_GET['id']));
     $date = new Datetime($data->sessionDate);

     if (isset($_POST) && !empty($_POST)){
        $_POST['image'] = $data->image;
        if($_FILES['image']['name'] !==''){
            $_POST['image'] = saveImage($_FILES);
        }
        $update = $p->update($_POST);
        if($update){
            $error = '<div class="alert alert-success" role="alert"> Paciente modificado correctamente</div>';
        }else{
            $error = '<div class="alert alert-danger" role="alert"> Error al modificar</div>';
        }
     }

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Modificar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
    <?php include('../menu.php') ?>
    <div class="container">
    <?php
        if(isset($error)){
            echo $error;
        }
        ?>
        <h2 class="text-center mb-5">Modificar datos alumno</h2>
        <form method="POST" enctype="multipart/form-data">
          <div class="row mb-2">
            <div class="col">
                <input type="text" name="firstName" id="firstName" placeholder="Nombre estudiante" require class="form-control" value="<?= $data->firstName ?>"/>
                <input type="hidden" name="id" id="id" value="<?= $data->id ?>">
            </div>
            <div class="col">
                <input type="text" name="lastName" id="lastName" placeholder="Apellido estudiante" require class="form-control" value="<?= $data->lastName ?>"/>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col">
                <input type="email" name="email" id="email" placeholder="Email estudiante" require class="form-control" value="<?= $data->email ?>"/>
            </div>
            <div class="col">
                <input type="number" name="phone" id="phone" placeholder="Numero de celular estudiante" require class="form-control" value="<?= $data->phone ?>"/>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
                <textarea name="diseases" id="diseases" placeholder="Motivo de opcion de grado" require class="form-control" value="<?= $data->diseases ?>"></textarea>
                <b> Debes especificar de manera detallada que modalidad de opcion de grado quieres cursar</b>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
                <input type="datetime-local" name="sessionDate" id="sessionDate" require class="form-control" value="<?= $date->format('Y-m-d\TH:i') ?>"/> 
            </div>
            <div class="col">
                <input type="text" name="carrera" id="carrera" placeholder="Carrera universitaria" require class="form-control" value="<?= $data->carrera ?>"/>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
                <input type="file" name="image" id="image" require class="form-control"/>
            </div>
          </div>
          <button class="btn btm-success"> Modificar </button>
        </form>
    </div>
    </body>
</html>