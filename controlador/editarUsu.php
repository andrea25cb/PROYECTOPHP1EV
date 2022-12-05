<?php
require_once("../modelo/modUsuario.php"); 
if ($_POST) {    
    
    $nombre = filter_input(INPUT_POST, 'nombre');
    $correo = filter_input(INPUT_POST, 'correo');
    $contra = filter_input(INPUT_POST, 'contra');

$usuario=new Usuario();
$usuario->editarUsuario($nombre,$correo,$contra);
}