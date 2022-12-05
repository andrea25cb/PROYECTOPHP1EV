<?php
include("../modelo/modTarea.php"); 
$id = filter_input(INPUT_POST, 'id');
    $tarea=new Tarea();
    $tarea->borrar($id);
