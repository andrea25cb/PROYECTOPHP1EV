<?php
include(__DIR__ . '/database.php');
require_once "Clases.php";
$util = new Util();
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
	else if($correo AND $contra) //y si no están vacios:
	{
		try
		{
			$cc = Database::getInstance();
			$sql=$cc->db->prepare("SELECT * FROM usuario
										WHERE
										correo=:ucorreo AND contra=:ucontra"); 
			$sql->bindParam(":ucorreo",$correo);
			$sql->bindParam(":ucontra",$contra);
			
			$sql->execute();
					
			while($row=$sql->fetch(PDO::FETCH_ASSOC))	
			{
				$dbcorreo	=$row["correo"];
				$dbcontra	=$row["contra"];
				$dbnivel	=$row["nivel"];
			}
			if($correo!=null AND $contra!=null)	
			{
				if($sql->rowCount()>0)
				{
					if($correo==$dbcorreo and $contra==$dbcontra)
					{
						switch($dbnivel)		
						{
							case "admin":
								$_SESSION["admin_login"]=$correo;			
								$loginMsg="Admin: Inicio sesión con éxito";	
								header("refresh:3;vista/admin_portada.php");	
								break;
								
							case "operario";
								$_SESSION["operario_login"]=$correo;				
								$loginMsg="Operario: Inicio sesión con éxito";
								header("refresh:3;vista/operario_portada.php?correo=" . $correo);	
								break;
								
							default:
								$errorMsg[]="correo electrónico o contraseña incorrectos";
						}

						 // RECUERDAME 
						 if (! empty($_POST["recuerdame"])) {
							setcookie("correo", $username, $cookie_expiration_time);
							
							$random_password = $util->getToken(16);
							setcookie("contra", $random_password, $cookie_expiration_time);
							
							$random_selector = $util->getToken(32);
							setcookie("random_selector", $random_selector, $cookie_expiration_time);
							
							$random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
							$random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
							
							$expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
							
							// mark existing token as expired
							$userToken = $auth->getTokenByUsername($username, 0);
							if (! empty($userToken[0]["id"])) {
								$auth->markAsExpired($userToken[0]["id"]);
							}
							// Insert new token
							$auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
						} else {
							$util->clearAuthCookie();
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