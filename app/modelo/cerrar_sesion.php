<?php
session_start();

require "Clases.php";
$util = new Util();

//Cerrar Session
$_SESSION["correo"] = "";
session_destroy();

// Borrar cookies
$util->clearAuthCookie();

header("location: ../index.php");
?>