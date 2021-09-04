<?php
	#MODULO HTCC AB01
function getDevice($token,$device="0084e9fc0bec36fb"){
	
	try 
	{
		$url = "https://192.9.90.227:8080/api/devices/".$device."/data";
		$cliente = curl_init();
		
		// Check if initialization had gone wrong*    
		if ($cliente === false) {
			throw new Exception('failed to initialize');
		}
		
		$authorization = "Authorization: Bearer ".$token;
		curl_setopt($cliente, CURLOPT_URL, $url);
		curl_setopt($cliente, CURLOPT_HTTPGET, true);
		curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Accept: application/json',$authorization));
		curl_setopt($cliente, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($cliente, CURLOPT_WRITEFUNCTION, "progress_function" ) ;
		curl_setopt($cliente, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($cliente, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($cliente, CURLOPT_VERBOSE, 0);
		curl_setopt($cliente, CURLOPT_TRANSFERTEXT, 0);
		curl_setopt($cliente, CURLOPT_TIMEOUT, 20);
		curl_setopt($cliente, CURLOPT_HTTP_TRANSFER_DECODING,0);
		$result=curl_exec($cliente);
		
		// Check the return value of curl_exec(), too
		if ($result === false) 
		{
			throw new Exception(curl_error($cliente), curl_errno($cliente));
		}
		
		$status= curl_getinfo($cliente,CURLINFO_HTTP_CODE);
		echo $status;
		
		if($result === false)

			echo "error";
		$result = json_decode($result);
		
		
		curl_close($cliente);
		echo $result;
		function progress_function( $cliente , $str ) {
			echo $str ;
			return strlen ( $str ) ;
		}
	}catch(Exception $e) {

		trigger_error(sprintf(
			'Curl failed with error #%d: %s',
			$e->getCode(), $e->getMessage()));

	}	
	
     

    
    
    

	#return $result->payloadJSON;
}
?>