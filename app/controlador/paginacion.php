<?php
/**Controlador que paginará las tareas */
  include("../modelo/modTarea.php"); 
  $tarea=new Tarea();
  $tarea->paginacion();  

  for($i=1; $i<=$numeropaginas; $i++){
	if($pagina==$i){
		echo '<li class="active">
			<a href="index.php?pagina='.$i.'">'.$i.'</a>
		</li>';
	}else{
		echo '<li>
			<a href="index.php?pagina='.$i.'">'.$i.'</a>
		</li>';
	}
}
