<?php
 if (!class_exists('Tarea')) {
  /**Esta clase 'Tarea' es parte del modelo de mi proyecto, y dispone de diversos métodos, CRUD, 
         * que afectarán a las tareas */

    /**
     * @author andrea
     * */

    include(__DIR__ . '/database.php');
/**
 * [Description Tarea]
 */
    class Tarea
    {
        /**Buscar tareas a través de un input buscador */
        // public function buscarTareas($keyword)
        // {
        //     $cc = Database::getInstance();
        //     $search_keyword = '';
        //     if (!empty($_POST['search']['keyword'])) {
        //         $search_keyword = $_POST['search']['keyword'];
        //     }
        //     $sql = 'SELECT * FROM tarea WHERE id LIKE :keyword OR nif LIKE :keyword OR nombre LIKE :keyword OR apellidos LIKE :keyword OR tlf LIKE :keyword
        // OR descripcion LIKE :keyword OR correo LIKE :keyword OR direccion LIKE :keyword OR poblacion OR provincia LIKE :keyword OR estadoTarea LIKE :keyword
        // OR fechaC LIKE :keyword OR anotA LIKE :keyword OR anotP LIKE :keyword ORDER BY id DESC ';

        //     /* Pagination Code starts */
        //     $per_page_html = '';
        //     $page = 1;
        //     $start = 0;
        //     if (!empty($_POST["page"])) {
        //         $page = $_POST["page"];
        //         $start = ($page - 1) * NRO_REGISTROS;
        //     }
        //     $limit = " limit " . $start . "," . NRO_REGISTROS;
        //     $pagination_statement = $cc->db->prepare($sql);
        //     $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
        //     $pagination_statement->execute();

        //     $row_count = $pagination_statement->rowCount();
        //     if (!empty($row_count)) {
        //         $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
        //         $page_count = ceil($row_count / NRO_REGISTROS);
        //         if ($page_count > 1) {
        //             for ($i = 1; $i <= $page_count; $i++) {
        //                 if ($i == $page) {
        //                     $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
        //                 } else {
        //                     $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
        //                 }
        //             }
        //         }
        //         $per_page_html .= "</div>";
        //     }

        //     $query = $sql . $limit;
        //     $pdo_statement = $cc->db->prepare($query);
        //     $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
        //     $pdo_statement->execute();
        //     $resultados = $pdo_statement->fetchAll();
        // }
        
        /**Listar todas las tareas, en todos los estados. Solo las ve el admin*/
        /**
         * @return void [type]
         */
        public function listar()
        {
            $cc = Database::getInstance();
            $sql = "SELECT * FROM tarea";
            $query = $cc->db->prepare($sql);
            $query->execute();

           $tamagno_paginas = 3;

            if (isset($_GET['pagina'])) {

                if ($_GET['pagina'] == 1) {
                    header("Location: listarTareas.php");
                } else {
                    $pagina = $_GET['pagina'];
                }
            }else{
                $pagina=1;
            }

           $empezar_desde = ($pagina - 1) * $tamagno_paginas;
           $num_filas = $query->rowCount();
           $total_paginas = ceil($num_filas / $tamagno_paginas);

        //    echo "Núm registros de la consulta: " . $num_filas;
        //    echo "<br> Mostramos: ".$tamagno_paginas." registros por página";
           echo "<br> Mostrando la página: " . $pagina . " de " . $total_paginas." <br><br>";

           $sql_limite= "SELECT * FROM tarea ORDER BY fechaR LIMIT $empezar_desde,$tamagno_paginas";
           $query = $cc->db->prepare($sql_limite);
           $query->execute();
           $results = $query->fetchAll(PDO::FETCH_OBJ);

            if ($query->rowCount() > 0) {
                foreach ($results as $registro) {
                    echo "<tr>
        <td>" . $registro->id . "</td>
        <td>" . $registro->descripcion . "</td>
        <td>" . $registro->estadoTarea . "</td>
        <td>" . $registro->fechaC . "</td>
        <td>" . $registro->nombre . "</td>
        <td>" . $registro->fechaR . "</td>
        <td>" . $registro->anotA . "</td>
        <td>" . $registro->anotP . "</td>
        <td>
        <a href='../controlador/modificarTarea.php?id=" . $registro->id . "'>
        <button class='btn btn-primary' type='button'>MODIFICAR</button></a>
        <a href='../controlador/borrarTarea.php?id=" . $registro->id . "'>
        <button class='btn btn-danger text-left' type='button'>BORRAR</button></a>
        <a href='detalles.php?id=" . $registro->id . "'>
        <button class='btn btn-primary' type='button'>DETALLES</button></a></td>      
           </tr>";
                }
            }
            //paginacion:

            for($i=1;$i<=$total_paginas;$i++){
                echo "<a style='background-color:lightgreen;margin:2px;border:2px solid green;
                color:green;font-weight:bold;text-decoration: none;' href='?pagina= ".$i."'> ".$i." </a>";
            }

        }

        /**Listar todas las tareas del usuario;  pendientes, realizadas y canceladas*/
        /**
         * @param mixed $correo
         * 
         * @return void [type]
         */
        public function tareasOperario($correo)
        {
            $cc = Database::getInstance();
            $sql = "SELECT * FROM tarea WHERE correo ='$correo'";
            $query = $cc->db->prepare($sql);
            $query->execute();

           $tamagno_paginas = 3;

            if (isset($_GET['pagina'])) {

                if ($_GET['pagina'] == 1) {
                    header("Location: listarTareasOperario.php");
                } else {
                    $pagina = $_GET['pagina'];
                }
            }else{
                $pagina=1;
            }

           $empezar_desde = ($pagina - 1) * $tamagno_paginas;
           $num_filas = $query->rowCount();
           $total_paginas = ceil($num_filas / $tamagno_paginas);
           echo "<br> Mostrando la página: " . $pagina . " de " . $total_paginas." <br><br>";

            $sql = "SELECT * FROM tarea WHERE correo ='$correo' ORDER BY fechaR LIMIT $empezar_desde,$tamagno_paginas";
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
        <td>" . $registro->nombre . "</td>
        <td>" . $registro->fechaR . "</td>
        <td>" . $registro->anotA . "</td>
        <td>" . $registro->anotP . "</td>
        <td>
        <a href='detalles.php?id=" . $registro->id . "''>
        <button class='btn btn-primary' type='button'>DETALLES</button></a></td>      
           </tr>";  
         
                }
            }

            for($i=1;$i<=$total_paginas;$i++){
                echo "<a style='background-color:lightgreen;margin:2px;border:2px solid green;
                color:green;font-weight:bold;text-decoration: none;' href='?pagina= ".$i."'> ".$i." </a>";
            }
        }

        /**TODAS LAS TAREAS PENDIENTES POR HACER, solo las verá el admin*/
        /**
         * @return void [type]
         */
        public function listarPendientes()
        {
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
        <td>" . $registro->nombre . "</td>
        <td>" . $registro->fechaR . "</td>
        <td>" . $registro->anotA . "</td>
        <td>" . $registro->anotP . "</td>
        <td>
        <a href='../controlador/modificarTarea.php?id=" . $registro->id . "''>
        <button class='btn btn-primary' type='button'>MODIFICAR</button></a>
        <a href='../controlador/borrarTarea.php?id=" . $registro->id . "'>
        <button class='btn btn-danger text-left' type='button'>BORRAR</button></a>
        <a href='detalles.php?id=" . $registro->id . "''>
        <button class='btn btn-primary' type='button'>DETALLES</button></a></td>      
           </tr>";
                }

            }
        }

        /**Lista de tareas pendientes de un operario con un correo concreto, cuyo valor se cogerá en el login */
        /**
         * @param mixed $correo
         * 
         * @return void [type]
         */
        public function listarPendientesOper($correo)
        {
            $cc = Database::getInstance();
            $sql = "SELECT * FROM tarea WHERE estadoTarea='Esperando a ser aprobada' AND correo ='$correo'";
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
        <td>" . $registro->nombre . "</td>
        <td>" . $registro->fechaR . "</td>
        <td>" . $registro->anotA . "</td>
        <td>" . $registro->anotP . "</td>
        <td>
        <a href='../controlador/completarTarea.php?id=" . $registro->id . "''>
            <button class='btn btn-primary' type='button'>COMPLETAR TAREA</button></a>
            <a href='detalles.php?id=" . $registro->id . "''>
        <button class='btn btn-primary' type='button'>DETALLES</button></a></td>      
           </tr>";
                }

            }
        }

        /**Insertar nueva tarea */
        /**
         * @param mixed $reg
         * 
         * @return [type]
         */
        public function insertar($reg)
        {
            $cc = Database::getInstance();
            $sql = "INSERT INTO tarea(nif,nombre,apellidos,tlf,descripcion,correo,direccion,poblacion,cp,provincia,estadoTarea,
        fechaC,operario,fechaR,anotA,anotP,foto,fichero) VALUES(:nif,:nombre,:apellidos,:tlf,:descripcion,:correo,:direccion,:poblacion,:cp,:provincia,:estadoTarea,:fechaC,:operario,:fechaR,:anotA,:anotP,:fichero)";
            $sql = $cc->db->prepare($sql);

            echo "<h1>TAREA INSERTADA</h1>";
            return $sql->execute($reg);
        }

        /**Ver detalles de una tarea con un id concreto*/
        /**
         * @param mixed $id
         * 
         * @return void [type]
         */
        public function verDetalles($id)
        {
            $cc = Database::getInstance();
            $sql = "SELECT * FROM tarea WHERE id = $id";
            $query = $cc->db->prepare($sql);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);

            if ($query->rowCount() > 0) {
                foreach ($results as $registro) {
                    echo "<tr>
            <td>" . $registro->id . "</td>
            <td>" . $registro->nif . "</td>
            <td>" . $registro->nombre . "</td>
            <td>" . $registro->apellidos . "</td>
            <td>" . $registro->tlf . "</td>
            <td>" . $registro->descripcion . "</td>
            <td>" . $registro->correo . "</td>
            <td>" . $registro->direccion . "</td>
            <td>" . $registro->poblacion . "</td>
            <td>" . $registro->cp . "</td>
            <td>" . $registro->provincia . "</td>
            <td>" . $registro->estadoTarea . "</td>
            <td>" . $registro->fechaC . "</td>
            <td>" . $registro->operario . "</td>
            <td>" . $registro->fechaR . "</td>
            <td>" . $registro->anotA . "</td>
            <td>" . $registro->anotP . "</td>
            <td>" . $registro->fichero . "</td></tr>";
                }
            }
        }

        /**Actualizar datos de una tarea con un id concreto*/
        /**
         * @param mixed $reg
         * 
         * @return [type]
         */
        public function actualizar($reg)
        {
            $cc = Database::getInstance();
            $sql = "UPDATE tarea SET nif = :nif,nombre=:nombre,apellidos=:apellidos,tlf=:tlf,descripcion=:descripcion,correo=:correo,
        direccion=:direccion,poblacion=:poblacion,cp=:cp,provincia=:provincia,estadoTarea=:estadoTarea,fechaC=:fechaC,operario=:operario,
        fechaR=:fechaR,anotA=:anotA,anotP=:anotP,fichero=:fichero WHERE id=:id";
            $sql = $cc->db->prepare($sql);

            echo '<h1>Se ha actualizado</h1>';
            echo '<a href="../vista/listarTareas.php"><button class="btn btn-primary" type="button">VOLVER</button></a>';
            return $sql->execute($reg);
        }

        /**Completar tarea de un operario*/
        /**
         * @param mixed $reg
         * 
         * @return [type]
         */
        public function completarTarea($reg)
        {
            $cc = Database::getInstance();
            $sql = "UPDATE tarea SET estadoTarea=:estadoTarea,
        fechaR=:fechaR,anotP=:anotP WHERE id=:id";
            $sql = $cc->db->prepare($sql);

            echo '<h1>Se ha completado la tarea</h1>';
            echo '<a href="../vista/listarTareasOperario.php"><button class="btn btn-primary" type="button">VOLVER</button></a>';
            return $sql->execute($reg);
        }

        /**
         * Borrar los datos de una tarea con un id concreto
         * @param mixed $id
         * @return void
         */
        public function borrar($id)
        {
            $cc = Database::getInstance();
            $sql = "DELETE FROM tarea WHERE id = $id";
            $query = $cc->db->prepare($sql);
           
            include('../vista/layout/encabezado.php');
            include('../vista/layout/menuA.php');
            echo '<h1>Se ha procedido a borrar la tarea ' . $id . ' </h1>';
            $query->execute();
        }

    // public function listaOperarios(){
    // echo '<select name="operario"><option></option>';
    // $cc = Database::getInstance(); 
    // $sql = "SELECT operario FROM tarea";        
    // $query= $cc->db->prepare($sql); 
    // $query->execute();
    // $results = $query -> fetchAll(PDO::FETCH_OBJ); 

    // if($query -> rowCount() > 0)   { 
    // foreach($results as $registro) { 
    //     echo "<option value='".$registro->operario."'>".$registro->operario."</option>";
    //      }
    // }
    // echo '</select>';
    // }

    }
}