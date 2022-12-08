<?php
/**Controlador que permite listar al operario sus tareas */
  include("../modelo/modTarea.php");
  $correo=$_GET['correo'];
  $tarea=new Tarea();
  $tarea->tareasOperario($correo);  

