<?php
/** 
* @author andrea cordon
*/

/**Controlador que permite ver al admin una lista con todas las tareas */
  require_once("../modelo/modTarea.php"); 

  $tarea=new Tarea();
  $tarea->listar();  



