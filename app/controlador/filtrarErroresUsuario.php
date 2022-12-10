<?php
/**Controlador que permite filtrar los posibles errores de un formulario de alta*/
$errores=[];

if (!defined('FILTRAR_ERRORES')) {
    define('FILTRAR_ERRORES', 1);

    function VerError($campo)
    {
        global $errores;
        if (isset($errores[$campo])) {
            return '<span style="color:red">' . $errores[$campo] . '</span>';
        } else {
            return '';
        }
    }

    /**VALIDACIONES:  */
    function filtrarErrores()
    {
        $errores = [];

        $correo = filter_input(INPUT_POST, 'correo');
 
        if (filter_input(INPUT_POST, 'nombre') == '') {
            $errores['nombre'] = 'No puede estar vacío';
        }
        if (filter_input(INPUT_POST, 'contra') == '') {
            $errores['contra'] = 'No puede estar vacío';
        }
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = 'Dirección de correo no válida';
        }

        return $errores;
    }
}