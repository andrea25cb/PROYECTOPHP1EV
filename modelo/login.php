<?php
include(__DIR__ . '/database.php');

/** Su función es comprobar el login de la primera pantalla/index ('login'), 
 * diferenciando si el usuario que ingresa es administrador u operario
 * mostrando los mensajes que convengan según el error cometido*/

session_start();
if(isset($_SESSION["admin_login"]))	//Condicion admin
{
	header("location: vista/admin_portada.php");	
}
if(isset($_SESSION["operario_login"]))	//Condicion operario
{
	header("location: vista/operario_portada.php"); 
}

if(isset($_REQUEST['btn_login']))	//si le doy al boton login:
{
	$correo = $_REQUEST["correo"];	//textbox nombre "correo"
	$contra = $_REQUEST["contra"];	//textbox nombre "contra"
		
	if(empty($correo)){						
		$errorMsg[]="Por favor ingrese correo";	//Revisar correo vacio
	}
	else if(empty($contra)){
		$errorMsg[]="Por favor ingrese contraseña";	//Revisar contra vacia
	}
	else if($correo AND $contra ) //y si no están vacios:
	{
		try
		{
			$cc = Database::getInstance();
			$select_stmt=$cc->db->prepare("SELECT * FROM usuario
										WHERE
										correo=:ucorreo AND contra=:ucontra"); 
			$select_stmt->bindParam(":ucorreo",$correo);
			$select_stmt->bindParam(":ucontra",$contra);
			// $select_stmt->bindParam(":univel",$nivel);
			$select_stmt->execute();
					
			while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))	
			{
				$dbcorreo	=$row["correo"];
				$dbcontra	=$row["contra"];
				$dbnivel	=$row["nivel"];
			}
			if($correo!=null AND $contra!=null)	
			{
				if($select_stmt->rowCount()>0)
				{
					if($correo==$dbcorreo and $contra==$dbcontra)
					{
						switch($dbnivel)		//inicio de sesión de usuario base de nivels
						{
							case "admin":
								$_SESSION["admin_login"]=$correo;			
								$loginMsg="Admin: Inicio sesión con éxito";	
								header("refresh:3;vista/admin_portada.php");	
								break;
								
							case "operario";
								$_SESSION["operario_login"]=$correo;				
								$loginMsg="Operario: Inicio sesión con éxito";		
								header("refresh:3;vista/operario_portada.php");	
								break;
								
							default:
								$errorMsg[]="correo electrónico o contraseña incorrectos";
						}
					}
					else
					{
						$errorMsg[]="correo electrónico o contraseña incorrectos";
					}
				}
				else
				{
					$errorMsg[]="correo electrónico o contraseña incorrectos";
				}
			}
			else
			{
				$errorMsg[]="correo electrónico o contraseña incorrectos";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
	else
	{
		$errorMsg[]="correo electrónico o contraseña incorrectos";
	}
}
?>