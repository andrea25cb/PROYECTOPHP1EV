<?php
/**Controlador que permite listar al operario sus tareas */
  require_once("../modelo/modTarea.php");
  $correo=$_GET['correo'];
  $tarea=new Tarea();
  $tarea->tareasOperario($correo);  

