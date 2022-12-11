<?php

require_once("../modelo/modTarea.php");
include_once('../modelo/session.php');

/**Controlador de la opcion del menú que muestra las tareas pendientes del operario */
  $correo = $_SESSION['operario_login'];

  $tarea = new Tarea();
  $tarea->listarPendientesOper($correo);


