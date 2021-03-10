<?php

print_r($_POST);
$dir_subida = 'subidas/';
$fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);

if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
	chmod($fichero_subido, 0777);
  echo "El fichero es válido y se subió con éxito.\n";
  echo '<img src="https://'.$_SERVER['SERVER_NAME'].'/'.$fichero_subido.'">';
} else {
  echo "¡Error al subir el archivo!\n";
}





?>