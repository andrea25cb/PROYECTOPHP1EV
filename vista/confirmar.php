<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MODIFICAR TAREA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('layout/encabezado.php');
include('layout/menuA.php');
 ?>
<form action="../controlador/borrarTarea.php" method="POST">
<div class="container">
        <div class="centrar">
          
<?php
  require_once("../modelo/modTarea.php"); 
  $id=$_GET['id']; 
?>
<h3>¿ESTÁS SEGURO DE QUE QUIERES BORRAR LA TAREA <?=$id?> ?</h3>

<p><input type="hidden" name="id" value="<?=$id?>"></p>
<div class="col-md-6 col-md-offset-4">

              <button type="submit" class="btn btn-primary" name="borrar">
                SI, ESTOY SEGURO
              </button>
              <a href="../vista/listarTareas.php" class="btn btn-danger"> NO, VOLVER </a>
              <input type="hidden" name="borrar" value="borrar">
            </div>
</form>
<?php include('layout/pie.php'); ?>
</body>
</html>