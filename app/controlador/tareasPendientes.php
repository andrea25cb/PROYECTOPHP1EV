<?php
/** 
* @author andrea cordon
*/

/**Controlador de la opcion del menú de administrador que muestra todas las tareas pendientes */
  require_once("../modelo/modTarea.php"); 

  $tarea=new Tarea();
  $tarea->listarPendientes();  
