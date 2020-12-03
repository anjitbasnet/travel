<!DOCTYPE>
<html>
<head>
<title>Admin</title>
</head>

<body>
<?php
function makeconnection()
{
	$cn=mysqli_connect("localhost","root","","travel");
	if(mysqli_connect_errno())
	{
		echo "failed to connect to mysqli:".mysqli_connect_error();
	}
	return $cn;
}

$cn=mysqli_connect("localhost","root","","travel");
?>
</body>
</html>