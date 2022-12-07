<?php
/**Controlador de la opcion 'modificar' que permite editar los datos de una tarea*/
include("../modelo/modTarea.php"); 
include('filtrarErrores.php');

$id=$_GET['id']; 
    /**Para coger los valores y mostrarlos en los inputs: */
    $cc = Database::getInstance(); 
    $sql="SELECT * FROM tarea WHERE id = $id"; 
    $query= $cc->db->prepare($sql); 
    $query->execute();
    
$registro = $query -> fetch(PDO::FETCH_OBJ);

if (!$_POST) {
    // 1º vez
    include('../vista/modificar.php');
}
else {
    
    $errores = filtrarErrores();
    
 if ($errores){
    include('../vista/modificar.php');
 }else{
        $reg = [
            'id' => filter_input(INPUT_POST, 'id'),
            'nif' => filter_input(INPUT_POST, 'nif'),
            'nombre' => filter_input(INPUT_POST, 'nombre'),
            'apellidos' => filter_input(INPUT_POST, 'apellidos'),
            'tlf' => filter_input(INPUT_POST, 'tlf'),
            'descripcion' => filter_input(INPUT_POST, 'descripcion'),
            'correo' => filter_input(INPUT_POST, 'correo'),
            'direccion' => filter_input(INPUT_POST, 'direccion'),
            'poblacion' => filter_input(INPUT_POST, 'pob'),
            'cp' => filter_input(INPUT_POST, 'cp'),
            'provincia' => filter_input(INPUT_POST, 'provincia'),
            'estadoTarea' => filter_input(INPUT_POST, 'estadoTarea'),
            'fechaC' => filter_input(INPUT_POST, 'fechaC'),
            'operario' => filter_input(INPUT_POST, 'operario'),
            'fechaR' => filter_input(INPUT_POST, 'fechaR'),
            'anotA' => filter_input(INPUT_POST, 'anotA'),
            'anotP' => filter_input(INPUT_POST, 'anotP'),
            'fichero' => filter_input(INPUT_POST, 'fichero'),
            'foto' => filter_input(INPUT_POST, 'foto'),
        ];

    $tarea=new Tarea();
    $tarea->actualizar($reg);
}
}