<?php
/** 
* @author andrea cordon
*/

/**Controlador que permite ver al admin una lista con todos los usuarios */
require_once("../modelo/modUsuario.php"); 
$usuario=new Usuario();
$usuario->listarUsuarios();  

