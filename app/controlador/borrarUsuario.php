<?php
/**Controlador que permite eliminar un usuario con un correo concreto que se pasa por parámetros */
include("../modelo/modUsuario.php"); 

if (!$_POST) {
    // 1º vez
    include('../vista/confirmarDespedir.php');
} else {
    $correo = filter_input(INPUT_POST, 'correo');
    $usuario = new Usuario();
    $usuario->borrarUsuario($correo);
}