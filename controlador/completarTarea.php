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
    include('../vista/completarTareaOperario.php');
}
else {
    
    $errores = filtrarErrores();
    
 if ($errores){
    include('../vista/completarTareaOperario.php');
 }else{
        $reg = [
           
            'descripcion' => filter_input(INPUT_POST, 'descripcion'),
            'estadoTarea' => filter_input(INPUT_POST, 'estadoTarea'),
            'fechaC' => filter_input(INPUT_POST, 'fechaC'),
            'fechaR' => filter_input(INPUT_POST, 'fechaR'),
            'anotA' => filter_input(INPUT_POST, 'anotA'),
            'anotP' => filter_input(INPUT_POST, 'anotP'),
            'fichero' => filter_input(INPUT_POST, 'fichero'),
            'foto' => filter_input(INPUT_POST, 'foto'),
        ];

    $tarea=new Tarea();
    $tarea->completarTarea($reg);
}
}