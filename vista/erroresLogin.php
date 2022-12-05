<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<?php
$errores=[];

 

function VerError($campo) {
    global $errores;
    if (isset($errores[$campo])) {
        return '<span style="color:red">'.$errores[$campo].'</span>';
    }
    else {
        return '';
    }
}




     
        if ($_POST) {   
             // Han enviado datos
            // Filtro datos
            /**VALIDACIONES:  */
            $correo = filter_input(INPUT_POST, 'correo');
             
            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo']='Dirección de correo no válida';
            }

            if (filter_input(INPUT_POST, 'contra')=='') {
            $errores['contra']='No puede estar vacío';
            }

        
             if ($errores /* count($errores)>0*/ ) {
                  include('index.php');
              }
              else {
                /*si no hay errores, insertamos los datos*/
                require_once(".php"); 
              }

        }else {
    // Es la primera vez
    include('index.php');
        }
?>
</body>
</html>