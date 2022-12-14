<?php
     include('../config/config.php');
     include('Patient.php');
    $p = new Patient();
    $allPatients = $p->getAll();

    if(isset($_GET['id'])&& !empty($_GET['id'])){
        $remove = $p->remove($_GET['id']);
        if ($remove){
            header('Location: ' . ROOT . 'Patients/index.php');
        }else{
            $msj = " <div class='alert alert-danger' rol='alert'> Error al eliminar agenda.</div>";
        }
    }
?>  

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Lista de Alumnos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <?php include('../menu.php')?>
    <div class="container">
        <h2 class="text-center mb-5">Lista Alumnos</h2>
        
        <div class="row">
        <?php
        while($patient = mysqli_fetch_object($allPatients)){
            $input = $patient->sessionDate;
            echo "<div class='col' >";
            echo "<div class='border border-info p-2'> ";
            echo "<h5> 
                    <img src='".ROOT."/images/$patient->image' width='50' heigth='50' />
                    $patient->firstName $patient->lastName
                  </h5>";
            echo "<h5>Id Banner:</h5><p> $patient->phone </p>"; 
            echo "<h5>Motivo Opcion de grado:</h5><p> $patient->diseases </p>"; 
            echo "<h5>Carrera:</h5><p> $patient->carrera </p>";
            echo "<h5>Calificacion investigacion 2:</h5><p> $patient->inv2 </p>";
            echo "<h5>Porcentaje creditos aprobados:</h5><p> $patient->porcecred </p>";
            echo "<p> <b>Fecha:</b> ".date("D", strtotime($input))."".date("d-M-Y H:i", strtotime($input))." </p> ";  
            echo "<div class='text-center'><a class='btn btn-success' href='". ROOT ."/Patients/edit.php?id=$patient->id'> Modificar </a> - <a class='btn btn-danger' href='" . ROOT ."/Patients/index.php?id=$patient->id'> Eliminar </a> </div>";
            echo " </div> ";
            echo " </div> ";   
        }  
        ?>
        </div>
    </div>  
    </body>
</html>
