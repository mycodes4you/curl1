<?php

if(!empty($_POST)){ 
	//print_r($_POST); 
}
$datos = $_POST['Datos'];
$datos_array = json_decode($datos, true);
echo '<pre>';
print_r($datos_array);
echo '</pre>';

$dir_subida = '../subidasweb/';
$fichero_subido = $dir_subida . $datos_array['user'].'-'.basename($_FILES['archivo']['name']);

if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
	chmod($fichero_subido, 0777);
  echo "El fichero es válido y se subió con éxito.<br>";
  echo '<img src="https://'.$_SERVER['SERVER_NAME'].'/'.$fichero_subido.'">';
} else {
  echo "¡Error al subir el archivo!\n";
}





?>