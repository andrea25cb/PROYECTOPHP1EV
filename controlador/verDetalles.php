<?php
include("../modelo/modTarea.php"); 
    $id=$_GET['id']; 
    $tarea=new Tarea();
    $tarea->verDetalles($id);
