<?php
/*
if(!empty($_POST)){ 
	//print_r($_POST); 
}
if(!empty($_FILES)){ 
	//http_response_code(200);
	//print_r($_FILES); 
	//echo 'El archivo se recibio de manera correcta';
	$respuesta = 'El archivo se recibio de manera correcta';
	echo $respuesta;
}else{
	//http_response_code(403);
	//echo 'El archivo no se pudo recibir';
	$respuesta = 'El archivo no se recibio de manera correcta';
	echo $respuesta;
}*/


$dir_subida = 'subidas/';
$fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
	chmod($dir_subida.$fichero_subido, 0777);
	echo $dir_subida.$fichero_subido;
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}

echo 'Más información de depuración:';
print_r($_FILES);

print "</pre>";

echo '<img src="'.$dir_subida.$fichero_subido.'">';


?>