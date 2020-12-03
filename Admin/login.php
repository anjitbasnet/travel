<?php 
session_start(); 
include '../app/call.php';
include('function.php');

$msg='';

if(checkAdminLogin())
{
redirect('index.php');

}

if(isset($_POST["sbmt"]))
{
	// print_r($_POST);
	// exit();
	$adm_username= $_POST["adm_username"];
    $adm_password= md5($_POST["adm_password"]);

    $stmtlogin= $conn->prepare("SELECT * FROM tbl_admin WHERE adm_username=:adm_username AND 
    	adm_password=:adm_password");

    $stmtlogin->bindParam(':adm_username',$adm_username);
    $stmtlogin->bindParam(':adm_password',$adm_password);
    $stmtlogin->setFetchMode(PDO::FETCH_ASSOC);
    $stmtlogin->execute();
      	if($stmtlogin->rowCount()>0)
             {
                $adminInfo = $stmtlogin->fetch();
                $_SESSION['admin']['username']=$adminInfo['adm_username'];
                $_SESSION['admin']['role']=$adminInfo['adm_role'];
                redirect('index.php');
            }

            else{
                $msg="Invalid UserName or Password";
            }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>myTour</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link href="../user/css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="../user/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="user/js/jquery.min.js"></script>

<!--/js-->
<!--animated-css-->
<link href="../user/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../user/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
</head>
<body>
<!--header-->
<!--sticky-->

<?php include('layouts/topforlogin.php'); ?>
<!--/sticky-->
	<div style="padding-top:150px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
		<div class="col-sm-3" style=" min-height:450px;"></div>
		<div class="col-sm-9" >

		<h3 style="margin-left: 100px; color: red;"><?php echo $msg; ?></h3>
		<form method="post">
			<table border="0" width="500px" height="400px" align="left" class="tableshadow">
				<tr>
					<td colspan="2" class="toptd"><img src="adminpics/lo.jpg" width="550px" height="100px" /></td>
				</tr>

				<tr>
					
					<td class="lefttxt">
						<table border="0px" width="100px" height="200px">
							<td>User Name</td>
					</td>
					<td><input type="text" name="adm_username" required placeholder="UserName" />
					</td>
				</tr>
				<tr>
					<td>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="password" name="adm_password" required placeholder="Password" /></td>
				</tr>
			<tr>
				<td></td>
				<td align="center" ><input type="submit" value="LOGIN" name="sbmt" /></td>
			</tr>

			</table>
		</form>

</div>
</div>
</body>
</html>