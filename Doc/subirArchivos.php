<?php

$fich_dest = "/Doc";
$subir_archivo = $fich_dest . basename($_FILES['fichero']['name']);

  if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
    move_uploaded_file($_FILES['fichero']['tmp_name'], $subir_archivo);
}