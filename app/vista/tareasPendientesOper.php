
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAREAS PENDIENTES DE REALIZAR</title>
    <!-- <link href="estilos.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body><?php
include('layout/encabezado.php'); 
include('layout/menuO.php'); 
?> <div class="container">
<div class="centrar"><br>
<h2>LISTADO DE TAREAS PENDIENTES:</h2>
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      <table class="table table-bordered table-striped">
<thead class="thead-dark">
<th class='table-header' width='3%'>ID</th>
 	<th class='table-header' width='10%'>DESCRIPCION</th>
 	<th class='table-header' width='5%'>ESTADO</th>
 	<th class='table-header' width='10%'>FECHA C</th>
  <th class='table-header' width='5%'>NOMBRE</th>
 	<th class='table-header' width='10%'>FECHA R</th>
 	<th class='table-header' width='8%'>ANOT A</th>
 	<th class='table-header' width='8%'>ANOT P</th>
  <th class='table-header' width='10%'>ACCIONES</th>
</thead>
<tbody>
      <?php
      include('../controlador/tareasPendientesOper.php');
    
?> 
</table>

</tbody>
</div>
</div>
<?php include('layout/pie.php'); ?>
</body>
</html>