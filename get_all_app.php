<?php
	
	$url = "https://192.9.90.227:8080/api/applications?limit=100&offset=0";
	$cliente = curl_init();
	$authorization = "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJsb3JhLWFwcC1zZXJ2ZXIiLCJleHAiOjE2MjgyNjYyNDMsImlzcyI6ImxvcmEtYXBwLXNlcnZlciIsIm5iZiI6MTYyODE3OTg0Mywic3ViIjoidXNlciIsInVzZXJuYW1lIjoiYXBpdXNlciJ9.yfiY44Nu70o6VnkGd-Iuc-CVdEUhL9yfz_QPlDJGgmM";
	curl_setopt($cliente, CURLOPT_URL, $url);
	curl_setopt($cliente, CURLOPT_HTTPGET, true);
	curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Accept: application/json', $authorization));
	curl_setopt($cliente, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($cliente, CURLOPT_SSL_VERIFYHOST, false);
	
	$result=curl_exec($cliente);
	
	if($result === false)

		echo "error";

	curl_close($cliente);
?>