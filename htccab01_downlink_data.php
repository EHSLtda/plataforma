<?php
	#MODULO HTCC AB01
function downlink($token,$device="0084e9fc0bec36fb",$data="0000"){
	$url = "https://192.9.90.227:8080/api/devices/".$device."/queue";
	$data = json_encode(array("confirmed" => false, "data" => $data, "devEUI" => "0084e9fc0bec36fb", "fPort" => 8));
	$cliente = curl_init();
	$authorization = "Authorization: Bearer ".$token;
	curl_setopt($cliente, CURLOPT_URL, $url);
	curl_setopt($cliente, CURLOPT_POSTFIELDS, $data);
	curl_setopt($cliente, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($cliente, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Accept: application/json',$authorization));
	curl_setopt($cliente, CURLOPT_POST, 1);
	curl_setopt($cliente, CURLOPT_HTTPGET, false);
	curl_setopt($cliente, CURLOPT_HEADER, false);
	#curl_setopt($cliente, CURLOPT_RETURNTRANSFER, 1);
	#echo $result;
	
	$result=curl_exec($cliente);
	
	if($result === false)

		echo "error";

	curl_close($cliente);
}
?>