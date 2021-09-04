<?php
include 'Login.php';
include 'get_all_devices.php';
include 'htccab01_uplink_data.php';
include 'htccab01_downlink_data.php';
include 'htccab01_get_downlink_data.php';

class Devices
{
    public function __construct()
    {
        if(!isset($_SESSION['jwt']))
        {
            print_r("Entrando al if: \n");
			$connection = new Login();
            $connection->setJwt();
		}
    }

    /**
     * @return void
     */
    public function index()
    {
        return devices_curl($_SESSION['jwt']);
    }
	
	public function getDevice()
    {
        return getDevice($_SESSION['jwt']);
    }
	
	public function dataDownlink()
    {
        return downlink($_SESSION['jwt']);
    }
	
	public function downlink()
    {
        return getDownlink($_SESSION['jwt']);
    }


}
$dispositivo1=new Devices();
// $dispositivo1->index();
$dispositivo1->getDevice();
$dispositivo1->dataDownlink();
$dispositivo1->downlink();