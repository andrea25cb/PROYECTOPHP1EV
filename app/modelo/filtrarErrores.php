<?php
/** 
* @author andrea cordon
*/

/**Controlador que permite filtrar los posibles errores de un formulario de alta*/
$errores=[];

if (!defined('FILTRAR_ERRORES')) {
    define('FILTRAR_ERRORES', 1);

    /**
     * @param mixed $tlf
     * 
     * @return [type]
     */
    function validarTelefono($tlf)
    {
        $a = "^[0-9]{3}[0-9]{3}[0-9]{3}$";
        if (preg_match("/$a/", $tlf)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param mixed $campo
     * 
     * @return [type]
     */
    function VerError($campo)
    {
        global $errores;
        if (isset($errores[$campo])) {
            return '<span style="color:red">' . $errores[$campo] . '</span>';
        } else {
            return '';
        }
    }

    /**
     * @param mixed $dni
     * 
     * @return [type]
     */
    function validarNie($dni)
    {
        $dnisL = substr($dni, 0, -1);
        $letra = substr($dni, -1);
        $lista = "TRWAGMYFPDXBNJZSQVHLCKE";
        $arLista = str_split($lista);

        if (strlen($dnisL) == 8 && is_numeric($dnisL)) {
            $resultado = (int) $dnisL % 23;
            $letraAsign = $arLista[$resultado];
            if ($letra == $letraAsign) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @param mixed $fecha
     * 
     * @return [type]
     */
    function validarFecha($fecha)
    {
        $fecha = new DateTime($fecha);
        $hoy = new DateTime();
        if ($fecha <= $hoy) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param mixed $nombre_archivo
     * 
     * @return [type]
     */
    function insertarFichero($nombre_archivo)
    {
        $fich_dest ="../files/";
        $nombre_archivo = $fich_dest . basename($_FILES['fichero']['name']);
     
        if(is_uploaded_file( $_FILES['fichero']['tmp_name'])){
     
            move_uploaded_file($_FILES['fichero']['tmp_name'],$nombre_archivo);
        }
    }

    /**
     * @return [type]
     */
    function filtrarErroresCompletar()
    {
        $errores = [];

        if (filter_input(INPUT_POST, 'estadoTarea') == '') {
            $errores['estadoTarea'] = 'Debe seleccionar un estado de la tarea';
        }

        if (filter_input(INPUT_POST, 'provincia') == "") {
            $errores['provincia'] = 'Debe seleccionar una provincia';
        }
        return $errores;
    }

    /**VALIDACIONES:  */
    /**
     * @return [type]
     */
    function filtrarErrores()
    {
        $errores = [];
        $nif = filter_input(INPUT_POST, 'nif');
        $tlf = filter_input(INPUT_POST, 'tlf');
        $fechaR = filter_input(INPUT_POST, 'fechaR');
        $correo = filter_input(INPUT_POST, 'correo');

        if (validarNie($nif) == false) {
            $errores['nif'] = 'NIF erróneo';
        }
        if (filter_input(INPUT_POST, 'nombre') == '') {
            $errores['nombre'] = 'No puede estar vacío';
        }
        if (filter_input(INPUT_POST, 'apellidos') == '') {
            $errores['apellidos'] = 'No puede estar vacío';
        }
        if (filter_input(INPUT_POST, 'descripcion') == '') {
            $errores['descripcion'] = 'No puede estar vacío';
        }
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = 'Dirección de correo no válida';
        }

        if (filter_input(INPUT_POST, 'cp') < 5) {
            $errores['cp'] = 'CP debe tener 5 caracteres';
        }
        if (filter_input(INPUT_POST, 'estadoTarea') == '') {
            $errores['estadoTarea'] = 'Debe seleccionar un estado de la tarea';
        }

        if (validarTelefono($tlf) == false) {
            $errores['tlf'] = 'Número inválido';
        }

        if(validarFecha($fechaR)==false) {
            $errores['fechaR']='Debe ser posterior a la fecha de creación';
           }

        if (filter_input(INPUT_POST, 'provincia') == "") {
            $errores['provincia'] = 'Debe seleccionar una provincia';
        }
        return $errores;
    }

    /**
     * @return [type]
     */
    function filtrarErroresModificar()
    {
        $errores = [];
        $nif = filter_input(INPUT_POST, 'nif');
        $tlf = filter_input(INPUT_POST, 'tlf');
        $fechaR = filter_input(INPUT_POST, 'fechaR');
        $correo = filter_input(INPUT_POST, 'correo');

        if (validarNie($nif) == false) {
            $errores['nif'] = 'NIF erróneo';
        }
        if (filter_input(INPUT_POST, 'nombre') == '') {
            $errores['nombre'] = 'No puede estar vacío';
        }
        if (filter_input(INPUT_POST, 'apellidos') == '') {
            $errores['apellidos'] = 'No puede estar vacío';
        }
        if (filter_input(INPUT_POST, 'descripcion') == '') {
            $errores['descripcion'] = 'No puede estar vacío';
        }
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = 'Dirección de correo no válida';
        }

        if (filter_input(INPUT_POST, 'cp') < 5) {
            $errores['cp'] = 'CP debe tener 5 caracteres';
        }
        if (filter_input(INPUT_POST, 'estadoTarea') == '') {
            $errores['estadoTarea'] = 'Debe seleccionar un estado de la tarea';
        }

        if (validarTelefono($tlf) == false) {
            $errores['tlf'] = 'Número inválido';
        }

        if (filter_input(INPUT_POST, 'provincia') == "") {
            $errores['provincia'] = 'Debe seleccionar una provincia';
        }
        return $errores;
    }

}