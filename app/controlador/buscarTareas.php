<?php
/**
* @author andrea cordon
*/

/**Controlador que permite filtrar/buscar las tareas mediante un input */
define("NRO_REGISTROS",3);
include("../modelo/modTarea.php");
if ($_POST) {
    $keyword = $_POST['keyword'];

    $tarea = new Tarea();
    // $tarea->buscarTareas($keyword);

}