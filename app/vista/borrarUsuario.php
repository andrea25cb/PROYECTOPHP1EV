<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BORRAR TAREA</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php

try {
  include('../config/conex.php');
    $conex=Conecta();
   // $id=$_GET['id'];
    $nombre = filter_input(INPUT_POST, 'nombre');

    $sql="DELETE FROM usuario
    WHERE nombre = '".$nombre."'";
    echo "<pre>$sql</pre>";
    $tareas = mysqli_query($conex,$sql);

echo '<h1>Operario '.$nombre.' despedido con éxito</h1>';
echo '<a href="listarTareas.php"><button type="button">VOLVER</button></a>';
    }

catch(\Exception $e) {
	echo $e->getMessage();
}
?>
</body>
</html>