<?php 

include(__DIR__ . '/database.php');
class Tarea  { 

         /**Para coger los valores y mostrarlos en los inputs: */
    function valores($id){
        $cc = Database::getInstance();
        $sql = "SELECT * FROM tarea WHERE id = $id";
        $query = $cc->db->prepare($sql);
        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $registro) {
                $registro->id;
                $registro->nif;
                $registro->nombre;
                $registro->apellidos;
                $registro->tlf;
                $registro->descripcion;
                $registro->correo;
                $registro->direccion;
                $registro->poblacion;
                $registro->cp;
                $registro->provincia;
                $registro->estadoTarea;
                $registro->fechaC;
                $registro->operario;
                $registro->fechaR;
                $registro->anotA;
                $registro->anotP;
                $registro->foto;
                $registro->fichero;
            }
        }
    }

    function verfecha($vfecha)
{
    $fch=explode("-",$vfecha);
    $tfecha=$fch[2]."-".$fch[1]."-".$fch[0];
    return $tfecha;
}

    /**Buscar tareas a través de un input buscador */
    public function buscarTareas($keyword){
        $cc = Database::getInstance();
        $search_keyword = '';
	    if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
        $sql = 'SELECT * FROM tarea WHERE id LIKE :keyword OR nif LIKE :keyword OR nombre LIKE :keyword OR apellidos LIKE :keyword OR tlf LIKE :keyword
        OR descripcion LIKE :keyword OR correo LIKE :keyword OR direccion LIKE :keyword OR poblacion OR provincia LIKE :keyword OR estadoTarea LIKE :keyword
        OR fechaC LIKE :keyword OR anotA LIKE :keyword OR anotP LIKE :keyword ORDER BY id DESC ';
    
        /* Pagination Code starts */
        $per_page_html = '';
        $page = 1;
        $start=0;
        if(!empty($_POST["page"])) {
            $page = $_POST["page"];
            $start=($page-1) * NRO_REGISTROS;
        }
        $limit=" limit " . $start . "," . NRO_REGISTROS;
        $pagination_statement = $cc->db->prepare($sql);
        $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
        $pagination_statement->execute();

        $row_count = $pagination_statement->rowCount();
        if(!empty($row_count)){
            $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
            $page_count=ceil($row_count/NRO_REGISTROS);
            if($page_count>1) {
                for($i=1;$i<=$page_count;$i++){
                    if($i==$page){
                        $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
                    } else {
                        $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
                    }
                }
            }
            $per_page_html .= "</div>";
	}
	
	$query = $sql.$limit;
	$pdo_statement = $cc->db->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$resultados = $pdo_statement->fetchAll();
    }
        /**Listar todas las tareas*/
        public function listar(){
            $cc = Database::getInstance();
            $sql = "SELECT * FROM tarea ORDER BY fechaR";
            $query = $cc->db->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            //Query
    
            if ($query->rowCount() > 0) {
                foreach ($results as $registro) {
        echo "<tr>
        <td>" . $registro->id . "</td>
        <td>" . $registro->descripcion . "</td>
        <td>" . $registro->estadoTarea . "</td>
        <td>" . $registro->fechaC . "</td>
        <td>" . $registro->operario . "</td>
        <td>" . $registro->fechaR . "</td>
        <td>" . $registro->anotA . "</td>
        <td>" . $registro->anotP . "</td>
        <td>
        <a href='../controlador/modificarTarea.php?id=" . $registro->id . "'>
        <button type='button'>MODIFICAR</button></a>
        <a href='confirmar.php?id=" . $registro->id . "'>
        <button type='button'>BORRAR</button></a>
        <a href='detalles.php?id=" . $registro->id . "'>
        <button type='button'>DETALLES</button></a></td>      
           </tr>";
          }
            }
        }

         /**Listar todas las tareas*/
         public function tareasOperario($correo){ 
            $cc = Database::getInstance();
            $sql = "SELECT * FROM tarea WHERE correo=' $correo'";
            $query = $cc->db->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            //Query
    
            if ($query->rowCount() > 0) {
                foreach ($results as $registro) {
        echo "<tr>
        <td>" . $registro->id . "</td>
        <td>" . $registro->descripcion . "</td>
        <td>" . $registro->estadoTarea . "</td>
        <td>" . $registro->fechaC . "</td>
        <td>" . $registro->operario . "</td>
        <td>" . $registro->fechaR . "</td>
        <td>" . $registro->anotA . "</td>
        <td>" . $registro->anotP . "</td>
        <td>
        <a href='../vista/errores_modificar.php?id=<?= $registro->id ?>'>
            <button type='button'>COMPLETAR TAREA</button></a>
            <a href='../modelo/verdetalles.php?id=<?= $registro->id ?>'>
            <button type='button'>VER DETALLES</button></a></td>    
           </tr>";
          }
            }
        }

