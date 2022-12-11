<?php
/** 
* @author andrea cordon
*/

/**Controlador que permite ver una lista con todos los operarios (sus nombres) */
include("../modelo/modTarea.php"); 
$tarea=new Tarea();
$tarea->listaOperarios();