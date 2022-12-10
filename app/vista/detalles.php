<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php include('layout/encabezado.php');
    include('layout/menuA.php');
 ?>
 <div class="container">
        <div class="centrar">
<h2>TAREA DETALLADA</h2>

<div class="col-12 col-md-12"> 
      <!-- Contenido -->
      <table class="table table-bordered table-striped">
    <thead>
    <tr>
	  <th class='table-header' width='1%'>ID</th>
      <th class='table-header' width='1%'>NIF</th>
	  <th class='table-header' width='2%'>NOMBRE</th>
	  <th class='table-header' width='2%'>APELLIDOS</th>
	  <th class='table-header' width='2%'>TLF</th>
      <th class='table-header' width='2%'>DESCRIPCION</th>
	  <th class='table-header' width='2%'>CORREO</th>
	  <th class='table-header' width='2%'>DIRECCION</th>
	  <th class='table-header' width='2%'>POBLACION</th>
      <th class='table-header' width='2%'>CP</th>
	  <th class='table-header' width='2%'>PROVINCIA</th>
	  <th class='table-header' width='2%'>ESTADO</th>
	  <th class='table-header' width='2%'>FECHA C</th>
      <th class='table-header' width='2%'>OPERARIO</th>
	  <th class='table-header' width='2%'>FECHA R</th>
	  <th class='table-header' width='2%'>ANOT A</th>
	  <th class='table-header' width='2%'>ANOT P</th>
      <th class='table-header' width='2%'>FOTO</th>
	  <th class='table-header' width='2%'>FICHERO</th>
	</tr>
    </thead>
    <tbody id='table-body'>
    </thead>
<tbody>
    <!-- llamar a controlador -->
      <?php
       require_once("../controlador/verDetalles.php"); 
 ?> 
</div>
</div>
</div>

    </body>
    <?php include('layout/pie.php'); ?>