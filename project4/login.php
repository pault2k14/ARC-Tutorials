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
	$url .= $ticket . "&service=" . urlencode("http://10.0.0.10/project4/login.php");
	
	$returned_data = get_page($url);
	
	$pattern = "/<cas:user>.+<\/cas:user>/";
	$subject = $returned_data;
	preg_match($pattern, $subject, $matches);
	
	$pattern = "/<cas:user>/";
	$strip_match = preg_replace($pattern, "", $matches[0]);
	
	$pattern2 = "/<\/cas:user>/";
	$strip_match2 = preg_replace($pattern2, "", $strip_match);
	
	$matches[0] = $strip_match2;
	
	session_start();
	$_SESSION['username'] = trim($matches[0]);
	
	if((strcmp($_SESSION['username'], "") == 0)) {
		print_r("Invalid ticket.");
	}

	if(($_SESSION['username'] == "pbt")) {
		header('Location: http://10.0.0.10/project4/admin.php');
	}
	
	else {
		echo "You are not authorized to access this page.";
	}
	
?>




</body>
</html>
