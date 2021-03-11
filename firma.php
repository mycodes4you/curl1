<?php
foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';    
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';

if(!empty($_POST)){ 
	//print_r($_POST); 
	if($usuario == '701' && $pass = 'Rjfge'){
		//$token = md5(time());
		$token = '2954d31de8a3e0bd0db8b4850617bc94';
		echo $token;
	}
	else{
		echo '403';
	}
}
else{
	echo '404';
}

?>