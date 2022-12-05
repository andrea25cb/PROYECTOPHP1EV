<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body><?php include('../vista/layout/encabezado.php');?>
    <div class="container">
        <div class="centrar">
            <?php 
            
    require_once("../modelo/modUsuario.php"); 
  
    $correo=$_GET['correo']; 

    echo '<h1>EDITANDO DATOS DE '.$correo.' </h1>';/**Para coger los valores y mostrarlos en los inputs: */
    $cc = Database::getInstance(); 
    $sql="SELECT * FROM usuario WHERE correo = '$correo'"; 
    $query= $cc->db->prepare($sql); 
    $query->execute();
    
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
    foreach ($results as $registro) {?>
          <br>              
          <form action="../controlador/editarUsu.php" method="POST" >
             <!--Nombre y Apellidos  -->
        <div class="input-group">
            <span class="input-group-text">Nombre  </span>
                <input class="form-control" type="text" name="nombre" value="<?= $registro->nombre ?>">
        </div><p> 
      
        <div class="input-group">
        <span class="input-group-text">Correo</span>
              <input class="form-control" type="text" name="correo" value="<?= $registro->correo ?>">
                </div><p> 
        
        <div class="input-group">
            <span class="input-group-text">Contraseña</span>
              <input class="form-control" type="text" name="contra" value="<?= $registro->contra ?>">
            </div><p> 
           
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Guardar
              </button>
              <a href="listarUsuarios.php" class="btn btn-danger"> Cancelar </a>
            
          </form>
          </div>
    </div></div>
    <?php
include('layout/pie.php'); 

    }
}

?>
    </body>
</html>