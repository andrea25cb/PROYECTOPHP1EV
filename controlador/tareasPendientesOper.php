<?php
/**Controlador de la opcion del menú que muestra las tareas pendientes del operario */
include("../modelo/modTarea.php");
session_start();
if (!$_POST) {
  // 1º vez
  print_r($_SESSION['operario_login']);

  include('../vista/tareasPendientesOper.php');
}
else {
  
  $correo = $_SESSION['operario_login']['correo'];
  
  $tarea = new Tarea();
  $tarea->listarPendientesOper($correo);
}