/**TODAS LAS TAREAS PENDIENTES POR HACER*/
        public function listarPendientes(){
            $cc = Database::getInstance();
            $sql = "SELECT * FROM tarea WHERE estadoTarea='Esperando a ser aprobada'";
            $query = $cc->db->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            //Query
    
            if ($query->rowCount() > 0) {
                foreach ($results as $registro) {
        echo "<tr>
        <td>" . $registro->id . "</td>
        <td>" . $registro->descripcion . "</td>
        <td>" . $registro->estadoTarea . "</td>
        <td>" . $registro->fechaC . "</td>
        <td>" . $registro->operario . "</td>
        <td>" . $registro->fechaR . "</td>
        <td>" . $registro->anotA . "</td>
        <td>" . $registro->anotP . "</td>
        <td>
        <a href='errores_modificar.php?id=" . $registro->id . "''>
        <button type='button'>MODIFICAR</button></a>
        <a href='confirmar.php?id=" . $registro->id . "'>
        <button type='button'>BORRAR</button></a>
        <a href='detalles.php?id=" . $registro->id . "''>
        <button type='button'>DETALLES</button></a></td>      
           </tr>";
          }
              
            }
        }

        public function listarPendientesOper($correo){
            $cc = Database::getInstance();
            $sql = "SELECT * FROM tarea ORDER BY fechaR WHERE estadoTarea='Esperando a ser aprobada' AND correo='$correo'";
            $query = $cc->db->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            //Query
    
            if ($query->rowCount() > 0) {
                foreach ($results as $registro) {
        echo "<tr>
        <td>" . $registro->id . "</td>
        <td>" . $registro->descripcion . "</td>
        <td>" . $registro->estadoTarea . "</td>
        <td>" . $registro->fechaC . "</td>
        <td>" . $registro->operario . "</td>
        <td>" . $registro->fechaR . "</td>
        <td>" . $registro->anotA . "</td>
        <td>" . $registro->anotP . "</td>
        <td>
        <a href='../vista/errores_modificar.php?id=' . $registro->id . '>
            <button type='button'>COMPLETAR TAREA</button></a>
            <a href='../modelo/verdetalles.php?id=' . $registro->id . '>
            <button type='button'>VER DETALLES</button></a></td>      
           </tr>";
          }
                include('pie.php');
            }
        }

    /*insertar tarea */
    public function insertar($nif,$nombre,$apellidos,$tlf,$descripcion,$correo,$direccion,$poblacion,$cp,$provincia,
    $estadoTarea,$fechaC,$operario,$fechaR,$anotA,$anotP,$foto,$fichero) {         
        $cc = Database::getInstance(); 
        $sql="INSERT INTO tarea(nif,nombre,apellidos,tlf,descripcion,correo,direccion,poblacion,cp,provincia,estadoTarea,
        fechaC,operario,fechaR,anotA,anotP,foto,fichero)
         VALUES(:nif,:nombre,:apellidos,:tlf,:descripcion,:correo,:direccion,:poblacion,:cp,:provincia,:estadoTarea,
         :fechaC,:operario,:fechaR,:anotA,:anotP,:foto,:fichero)";
        $sql = $cc->db->prepare($sql);
    
            $sql->bindParam(':nif',$nif,PDO::PARAM_STR);
            $sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
            $sql->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
            $sql->bindParam(':tlf',$tlf,PDO::PARAM_INT);
            $sql->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
            $sql->bindParam(':correo',$correo,PDO::PARAM_STR, 100);
            $sql->bindParam(':direccion',$direccion,PDO::PARAM_STR, 200);
            $sql->bindParam(':poblacion',$poblacion,PDO::PARAM_STR);
            $sql->bindParam(':cp',$cp,PDO::PARAM_INT);
            $sql->bindParam(':provincia',$provincia,PDO::PARAM_STR);
            $sql->bindParam(':estadoTarea',$estadoTarea,PDO::PARAM_STR, 25);
            $sql->bindParam(':fechaC',$fechaC,PDO::PARAM_STR, 25);
            $sql->bindParam(':operario',$operario,PDO::PARAM_STR);
            $sql->bindParam(':fechaR',$fechaR,PDO::PARAM_STR);
            $sql->bindParam(':anotA',$anotA,PDO::PARAM_STR);
            $sql->bindParam(':anotP',$anotP,PDO::PARAM_STR, 25);
            $sql->bindParam(':foto',$foto,PDO::PARAM_STR);
            $sql->bindParam(':fichero',$fichero,PDO::PARAM_STR);
                
            $sql->execute();

            $lastInsertId = $cc->db->lastInsertId();
            echo "<h1>TAREA INSERTADA</h1>";
    } 

    /*Paginacion*/
    // public static function getAll($page = 1, $qty = 5){
    //     $cc = Database::getInstance(); 
    //     $sql = "SELECT * from tarea LIMIT ? OFFSET ?";
    //     if($page <= 0) $page = 1;  
    //     $query= $cc->db->prepare($sql, array($qty, $qty * ($page-1)));
    //     $query->execute();
      
    //     return $query->fetchAll();
    //   }

    /**Ver detalles de una tarea concreta*/
    public function verDetalles($id) { 
    $cc = Database::getInstance(); 
    $sql = "SELECT * FROM tarea WHERE id = $id";        
    $query= $cc->db->prepare($sql); 
    $query->execute();
    
        $results = $query -> fetchAll(PDO::FETCH_OBJ); 

        if($query -> rowCount() > 0)   { 
        foreach($results as $registro) { 
            echo "<tr>
            <td>".$registro->id."</td>
            <td>".$registro->nif."</td>
            <td>".$registro->nombre."</td>
            <td>".$registro->apellidos."</td>
            <td>".$registro->tlf."</td>
            <td>".$registro->descripcion."</td>
            <td>".$registro->correo."</td>
            <td>".$registro->direccion."</td>
            <td>".$registro->poblacion."</td>
            <td>".$registro->cp."</td>
            <td>".$registro->provincia."</td>
            <td>".$registro->estadoTarea."</td>
            <td>".$registro->fechaC."</td>
            <td>".$registro->operario."</td>
            <td>".$registro->fechaR."</td>
            <td>".$registro->anotA."</td>
            <td>".$registro->anotP."</td>
            <td>".$registro->foto."</td>
            <td>".$registro->fichero."</td></tr>";
                } 
            }
}

 /**Actualizar datos de una tarea concreta*/
    public function actualizar($reg) {                 
        $cc = Database::getInstance(); 
        $sql = "UPDATE tarea SET nif = :nif,nombre=:nombre,apellidos=:apellidos,tlf=:tlf,descripcion=:descripcion,correo=:correo,
        direccion=:direccion,poblacion=:poblacion,cp=:cp,provincia=:provincia,estadoTarea=:estadoTarea,fechaC=:fechaC,operario=:operario,
        fechaR=:fechaR,anotA=:anotA,anotP=:anotP,foto=:foto,fichero=:fichero WHERE id=:id"; 
            $sql = $cc->db->prepare($sql);

            //$sql->bindParam(':id',$reg,PDO::PARAM_INT);
             echo '<h1>Se ha actualizado</h1>';
             echo '<a href="../vista/listarTareas.php"><button type="button">VOLVER</button></a>';
             return $sql->execute($reg);
                  
    } 
    
    public function borrar($id){
        $cc = Database::getInstance(); 
        $sql = "DELETE FROM tarea WHERE id = $id";        
        $query= $cc->db->prepare($sql); 
        $query->execute();
        include('../vista/encabezado.php');
        include('../vista/menuA.php'); 
        $results = $query -> fetch(PDO::FETCH_OBJ); 
        echo '<h1>Se ha procedido a borrar la tarea '.$id.' </h1>';
        echo '<a href="../vista/listarTareas.php"><button type="button">VOLVER</button></a>';
    }  

    public function listaOperarios(){
    echo '<select name="operario"><option></option>';
    $cc = Database::getInstance(); 
    $sql = "SELECT operario FROM tarea";        
    $query= $cc->db->prepare($sql); 
    $query->execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ); 

    if($query -> rowCount() > 0)   { 
    foreach($results as $registro) { 
        echo "<option value='".$registro->operario."'>".$registro->operario."</option>";
         }
    }
    echo '</select>';
    }

} 
