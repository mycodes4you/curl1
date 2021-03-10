<?php

if(!empty($_POST)){ 
	//print_r($_POST); 
}
if(!empty($_FILES)){ 
	http_response_code(200);
	//print_r($_FILES); 
}else{
	http_response_code(403);
}
?>