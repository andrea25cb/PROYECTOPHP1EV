<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LISTAR USUARIOS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <?php 
include('layout/encabezado.php');
include('layout/menuA.php'); 
?>
<br>

 <div class="container">
        <div class="centrar">

<h2>LISTADO DE OPERARIOS:</h2>
<a style="float:right ;" id="insertarUsuario" href="../controlador/insertarUsuario.php"><input class='btn btn-primary' type="button" name="insertar" value="añadir nuevo operario"></a>
<br>

    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      <table class="table table-bordered table-striped">
<thead class="thead-dark">
    <th class='table-header' width='30%'>NOMBRE</th>
 	<th class='table-header' width='35%'>CORREO</th>
 	<th class='table-header' width='40%'>PASSWD</th>
    <th class='table-header' width='30%'>ACCIONES</th>
 
</thead>
<tbody>
      <?php
      include('../controlador/listarUsu.php');
?> 
</table>
</tbody>
</div>
</div>
</div>
<?php include('layout/pie.php'); ?>
</body>
</html>