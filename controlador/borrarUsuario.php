<?php
include("../modelo/modUsuario.php"); 
$correo = filter_input(INPUT_POST, 'correo');
    $usuario=new Usuario();
    $usuario->borrarUsuario($correo);
