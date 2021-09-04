<?php
	#MODULO HTCC AB01
function getDownlink($token,$device="0084e9fc0bec36fb"){
	$url = "https://192.9.90.227:8080/api/devices/".$device."/queue";
	$cliente = curl_init();
	$authorization = "Authorization: Bearer ".$token;
	curl_setopt($cliente, CURLOPT_URL, $url);
	curl_setopt($cliente, CURLOPT_HTTPGET, true);
	curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Accept: application/json',$authorization));
	curl_setopt($cliente, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($cliente, CURLOPT_SSL_VERIFYHOST, false);
	
	$result=curl_exec($cliente);
	
	if($result === false)

		echo "error";

	curl_close($cliente);
}
?>