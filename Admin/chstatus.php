<!DOCTYP>
<html>
<head>
<title>Untitled Document</title>
</head>

<body>

<?php include('function.php'); ?>
<?php

	$conn=makeconnection();
	$updateQuery="UPDATE enquiry SET statusfield='Confirm' WHERE enquiryid='" . $_GET["eid"] . "'";
	mysqli_query($conn,$updateQuery);
	mysqli_close($conn);
header("location:viewenquiry.php");
?>
</body>
</html>