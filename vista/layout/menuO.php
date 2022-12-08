<link href="estilos.css" rel="stylesheet">
<table class="menu" style="
    width: 100%;
    text-align:center;
    padding: 10em;
    background: #ccffcc;
    align-items: center;
    font-size:20px;
    ">
<tr>
   <?php $correo= $_GET["correo"]?>
    <td><a href='../vista/listarTareasOperario.php?correo=luis@gmail.com'><button class="btn text-left" style="color: #ccffcc; background:green;"> MENU</button></a></td>
    <td><a href='tareasPendientesOper.php?correo="<?php $correo ?>"'><button class="btn text-left" style="color: #ccffcc; background:green;"> TAREAS PENDIENTES</button></a></td>
    <td><a href="../modelo/cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>X CERRAR SESION</button></a></td>
</tr>    
</table>