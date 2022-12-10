<?php
/**Controlador que permite al admin insertar un nuevo usuario, cogiendo los datos de un formulario */
include("../modelo/modUsuario.php"); 
include('filtrarErroresUsuario.php');

if (!$_POST) {
     // 1º vez
    include('../vista/nuevoUsuario.php');

} else {
    $errores = filtrarErrores();

    if ($errores) {
        include('../vista/nuevoUsuario.php');
    } else {
        $nombre = filter_input(INPUT_POST, 'nombre');
        $correo = filter_input(INPUT_POST, 'correo');
        $contra = filter_input(INPUT_POST, 'contra');

        $usuario = new Usuario();
        $usuario->insertarUsuario($nombre, $correo, $contra, 'operario');
    }
}