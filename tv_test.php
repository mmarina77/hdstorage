<?php

class TV_test {
	private $test_url = 'http://monitoreverything.it/tv_test/';
	// monitoreverything.it
	//private $url = "https://monitoreverything.it/api/";
	//private $manco = 1;
	//private $apikey = 'd51a8ceaa2ffd0bc01bd1c45100a334d';

	
	// monhelpdesk.com
	//private $url = "https://monhelpdesk.com/api/";
	private $url = "http://monhelpdesk.com/api/";
	private $manco = 1;
	private $apikey = '9964455076bf74ea84a06501b50f4270';

	public function __construct() {
	
	}
	public function light() {
	
		$result = $this->reguest('get', 'list_staff', array());
		$result = $this->reguest('get', 'list_tickets', array());
		//$result = $this->reguest('get', 'list_distributors', array());
	}

	private function reguest($method, $action, $params) {
		
		$user = $this->manco.":".$this->apikey;
		$params['manco'] = $this->manco;

		$endpoint = $this->url.$action.'/json';
		
		$options = array(
			CURLOPT_URL => $endpoint,
			CURLOPT_USERPWD => $user,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_FOLLOWLOCATION => TRUE,
			CURLOPT_FAILONERROR => TRUE,
			//CURLOPT_SSL_VERIFYHOST => 0,			// for windows
			//CURLOPT_SSL_VERIFYPEER => 0,			// for windows
			CURLOPT_TIMEOUT => 30
		);
		
		if($method == 'post') {
			$query = http_build_query($params, NULL, '&');
			$options[CURLOPT_POST] = 1;
			$options[CURLOPT_POSTFIELDS] = $query;
		} else {
			$options[CURLOPT_POST] = 0;
		}
		
		$ch = curl_init();
	
		curl_setopt_array(
			$ch,
			$options
		);

		// run timer
		$start = $this->microtime();
		$result = curl_exec($ch);
		// calculate seconds
		$end = $this->microtime($start);

		//$r = curl_multi_getcontent ($ch);

		$r = curl_error ( $ch );
		
		echo "<div><h4 style='margin-bottom:3px;padding-bottom:2px'>$action  <span style='font: normal 12px/18px Arial, sans-serif;margin-left:15px;'>$end sec.</span></h4>";
		echo "<div style='font: normal 12px Arial, sans-serif;'>$result</div></div>";
		
		if($result && !empty($result)) {
			//$result = json_decode($result, true);
		}
		curl_close ($ch);
		return $result;
	}
	private function microtime($start=0) { 
		list($usec, $sec) = explode(" ", microtime()); 
		return round( ((float)$usec + (float)$sec) - $start, 5); 
	}

}
?>