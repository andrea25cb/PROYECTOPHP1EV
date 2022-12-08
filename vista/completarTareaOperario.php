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
include('layout/menuA.php');
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
        
        <p>Descripción tarea:<br>
        <textarea class="form-control" name="desc" readonly value="<?= $registro->descripcion ?>"><?= $registro->descripcion ?></textarea>
        <?=VerError('descripcion')?>
        </div>

      <p class="form-check">
        <p>ESTADO TAREA:
       <input class="form-check-input" type="radio" name="estadoTarea" value="<?= $registro->estadoTarea ?>" 
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='B')
            echo 'checked';
        ?>> Esperando a ser aprobada

       <input class="form-check-input" type="radio" name="estadoTarea" value="<?= $registro->estadoTarea ?>" checked
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='R')
            echo 'checked';
        ?>> Realizada

       <input class="form-check-input" type="radio" name="estadoTarea" value="<?= $registro->estadoTarea ?>"
        <?php if (filter_input(INPUT_POST,'estadoTarea')=='C')
            echo 'checked';
        ?>> Cancelada
        <?=VerError('estadoTarea')?>
    </p>

   <p>Fecha creación:
   <input type="date" name="fechaC" readonly value="<?= $registro->fechaC ?>">
   <br>

    <p>Fecha realización:
        <input type="date" name="fechaR" value="<?= $registro->fechaR ?>"></p> 
        <?=VerError('fechaR')?>
        <p>Anotaciones posteriores:<br>
        <textarea class="form-control"  name="anotP" value="<?= $registro->anotP ?>"><?= $registro->anotP ?></textarea></p>
       
        <!-- permitir adjuntar fichero -->
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">ADJUNTAR FICHERO</label>
            <input type="file" class="form-control" id="inputGroupFile01"name="fichero" value="<?= $registro->fichero ?>">
        </div>

    <input type="hidden" name="id" value="<?=$id?>">
 
    <a href="../modelo/listarTareas.php"><input type="button" value="VOLVER"></a> 
    <input type="submit" name="actualizar" value="actualizar">
</form>
<?php
}

?>
   </div>
    </div>
</body>
</html>