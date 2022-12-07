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
	$nivel  = $_REQUEST["nivel"];	//select opcion nombre "nivel"
		
	if(empty($correo)){						
		$errorMsg[]="Por favor ingrese correo";	//Revisar correo vacio
	}
	else if(empty($contra)){
		$errorMsg[]="Por favor ingrese contraseña";	//Revisar contra vacia
	}
	else if(empty($nivel)){
		$errorMsg[]="Por favor seleccione su nivel ";	//Revisar nivel vacio
	}
	else if($correo AND $contra AND $nivel) //y si no están vacios:
	{
		try //lo siguiente ya estaria en el modelo:
		{
			$cc = Database::getInstance();
			$select_stmt=$cc->db->prepare("SELECT correo,contra,nivel FROM usuario
										WHERE
										correo=:ucorreo AND contra=:ucontra AND nivel=:univel"); 
			$select_stmt->bindParam(":ucorreo",$correo);
			$select_stmt->bindParam(":ucontra",$contra);
			$select_stmt->bindParam(":univel",$nivel);
			$select_stmt->execute();	//execute query
					
			while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))	
			{
				$dbcorreo	=$row["correo"];
				$dbcontra	=$row["contra"];
				$dbnivel	=$row["nivel"];
			}
			if($correo!=null AND $contra!=null AND $nivel!=null)	
			{
				if($select_stmt->rowCount()>0)
				{
					if($correo==$dbcorreo and $contra==$dbcontra and $nivel==$dbnivel)
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
								$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
						}
					}
					else
					{
						$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
					}
				}
				else
				{
					$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
				}
			}
			else
			{
				$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
        //fin del modelo
	}
	else
	{
		$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
	}
}
?>