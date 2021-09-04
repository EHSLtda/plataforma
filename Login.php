<?php
session_start();
include 'login_curl.php';
class Login
{
    /**
     * @var string
     */
    private $jwt;

    public function __construct()
    {
        $this->jwt = "";
    }

    /**
     * @return string
     */
    public function getJwt()
    {
        return $this->jwt;
    }

    /**
     * @param void
     */
    public function setJwt()
    {
        $token = login_curl();
        $_SESSION['jwt'] = $token;
		return $token;
    }

}
//$connection = new Login();
//echo "Se ha creado instancia Login \n";
// $jwt=$connection->getJwt();
// echo "El valor jwt: ".$jwt;
// echo "\nVamos a establecer el jwt: \n";
// $jwt=$connection->setJwt();
// echo "El valor jwt: ".$_SESSION['jwt'];