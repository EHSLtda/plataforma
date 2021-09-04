<?php
	#MODULO HTCC AB01
	
class SplitCurlByLines {

    public function curlCallback($curl, $data) {

        $this->currentLine .= $data;
        $lines = explode("\n", $this->currentLine);
        // The last line could be unfinished. We should not
        // proccess it yet.
        $numLines = count($lines) - 1;
        $this->currentLine = $lines[$numLines]; // Save for the next callback.

        for ($i = 0; $i < $numLines; ++$i) {
            $this->processLine($lines[$i]); // Do whatever you want
            ++$this->totalLineCount; // Statistics.
            $this->totalLength += strlen($lines[$i]) + 1;
        }
        return strlen($data); // Ask curl for more data (!= value will stop).

    }

    public function processLine($str) {
       
		$str=json_decode($str);
		//print_r($str);
		//echo $str->result->type;
		$payloadJSON=$str->result->payloadJSON;
		$payloadJSON=json_decode($payloadJSON);
		print_r($payloadJSON);
		echo $payloadJSON->data."\n";
		
    }

    public $currentLine = '';
    public $totalLineCount = 0;
    public $totalLength = 0;

} // SplitCurlByLines

// Just for testing, I will echo the content of Stackoverflow
// main page. To avoid artifacts, I will inform the browser about
// plain text MIME type, so the source code should be vissible.
#Header('Content-type: text/plain');




function getDevice($token,$device="0084e9fc0bec36fb"){
	
	$splitter = new SplitCurlByLines();
	$url = "https://192.9.90.227:8080/api/devices/".$device."/data";
	$cliente = curl_init();
	
	#$fp = fopen('salida.txt', 'w');
	
	$authorization = "Authorization: Bearer ".$token;
	curl_setopt($cliente, CURLOPT_URL, $url);
	curl_setopt($cliente, CURLOPT_HTTPGET, true);
	curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Accept: application/json',$authorization));
	curl_setopt($cliente, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($cliente, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($cliente, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($cliente, CURLOPT_TIMEOUT, 32);
	curl_setopt($cliente, CURLOPT_WRITEFUNCTION, array($splitter, 'curlCallback'));
	#curl_setopt($cliente, CURLOPT_FILE, $fp);
	$result=curl_exec($cliente);
	// Process the last line.
	$splitter->processLine($splitter->currentLine);

	curl_close($cliente);
	echo $result;
	#fclose($fp); 
	error_log($splitter->totalLineCount . " lines; " .
	$splitter->totalLength . " bytes.");	

}
?>