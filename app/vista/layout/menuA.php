
<table class="menu" style="
    width: 100%;
    text-align:center;
    background: #ccffcc;
    align-items: center;
    font-size:20px;
    ">
<tr>
<?=include_once('../modelo/session.php');?>
    <td><a href='../vista/listarTareas.php'><button class="btn text-left" style="color: #ccffcc; background:green;"> MENU</button></a></td>
    <td><a href='tareasPendientesAdmin.php'><button class="btn text-left" style="color: #ccffcc; background:green;"> VER TAREAS PENDIENTES</button></a></td>
    <td><a href='../vista/listarUsuarios.php'><button class="btn text-left" style="color: #ccffcc; background:green;"> LISTAR OPERARIOS</button></a></td>
    <td><a href="../modelo/cerrar_sesion.php"><button class="btn btn-danger text-left">X CERRAR SESION</button></a></td>
    <td style="float:right; margin-right:50px">Sesion iniciada a las: <?=$_SESSION['hora_conexion'] ?></td></tr>    
</table>
