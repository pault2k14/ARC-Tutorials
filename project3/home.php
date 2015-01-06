<html>
<body>
<?php 
	$url ="http://sso.pdx.edu/cas/login?service=";
	$url .= urlencode('http://10.0.0.10/project3/login.php');
?>

<a href="<?php echo $url ?>">LOGIN</a>

</body>
</html>
