<?php
  include("../modelo/modTarea.php");
/**Controlador que permite listar al operario sus tareas */
session_start();

if (!$_POST) {
  print_r($_SESSION['operario_login']);

  include('../vista/listarTareasOperario.php');
}
else {
  
  $correo = $_SESSION["operario_login"];

  $tarea = new Tarea();
  $tarea->tareasOperario($correo);

}