<?php
define("NRO_REGISTROS",3);
include("../modelo/modTarea.php");
if ($_POST) {
    $keyword = $_POST['keyword'];

    $tarea = new Tarea();
    $tarea->buscarTareas($keyword);

}