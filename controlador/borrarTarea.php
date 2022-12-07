<?php
/**Controlador que permite eliminar una tarea con un id concreto que se pasa por parámetros */
include("../modelo/modTarea.php"); 
$id = filter_input(INPUT_POST, 'id');
    $tarea=new Tarea();
    $tarea->borrar($id);
