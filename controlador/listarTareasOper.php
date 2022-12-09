<?php

require_once("../modelo/modTarea.php");
include_once('../modelo/session.php');

/**Controlador que permite listar al operario sus tareas */
// if (!$_POST) {
   print_r($_SESSION['operario_login']);

//   include('../vista/listarTareasOperario.php');
// }
// else {
  
  $correo = $_SESSION["operario_login"];

  $tarea = new Tarea();
  $tarea->tareasOperario($correo);

//}