<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COMPLETAR TAREA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
include('layout/encabezado.php');
// include('layout/menuO.php');
?>
<div class="container">
        <div class="centrar"> 
          <?php

    $id=$_GET['id']; 
        ?>
        <h3>COMPLETANDO LA TAREA <?=$id?></h3>
        
        <p><input type="hidden" name="id" value="<?=$id?>"></p>

<?php
if ($registro) {
      ?>

    <form action="../controlador/completarTarea.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
        
    <p>ESTADO TAREA:
       <input class="form-check-input" type="radio" name="estadoTarea" value="Esperando a ser aprobada" 
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='Esperando a ser aprobada')
            echo 'checked';
        ?>> Esperando a ser aprobada

       <input class="form-check-input" type="radio" name="estadoTarea" value="Realizada" checked
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='Realizada')
            echo 'checked';
        ?>> Realizada

       <input class="form-check-input" type="radio" name="estadoTarea" value="Cancelada"
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='Cancelada')
            echo 'checked';
        ?>> Cancelada

    </p>

   <p>Fecha creación:
   <input type="date" name="fechaC" readonly value="<?= $registro->fechaC ?>">
   <br>

    <p>Fecha realización:
        <input type="date" name="fechaR" value="<?= $registro->fechaR ?>"></p> 

        <p>Anotaciones posteriores:<br>
        <textarea class="form-control"  name="anotP" value="<?= $registro->anotP ?>"><?= $registro->anotP ?></textarea></p>
       
        <!-- permitir adjuntar fichero -->
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">ADJUNTAR FICHERO</label>
            <input type="file" class="form-control" id="inputGroupFile01"name="fichero" value="<?= $registro->fichero ?>">
        </div>

    <input type="hidden" name="id" value="<?=$id?>">
 
    <input type="submit" name="actualizar" value="actualizar">
</form>
<?php
}

?>
   </div>
    </div>
</body>
</html>