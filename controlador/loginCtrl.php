<?php
/**Controlador que coge los datos de los inputs del login, para luego comprobarlos */
require_once("../modelo/modLogin.php");
if ($_POST) {
    $correo = filter_input(INPUT_POST, 'correo');
    $contra = filter_input(INPUT_POST, 'contra');
    $login = new Login();
    $login->login($correo, $contra);

}