<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <?php 
include('layout/encabezado.php');
include('layout/menuA.php'); 
?>
 <div class="container">
        <div class="centrar">

    <!-- llamar a controlador -->
      <?php
       require_once("../controlador/insertarTarea.php"); 
      
 ?> 
</div>
</div>
</div>
<?php include('layout/pie.php'); ?>
    </body>