<?php

require_once("../modelo/modTarea.php");
include_once('../modelo/session.php');

/**Controlador que permite listar al operario sus tareas */

  $correo = $_SESSION['operario_login'];

  $tarea = new Tarea();
  $tarea->tareasOperario($correo);

