<?php
  include('../vista/listarTareasOperario.php');

  include("../modelo/modTarea.php");
/**Controlador que permite listar al operario sus tareas */

if ($_POST) {
  // 1º vez

  $correo = $_REQUEST["correo"];

  $tarea = new Tarea();
  $tarea->tareasOperario($correo);

}