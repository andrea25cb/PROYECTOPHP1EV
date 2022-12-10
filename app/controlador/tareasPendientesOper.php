<?php

require_once("../modelo/modTarea.php");
include_once('../modelo/session.php');

/**Controlador de la opcion del menú que muestra las tareas pendientes del operario */
// if (!$_POST) {
   print_r($_SESSION['operario_login']);

//   include('../vista/tareasPendientesOper.php');
// }
// else {
  
  $correo = $_SESSION['operario_login'];

  $correoo = strval($correo);


  $tarea = new Tarea();
$tarea->listarPendientesOper($correo);

//}