<?php
/**
 * VISTA QUE MUESTA LA LISTA DE TAREAS.
 * El controlador será el que nos proporcine en la variable $tareas
 * que contiene las tareas a mostrar
 */
?>
<!-- @extends('_template')

@section('cuerpo') -->
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

    /**BUSCADOR DE TAREAS: */
?>

<br>

<!-- <div class="row"><div class="col-lg-6"></div>
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar tarea..."  name='search[keyword]' value="<?php //echo $search_keyword; ?>" id='keyword' maxlength='25'>
      <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
  </div>
</div> -->
 <div class="container">
        <div class="centrar">
<h2>LISTADO DE TAREAS:</h2>
<a style="float:right ;"  href="../controlador/insertarTarea.php"><input class="btn btn-success btn-block" type="button" name="insertar" value="añadir nueva tarea"></a>
<br><br><p>
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
      include('../controlador/listar.php');
      //include('../controlador/paginacion.php');
      
?> 
</table>
</tbody>
</div>
</div>
</div>
<?php include('layout/pie.php'); ?>
</body>
</html>
<!-- @endsection -->