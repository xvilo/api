<?php
	include_once '../config.php';
	function requestStatus($code) {
        $status = array(  
            200 => 'OK',
            401 => 'Not Authorized',
            404 => 'Not Found',   
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        ); 
        return ($status[$code])?$status[$code]:$status[500]; 
    }
    
	$parameters = explode("/", $_GET['request']);
	
	if($parameters[0] == $apikey){
	}else{
		echo requestStatus(401);
		die();
	}
	
	switch ($parameters[1]) {
    case 'rooster':
        echo "Rooster api";
        break;
    case 'docent':
        include_once 'docent.api.php';
		break;
    default:
       echo requestStatus(404);
	   die();
}