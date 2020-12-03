
<?php
include('layouts/header.php');
include('function.php');
$msg='';
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into category(Cat_name) values('" . $_POST["Cat_name"] ."')";
	if(mysqli_query($cn,$s)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	Category Added Sucessfully</p>
                                </div>
                                </div>';
                            }
	mysqli_close($cn);
}
?>




<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
		<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
					<?php include('layouts/sidebar.php'); ?>
		</div>
		<div class="col-sm-9">

		<form method="post">
			<?php echo $msg ;?>
			<table border="0" width="400px" height="200px" align="center" class="tableshadow">
				<tr><td colspan="2" class="toptd">Add Category</td></tr>
				<tr><td class="lefttxt">Category Name</td><td><input type="text" name="Cat_name" required /></td></tr>
				<tr><td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td></tr>
			</table>
		</form>
		</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>