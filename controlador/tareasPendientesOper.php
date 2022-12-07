<?php
/**Controlador de la opcion del menú que muestra las tareas pendientes del operario */
  require_once("../modelo/modTarea.php");
  $correo = $_GET['correo'];
  $tarea=new Tarea();
  $tarea->listarPendientesOper($correo);  
