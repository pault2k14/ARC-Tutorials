<html>
<body>

<?php 

$connection = ldap_connect('ldap-login.oit.pdx.edu');
$search = ldap_search($connection, 'dc=pdx,dc=edu', '(& (| (cn=arc) (cn=arcstaff)) (memberUid='.$_SESSION['username'].') (objectclass=posixGroup))'); 
$results = ldap_get_entries($connection, $search); 
print_r($results);

if(($results['count'] > 0)) {
	print_r("You are in the ARC or ARCSTAFF group!");
}

?>


</body>
</html>
