<?php
	#MEDIDOR ENERGIA
	$url = "https://192.9.90.227:8080/api/devices/8cf95720000106fe/queue";
	$cliente = curl_init();
	$authorization = "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJsb3JhLWFwcC1zZXJ2ZXIiLCJleHAiOjE2MjgxNzQyMDcsImlzcyI6ImxvcmEtYXBwLXNlcnZlciIsIm5iZiI6MTYyODA4NzgwNywic3ViIjoidXNlciIsInVzZXJuYW1lIjoiYXBpdXNlciJ9.RmtLfGshN__npxaeioQJCUy-nzTVnJ_d7easDIczc5Q";
	curl_setopt($cliente, CURLOPT_URL, $url);
	curl_setopt($cliente, CURLOPT_HTTPGET, true);
	curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Accept: application/json',$authorization));
	curl_setopt($cliente, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($cliente, CURLOPT_SSL_VERIFYHOST, false);
	
	$result=curl_exec($cliente);
	
	if($result === false)

		echo "error";

	curl_close($cliente);
?>