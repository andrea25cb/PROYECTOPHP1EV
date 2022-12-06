<?php
$errores=[];

 function validarTelefono($tlf){
     $a = "^[0-9]{3}[0-9]{3}[0-9]{3}$";
     if (preg_match("/$a/", $tlf)) {
         return true;
     } else {
         return false;
     }
 }

function VerError($campo) {
    global $errores;
    if (isset($errores[$campo])) {
        return '<span style="color:red">'.$errores[$campo].'</span>';
    }
    else {
        return '';
    }
}

function validarNie($dni){
        $dnisL = substr($dni, 0, -1);
        $letra = substr($dni, -1);
        $lista = "TRWAGMYFPDXBNJZSQVHLCKE";
        $arLista = str_split($lista);

        if (strlen($dnisL) == 8 && is_numeric($dnisL)) {
            $resultado = (int)$dnisL % 23;
            $letraAsign = $arLista[$resultado];
            if ($letra == $letraAsign) {
                return true;
            } else {
              return false;
            }
        }
}

function validarFecha($fecha){
    $fecha = new DateTime($fecha);
    $hoy = new DateTime();
    if ($fecha <= $hoy) {
        return false;
    } else {
        return true;
    }
}

        if ($_POST) {
             // Han enviado datos
            // Filtro datos
            /**VALIDACIONES:  */
            $nif = filter_input(INPUT_POST, 'nif');
            $tlf = filter_input(INPUT_POST, 'tlf');
            $fechaR = filter_input(INPUT_POST, 'fechaR');
            $correo = filter_input(INPUT_POST, 'correo');

            if (validarNie($nif)==false) {
              $errores['nif']='NIF erróneo';
             }
             if (filter_input(INPUT_POST, 'nombre')=='') {
                $errores['nombre']='No puede estar vacío';
             }
            if (filter_input(INPUT_POST, 'apellidos')=='') {
                 $errores['apellidos']='No puede estar vacío';
             }
             if (filter_input(INPUT_POST, 'descripcion')=='') {
              $errores['descripcion']='No puede estar vacío';
            }
            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo']='Dirección de correo no válida';
              }

              if (filter_input(INPUT_POST, 'cp')<5) {
                $errores['cp']='CP debe tener 5 caracteres';
             }
             if (filter_input(INPUT_POST, 'estadoTarea')==''){
                 $errores['estadoTarea']='Debe seleccionar un estado de la tarea';
             }

             if(validarTelefono($tlf)==false) {
              $errores['tlf']='Número inválido';
            }

             if (filter_input(INPUT_POST, 'provincia')=="") {
                 $errores['provincia']='Debe seleccionar una provincia';
             }

            //  if(validarFecha($fechaR)==false) {
            //   $errores['fechaR']='Debe ser posterior a la fecha de creación';
            //  }
            // print_r($errores);
            // exit;
             if ($errores /* count($errores)>0*/ ) {
                  include('modificar.php');
              }
              else {
                /*si no hay errores, insertamos los datos*/ //NO SE POR QUÉ NO LLEGA AQUÍ NUNCA!!!
                require_once("modificada.php");
               }

        }else {
    // Es la primera vez
    include('modificar.php');
        }
?>
</body>
</html>