<?php

//$file_url = "archivos/DF7344-24f4bf23-c831-4421-835c-3f0b9385119a.xml";
$file_url = "images/pinguino.jpg";
$eol = "\r\n"; //default line-break for mime type
$BOUNDARY = md5(time()); //random boundaryid, is a separator for each param on my post curl function
$BODY=""; //init my curl body
$BODY.= '--'.$BOUNDARY. $eol; //start param header
$BODY .= 'Content-Disposition: form-data; name="Datos"' . $eol . $eol; // last Content with 2 $eol, in this case is only 1 content.
$data = array(
  'user' => 'usuario',
  'pass' => '123456',
  'date' => date('Y-m-d')
);
$datos = json_encode($data);
$BODY .= "" . $datos. $eol;//param data in this case is a simple post data and 1 $eol for the end of the data
$BODY.= '--'.$BOUNDARY. $eol; // start 2nd param,
$BODY.= 'Content-Disposition: form-data; name="archivo"; filename="pinguino.jpg"'. $eol ; //first Content data for post file, remember you only put 1 when you are going to add more Contents, and 2 on the last, to close the Content Instance
$BODY.= 'Content-Type: application/octet-stream' . $eol; //Same before row
$BODY.= 'Content-Transfer-Encoding: base64' . $eol . $eol; // we put the last Content and 2 $eol,
//$BODY.= chunk_split(base64_encode(file_get_contents($file_url))) . $eol; // we write the Base64 File Content and the $eol to finish the data,
$BODY.= file_get_contents($file_url) . $eol; // we write the Base64 File Content and the $eol to finish the data,
$BODY.= '--'.$BOUNDARY .'--' . $eol. $eol; // we close the param and the post width "--" and 2 $eol at the end of our boundary header.
       
$ch = curl_init(); //init curl
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'X_PARAM_TOKEN : 71e2cb8b-42b7-4bf0-b2e8-53fbd2f578f9', //custom header for my api validation you can get it from $_SERVER["HTTP_X_PARAM_TOKEN"] variable
  "Content-Type: multipart/form-data; boundary=".$BOUNDARY) //setting our mime type for make it work on $_FILE variable
  );
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/1.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0'); //setting our user agent
curl_setopt($ch, CURLOPT_URL, "https://curl.mycodes4you.com/subida.php"); //setting our api post url
curl_setopt($ch, CURLOPT_COOKIEJAR, $BOUNDARY.'.xml'); //saving cookies just in case we want
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); // call return content
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1); //navigate the endpoint
curl_setopt($ch, CURLOPT_POST, true); //set as post
curl_setopt($ch, CURLOPT_POSTFIELDS, $BODY); // set our $BODY 

$response = curl_exec($ch); // start curl navigation

echo $response;


?>