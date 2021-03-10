<?php

if(!empty($_POST)){ 
	//print_r($_POST); 
}
if(!empty($_FILES)){ 
	//http_response_code(200);
	//print_r($_FILES); 
	$response = 'El archivo se recibio de manera correcta';
}else{
	//http_response_code(403);
	$response = 'El archivo no se pudo recibir';
}
?>