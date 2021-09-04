<?php

function login_curl()
{
    $url = "https://192.9.90.227:8080/api/internal/login";
    $data = json_encode(array("username" => "apiuser", "password" => "password"));
    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, $url);
    curl_setopt($cliente, CURLOPT_POSTFIELDS, $data);
    curl_setopt($cliente, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($cliente, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($cliente, CURLOPT_POST, 1);
    curl_setopt($cliente, CURLOPT_HTTPGET, false);
    curl_setopt($cliente, CURLOPT_HEADER, false);
    curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);

    $token = curl_exec($cliente);
    $token = json_decode($token);
    //echo $token->jwt;
	$jwt=$token->jwt;
	
	if ($token === false)
        echo "error";
    curl_close($cliente);
   
	return $jwt;
//    return "dfasr23rkjjk4j43kjfskadjfsakdfj24k5rkdjf435jkdsfjk5j43ksjdf";
}
