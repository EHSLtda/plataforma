<?php
function devices_curl($token)
{
    $url = "https://192.9.90.227:8080/api/devices?limit=100&offset=0";
    $cliente = curl_init();
    $authorization = 'Authorization: Bearer '.$token;
    curl_setopt($cliente, CURLOPT_URL, $url);
    curl_setopt($cliente, CURLOPT_HTTPGET, true);
    curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Accept: application/json', $authorization));
    curl_setopt($cliente, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($cliente, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($cliente);
    if ($result === false)
        echo "error";
    curl_close($cliente);
	print_r($result);
	return $result;
}