<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Portada operario</title>
		
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
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
    <?php include('../vista/layout/encabezado.php');
include('../vista/layout/menuO.php'); ?>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>OPERARIO</h1>
				
				<h3>
				<?php
				
				session_start();

				if(!isset($_SESSION['operario_login']))	
				{
					header("location: ../index.php");
				}

				if(isset($_SESSION['admin_login']))	
				{
					header("location: admin_portada.php");
				}
				
				if(isset($_SESSION['operario_login']))
				{
				?>
					Bienvenido,
				<?php
					echo $_SESSION['operario_login'];
					
				}
				?>
				</h3>
				<input type="hidden" value = "<?= $_SESSION['operario_login']?>">
			</center>
<hr>
		</div>
		
	</div>
			
	</div>
	<?php
include('../vista/layout/pie.php'); ?>			
	</body>
</html>