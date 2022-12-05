<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LOGIN</title>
    <!-- <link href="estilos.css" rel="stylesheet" > -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <?php include('vista/encabezado.php');?>
    <div class="container">
        <div class="centrar"><h1>INICIO DE SESIÓN</h1>
    <h2>Bienvenid@ a Mi Proyecto, por favor, inicie sesión. </h2>
   
            <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Correo electrónico">
                </div>
                <div class="form-group">
                    <label for="contra">Contraseña</label>
                    <input type="password" name="contra" class="form-control" id="contra" placeholder="Contraseña">
                </div>
    <br>
    <h5><a href="vista/listaTareas.php"><button class="btn btn-primary">INGRESAR ADMIN</button></a>
    <a href="modelo/listarTareasOperario.php"><button class="btn btn-primary">INGRESAR OPERARIO</button> </a>    
    ¿No tienes una cuenta? <a href="vista/nuevoUsuario.php">Registrate aquí</a></h5>
          
            <div id="idMensaje" style="display: none;" class="alert alert-danger my-3" role="alert">
                <p>El Usuario y/o contraseña no es correcto.</p>
            </div>
        </div>
    </div>
    <?php
include('vista/pie.php');?>
</body>
</htmL>