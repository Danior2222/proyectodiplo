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
            $error = '<div class="alert alert-success" role-"alert">estudiante registrado correctamente</div>';
        }else{
            $error = '<div class="alert alert-danger" role-"alert">Error al registrar estudiante</div>';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8"/>
        <title>Registrar estudiante</title>
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
    <h2 class="text-center mb-5">Registro estudiante </h2>
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
                <input type="number" name="phone" id="phone" placeholder="Numero Id Banner" require class="form-control"/>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
            <select name="diseases" id="diseases" class="form-select" aria-label="Default select example">
                 <option selected>Tipo opcion de grado</option>
                 <option value="Diplomado">Diplomado</option>
                 <option value="Proyecto">Proyecto</option>
                 <option value="Semillero">Semillero</option>
            </select>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <input type="datetime-local" name="sessionDate" id="sessionDate" require class="form-control"/>
            </div>
            <div class="col">
            <select name="carrera" id="carrera" class="form-select" aria-label="Default select example">
                 <option selected>Carrera</option>
                 <option value="Ingenieria de Software">Ingenieria de Software</option>
                 <option value="Ingenieria Industrial">Ingenieria Industrial</option>
            </select>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
            <input type="text" name="inv2" id="inv2" placeholder="Calificacion Investigacion 2 " require class="form-control"/>
            </div>
            <div class="col">  
            <input type="number" name="porcecred" id="porcecred" placeholder="Procentaje creditos aprobados" require class="form-control"/> 
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
