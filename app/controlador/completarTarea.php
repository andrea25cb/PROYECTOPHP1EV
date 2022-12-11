<?php
/** 
* @author andrea cordon
*/

/**Controlador de la opcion 'modificar' que permite editar los datos de una tarea*/
include("../modelo/modTarea.php");
// include('filtrarErrores.php');

$id=$_GET['id'];
    /**Para coger los valores y mostrarlos en los inputs: */
    $cc = Database::getInstance();
    $sql="SELECT * FROM tarea WHERE id = $id";
    $query= $cc->db->prepare($sql);
    $query->execute();

$registro = $query -> fetch(PDO::FETCH_OBJ);

if (!$_POST) {
    // 1º vez

    include('../vista/completarTareaOperario.php');
}
else {

//    $errores = filtrarErroresCompletar();

    $fichero = $_FILES['fichero']['tmp_name'];

//  if ($errores){
    include('../vista/completarTareaOperario.php');
//  }else{
        $reg = [
            'id' => filter_input(INPUT_POST, 'id'),
            'estadoTarea' => filter_input(INPUT_POST, 'estadoTarea'),
            'fechaR' => filter_input(INPUT_POST, 'fechaR'),
            'anotP' => filter_input(INPUT_POST, 'anotP'),
            // 'fichero' => $fichero,
        ];

    $tarea=new Tarea();
    $tarea->completarTarea($reg);
    // insertarFichero($fichero);
}
//}