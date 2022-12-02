<?php
    include('../config/config.php');
    include('Patient.php');

    if(isset($_POST)&& !empty($_POST)){
        $patient = new Patient();
        if($_FILES['image']['name'] !== ''){
            $_POST['image']= saveImage($_FILES);
        }
        $save = $patient->save($_POST);
        if ($save){
            $error = '<div class="alert alert-success" role-"alert">Paciente creado correctamente</div>';
        }else{
            $error = '<div class="alert alert-danger" role-"alert">Error al crear paciente</div>';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8"/>
        <title>Crear paciente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<body>
<?php include('../menu.php')?>
    <div class="container">
    <?php
        if(isset($error)){
            echo $error;
        }
    ?>
    <h2 class="text-center mb-5">Registro Alumno </h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="row mb-2">
            <div class="col">
                <input type="text" name="firstName" id="firstName" placeholder="Nombre estudiante" require class="form-control"/>
            </div>
            <div class="col">
                <input type="text" name="lastName" id="lastName" placeholder="Apellido estudiante" require class="form-control"/>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <input type="email" name="email" id="email" placeholder="Email estudiante" require class="form-control"/>
            </div>
            <div class="col">
                <input type="number" name="phone" id="phone" placeholder="Numero celular estudiante" require class="form-control"/>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <textarea name="diseases" id="diseases" placeholder="Motivo opcion de grado" require class="form-control"></textarea>
                <b>Debes especificar de manera detallada que modalidad de opcion de grado quieres cursar</b>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <input type="datetime-local" name="sessionDate" id="sessionDate" require class="form-control"/>
            </div>
            <div class="col">
                <input type="text" name="carrera" id="carrera" placeholder="Carrera universitaria" require class="form-control"/>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <input type="file" name="image" id="image" class="form-control"/>
            </div>
        </div>
        <button class="btn btm-success">Registrar</button>
    </form>
    </div>
</body>
</html>
