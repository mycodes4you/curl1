<?php
foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';    
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';

if(!empty($_POST)){ 
	//print_r($_POST); 
	if($usuario == '701' && $pass = 'Rjfge'){
		$token = md5(time());
		echo $token;
	}
	else{
		echo 'Error, el usuario no es valido';
	}
}
else{
	echo 'Error, no se recibieron datos.';
}

?>