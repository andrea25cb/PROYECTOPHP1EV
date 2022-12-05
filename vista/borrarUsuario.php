<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BORRAR TAREA</title>
  <link href="estilos.css" rel="stylesheet" >
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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