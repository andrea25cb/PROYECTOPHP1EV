<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>LOGIN</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
	<body>

<?php
include('modelo/login.php');
include('vista/layout/encabezado.php');
?>

	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($loginMsg))
		{
		?>
			<div class="alert alert-success">
				<strong>ÉXITO ! <?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?> 


<div class="login-form">
<center><h2>Iniciar sesión</h2></center>
<form method="post" class="form-horizontal">
  <div class="form-group">
  <label class="col-sm-6 text-left">Correo</label>
  <div class="col-sm-12">
  <input type="text" name="correo" value="<?=isset($_POST['correo']) ? $_POST['correo']: ''?>" class="form-control" placeholder="Ingrese correo" />
  </div>
  </div>
      
  <div class="form-group">
  <label class="col-sm-6 text-left">Contraseña</label>
  <div class="col-sm-12">
  <input type="password" value="<?=isset($_POST['contra']) ? $_POST['contra']: ''?>" name="contra" class="form-control" placeholder="Ingrese contraseña" />
  </div>
  </div>
      
  <div class="form-group">
      <label class="col-sm-6 text-left">Seleccionar rol</label>
      <div class="col-sm-12">
      <select class="form-control" name="nivel">
          <option value="" selected="selected"> - selecccionar rol - </option>
          <option value="admin">Admin</option>
          <option value="operario">Operario</option>
      </select>
      </div>
  </div>
  
  <div class="form-group">
  <div class="col-sm-12">
  <input type="submit" name="btn_login" class="btn btn-success btn-block" value="Iniciar Sesion">
  </div>
  </div>
      
</form>
</div>
	</div>	
	</div>
	</div>		
    <?php
include('vista/layout/pie.php'); 
?>						
	</body>
</html>