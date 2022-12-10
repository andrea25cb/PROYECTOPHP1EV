<?php
include_once '../modelo/class.AutoPagination.php';
$obj = new AutoPagination(20, $_GET['page']); // 50 is the total record count
echo $obj->_paginateDetails();
?>