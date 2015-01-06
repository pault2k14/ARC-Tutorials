<html>
<body>

<?php
	function get_page($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	$ticket = $_GET["ticket"]; 
	$url = "https://sso.pdx.edu/cas/proxyValidate?ticket=";
	$url .= $ticket . "&service=" . urlencode("http://10.0.0.10/project3/login.php");
	
	$returned_data = get_page($url);
	
	$pattern = "/<cas:user>.+<\/cas:user>/";
	$subject = $returned_data;
	
	preg_match($pattern, $subject, $matches);
	
	// print_r($matches[0]);
	
	if($matches[0] != "") {
		$_SESSION['username'] = $matches[0];
	}
	
	else {
		print_r("Invalid ticket.");
	}
	
	if($_SESSION['username'] != "") {
		header('Location: http://10.0.0.10/project3/admin.php');
	}
?>




</body>
</html>
