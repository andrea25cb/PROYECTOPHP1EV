<?php
  if ($_POST) {
      if ('andrea@gmail.com' == $_POST['correo'] && 'andrea123' == $_POST['contra']&& 'admin' == $_POST['nivel']) {
          $_SESSION['dentro'] = true;
          //$_SESSION['user_id']=...
  ?>
            <h1>BIENVENIDO, ADMIN!</h1>
            <p><a href="vista/listarTareas.php"><input type="button" class="btn btn-primary" value="INGRESAR"></input></a>
    
            <?php
          exit;
      }else if ('andrea@gmail.com' == $_POST['correo'] && 'andrea123' == $_POST['contra']&& 'operario' == $_POST['nivel']) {
        ?>
        <h1>BIENVENIDO, OPERARIO!</h1>
        <p><a href="vista/listarTareasOperario.php"><input type="button" class="btn btn-primary" value="INGRESAR"></input></a>

      }
      }else{
        $_SESSION['dentro'] = false;
        ?>
            <span style="color: red;">rellene o seleccione correctamente los campos</span>
           
            <?php
      }
  } // de _POST
    ?>
    