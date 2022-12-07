<?php
/**Controlador que permite editar los datos de un usuario cogiendo sus valores de un formulario */
require_once("../modelo/modUsuario.php"); 
if ($_POST) {    
    
    $nombre = filter_input(INPUT_POST, 'nombre');
    $correo = filter_input(INPUT_POST, 'correo');
    $contra = filter_input(INPUT_POST, 'contra');

$usuario=new Usuario();
$usuario->editarUsuario($nombre,$correo,$contra);
}
include('../vista/layout/encabezado.php');
include('../vista/layout/menuA.php');
?>

<h1>USUARIO EDITADO</h1>