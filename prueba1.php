<?php
$url_archivo = "imagenes/gato.jpg";
function postcUrl($url_archivo){
	//$url_archivo = "archivos/DF7344-24f4bf23-c831-4421-835c-3f0b9385119a.xml";
	/*$token = md5(time());

	$eol = "\r\n";
	$BOUNDARY = md5(time()); 
	$BODY=""; 
	$BODY.= '--'.$BOUNDARY. $eol; 
	$BODY .= 'Content-Disposition: form-data; name="Datos"' . $eol . $eol; 
	$data = array(
	  'token' => $token,
	  'usuario' => '701',
	  'pass' => 'Rjfge'
	);
	$datos = json_encode($data);
	$BODY .= "" . $datos. $eol;
	$BODY.= '--'.$BOUNDARY. $eol;
	/*$BODY.= 'Content-Disposition: form-data; name="archivo"; filename="gato.jpg"'. $eol ; 
	$BODY.= 'Content-Type: application/octet-stream' . $eol; 
	$BODY.= 'Content-Transfer-Encoding: base64' . $eol . $eol; 

	$BODY.= file_get_contents($url_archivo) . $eol; */
	/*$BODY.= '--'.$BOUNDARY .'--' . $eol. $eol;        
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  'X_PARAM_TOKEN : 71e2cb8b-42b7-4bf0-b2e8-53fbd2f578f9',
	  "Content-Type: multipart/form-data; boundary=".$BOUNDARY)
	  );
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/1.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0'); 
	curl_setopt($ch, CURLOPT_URL, "https://curl.mycodes4you.com/firmar.php"); 
	curl_setopt($ch, CURLOPT_COOKIEJAR, $BOUNDARY); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1); 
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $BODY); 

	$response = curl_exec($ch); 

	return $response;*/
	/*

	





	$eol = "\r\n";
	$BOUNDARY = md5(time()); 
	$BODY=""; 
	$BODY.= '--'.$BOUNDARY. $eol; 
	$BODY .= 'Content-Disposition: form-data; name="Datos"' . $eol . $eol; 
	$data = array(
	  'user' => 'alex',
	  'pass' => 'rjf7y',
	  'date' => date('Y-m-d H:m:s')
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
	curl_setopt($ch, CURLOPT_URL, "https://curl.mycodes4you.com/subida.php"); 
	curl_setopt($ch, CURLOPT_COOKIEJAR, $BOUNDARY.'.jpg'); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1); 
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $BODY); 

	$response = curl_exec($ch); 

	return $response;
*/


// abrimos la sesión cURL
$ch = curl_init();

// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,"https://curl.mycodes4you.com/firma.php");
// indicamos el tipo de petición: POST
curl_setopt($ch, CURLOPT_POST, TRUE);
// definimos cada uno de los parámetros
curl_setopt($ch, CURLOPT_POSTFIELDS, "postvar1=value1&postvar2=value2&postvar3=value3");

// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);

// cerramos la sesión cURL
curl_close ($ch);

// hacemos lo que queramos con los datos recibidos
// por ejemplo, los mostramos
return $remote_server_output;

}

echo postcUrl($url_archivo);
?>