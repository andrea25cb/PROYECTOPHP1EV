<?php

$nombre_archivo = $_FILES['fichero']['tmp_name'];
//mostraremos el archivo subido con readfile.
if(is_uploaded_file($nombre_archivo)){
              header('Content-Description: File Transfer');
              header('Content-Type: '.mime_content_type($nombre_archivo));
              //gracias a mime_content_type podemos leer cualquier archivo
              header('Expires: 0');
              header('Cache-Control: must-revalidate');
              header('Pragma: public');
              header('Content-Length: ' . filesize($nombre_archivo));
              readfile($nombre_archivo);
}else{
           print("NO SE HA PODIDO SUBIR EL FICHERO\n");
}