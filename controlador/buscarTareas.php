<?php
function verfecha($vfecha)
{
$fch=explode("-",$vfecha);
$tfecha=$fch[2]."-".$fch[1]."-".$fch[0];
return $tfecha;
}
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
	$pagination_statement = $pdo_conn->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();