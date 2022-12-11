<?php
session_start();


//Cerrar Session
$_SESSION["correo"] = "";
session_destroy();

// Borrar cookies

header("location: ../index.php");
?>