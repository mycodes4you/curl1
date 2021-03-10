<?php

if(!empty($_POST)){ 
	//print_r($_POST); 
}
if(!empty($_FILES)){ 
	http_response_code(200);
	//print_r($_FILES); 
	echo = 'El archivo se recibio de manera correcta';
}else{
	http_response_code(403);
	echo = 'El archivo no se pudo recibir';
}
?>