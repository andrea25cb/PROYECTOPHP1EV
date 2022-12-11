<?php
/** 
* @author andrea cordon
*/

/**Controlador que permite editar los datos de un usuario cogiendo sus valores de un formulario */
require_once("../modelo/modUsuario.php"); 
include('../modelo/filtrarErroresUsuario.php');

$correo=$_GET['correo']; 
    /**Para coger los valores y mostrarlos en los inputs: */
    $cc = Database::getInstance(); 
    $sql="SELECT * FROM usuario WHERE correo = '$correo'"; 
    $query= $cc->db->prepare($sql); 
    $query->execute();
    
    $registro = $query -> fetch(PDO::FETCH_OBJ);

if (!$_POST) {
    // 1º vez
    include('../vista/editarUsuario.php');
}
else {
    
    $errores = filtrarErrores();
    
 if ($errores){
       // print_r($errores);
    include('../vista/editarUsuario.php'); //NO LLEGA AQUI
 }else{
    $nombre = filter_input(INPUT_POST, 'nombre');
    $correo = filter_input(INPUT_POST, 'correo');
    $contra = filter_input(INPUT_POST, 'contra');

    $usuario=new Usuario();
    $usuario->editarUsuario($nombre,$correo,$contra);

}
}