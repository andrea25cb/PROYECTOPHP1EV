<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>INSERTAR USUARIO</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>

      <?php 
    include('../vista/layout/encabezado.php');
    include('../vista/layout/menuA.php');?>

    <div class="container">
        <div class="centrar">
          <br>
        <h2>Crear nueva cuenta de operario:</h2>                 
          <form action="../controlador/insertarUsuario.php" method="POST" >
             <!--Nombre  -->
        <div class="input-group">
            <span class="input-group-text">Nombre  </span>
                <input class="form-control" type="text" name="nombre" value="<?=isset($_POST['nombre']) ? $_POST['nombre']: ''?>">
        </div><?= VerError('nombre') ?> <p> 
      
        <div class="input-group">
        <span class="input-group-text">Correo</span>
              <input class="form-control" type="text" name="correo" value="<?=isset($_POST['correo']) ? $_POST['correo']: ''?>">
                </div><?= VerError('correo') ?> <p> 
        
        <div class="input-group">
            <span class="input-group-text">Contraseña</span>
              <input class="form-control" type="password" name="contra" value="<?=isset($_POST['contra']) ? $_POST['contra']: ''?>">
            </div><?= VerError('contra') ?> <p> 
           
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Guardar
              </button>
              <a href="../vista/listarUsuarios.php" class="btn btn-danger"> Cancelar </a>
            
          </form>
          </div>
    </div></div>
    <?php
include('layout/pie.php'); 
?>
    </body>
</html>