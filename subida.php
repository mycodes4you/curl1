<?php
foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';    
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';

if($accion == 'firma'){
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
}
elseif($accion == 'sube'){
	if(!empty($_POST)){ 
			
		$datos = $_POST['Datos'];
		$datos_array = json_decode($datos, true);
		//echo '<pre>';
		//print_r($datos_array);
		//echo '</pre>';

		//$dir_subida = '../subidasweb/';
		$dir_subida = '/var/www/vhosts/mycodes4you.com/subidasweb/';
		$fichero_subido = $dir_subida . $datos_array['user'].'-'.time().'-'.basename($_FILES['archivo']['name']);


		$tokenA = '2954d31de8a3e0bd0db8b4850617bc94';

		if($tokenA == $datos_array['token']){

			if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
				chmod($fichero_subido, 0777);
			  echo "El fichero es válido y se subió con éxito.<br>";
			  echo "La imagen se guardo en: ".$fichero_subido;
			  //echo '<img src="https://'.$_SERVER['SERVER_NAME'].'/'.$fichero_subido.'">';
			} 
			else {
			  echo "¡Error al subir el archivo!\n";
			}
		}
		else{
			echo 'El token no corresponde.';
		}

	}
	else{
		echo 'No se recibieron datos';
	}
}




?>