<?php
/** 
* @author andrea cordon
*/

include(__DIR__ . '/database.php');
/**
 * [Description Usuario]
 */
class Usuario
{
/**Esta clase 'Usuario' es parte del modelo de mi proyecto, y dispone de diversos métodos, CRUD, 
 * que afectarán a los usuarios, tanto a administradores como a operarios */

 /**Insertar datos para la creación de un nuevo usuario */
    /**
     * @param mixed $nombre
     * @param mixed $correo
     * @param mixed $contra
     * @param mixed $nivel
     * 
     * @return [type]
     */
    public function insertarUsuario($nombre, $correo, $contra, $nivel)
    {
        $cc = Database::getInstance();
        $sql = "INSERT INTO usuario(nombre,correo,contra,nivel)
         VALUES(:nombre,:correo,:contra,:nivel)";
        $sql = $cc->db->prepare($sql);

        $sql->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $sql->bindParam(':correo', $correo, PDO::PARAM_STR);
        $sql->bindParam(':contra', $contra, PDO::PARAM_STR);
        $sql->bindParam(':nivel', $nivel, PDO::PARAM_STR);
        include('../vista/layout/encabezado.php'); 
        include('../vista/layout/menuA.php'); 
        echo "<h1>USUARIO CREADO CON EXITO</h1>";
        return $sql->execute();

    }

    /**Listar todos los usuarios*/
    /**
     * @return void [type]
     */
    public function listarUsuarios()
    {
        $cc = Database::getInstance();
        $sql = "SELECT * FROM usuario";
        $query = $cc->db->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            foreach ($results as $registro) {
                echo "<tr>
            <td>" . $registro->nombre . "</td>
            <td>" . $registro->correo . "</td>
            <td>*********</td>
            <td>
            <a href='../controlador/borrarUsuario.php?correo=" . $registro->correo . "'>
            <button class='btn btn-danger text-left' type='button'>BORRAR</button></a>
            <a href='../controlador/editarUsu.php?correo=" . $registro->correo . "'>
            <button class='btn btn-primary' type='button'>EDITAR</button></a>    
            
        </tr>";
            }
        }
    }
    
 /**Actualizar datos de un usuario con un correo concreto*/
    /**
     * @param mixed $nombre
     * @param mixed $correo
     * @param mixed $contra
     * 
     * @return [type]
     */
    public function editarUsuario($nombre,$correo,$contra) 
    {                 
        $cc = Database::getInstance(); 
        $sql = "UPDATE usuario SET nombre=:nombre, correo=:correo, contra=:contra WHERE correo=:correo"; 
        $sql = $cc->db->prepare($sql);
        $sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $sql->bindParam(':correo',$correo,PDO::PARAM_STR);
        $sql->bindParam(':contra',$contra,PDO::PARAM_STR);
        include('../vista/layout/encabezado.php'); 
        include('../vista/layout/menuA.php'); 
        echo '<h1>Se ha modificado el operario</h1>';
        return $sql->execute();
 } 

/**Borrar usuario con un correo concreto*/
    /**
     * @param mixed $correo
     * 
     * @return [type]
     */
    public function borrarUsuario($correo)
    {
        $cc = Database::getInstance();
        $sql = "DELETE FROM usuario WHERE correo =:correo";
        $sql = $cc->db->prepare($sql);
        $sql->bindParam(':correo',$correo,PDO::PARAM_STR);
        
        include('../vista/layout/encabezado.php'); 
        include('../vista/layout/menuA.php'); 
        
        echo '<h1>Se ha procedido a despedir el operario ' . $correo . ' </h1>';
        echo '<a href="../vista/listarUsuarios.php"><button class="btn btn-primary" type="button">VOLVER</button></a>';
        return $sql->execute();
    }
}