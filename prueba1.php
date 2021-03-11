<?php
$url_archivo = "imagenes/gato.jpg";
function postcUrl($url_archivo){

	/// --- FIRMAMOS PARA ATENTICAR
	$url_firma = "https://curl.mycodes4you.com/subida.php?accion=firma";
	$token = md5(time());
	$datos = array(
		'usuario' => '701',
	  'pass' => 'Rjfge'
		);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url_firma);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$firma = curl_exec ($ch);
	curl_close ($ch);



	//$url_archivo = "archivos/DF7344-24f4bf23-c831-4421-835c-3f0b9385119a.xml";

	if($firma != '404' OR $firma != '403'){
		$eol = "\r\n";
		$BOUNDARY = md5(time()); 
		$BODY=""; 
		$BODY.= '--'.$BOUNDARY. $eol; 
		$BODY .= 'Content-Disposition: form-data; name="Datos"' . $eol . $eol; 
		$data = array(
		  'user' => '701',
		  'pass' => 'Rjfge',
		  'token' => '$firma'
		);
		$datos = json_encode($data);
		$BODY .= "" . $datos. $eol;
		$BODY.= '--'.$BOUNDARY. $eol;
		$BODY.= 'Content-Disposition: form-data; name="archivo"; filename="gato.jpg"'. $eol ; 
		$BODY.= 'Content-Type: application/octet-stream' . $eol; 
		$BODY.= 'Content-Transfer-Encoding: base64' . $eol . $eol; 

		$BODY.= file_get_contents($url_archivo) . $eol; 
		$BODY.= '--'.$BOUNDARY .'--' . $eol. $eol;        
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'X_PARAM_TOKEN : 71e2cb8b-42b7-4bf0-b2e8-53fbd2f578f9',
		  "Content-Type: multipart/form-data; boundary=".$BOUNDARY)
		  );
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/1.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0'); 
		curl_setopt($ch, CURLOPT_URL, "https://curl.mycodes4you.com/subida.php?accion=sube"); 
		curl_setopt($ch, CURLOPT_COOKIEJAR, $BOUNDARY.'.jpg'); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1); 
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $BODY); 

		$response = curl_exec($ch); 
	}
	else{
		$response = 'No se puedo validar el usuario';
	}

	return $response;

}

echo postcUrl($url_archivo);
?>