
<?php 
include('layouts/header.php');
include('function.php');
$msg='';
if(isset($_POST["deletebtn"]))
{
	$cn=makeconnection();
	$s="DELETE FROM tbl_admin  where adm_username='" . $_POST["user"] . "'";
	if(mysqli_query($cn,$s)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	User Deleted Sucessfully</p>
                                </div>
                                </div>';
	}
	mysqli_close($cn);
	
}
?>
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
				<tr><td colspan="2" class="toptd">Delete User</td></tr>
				<tr><td class="lefttxt">Select User</td><td>
					<select name="user" required/><option value="">Select</option>

				<?php
				$conn=makeconnection();
				$stmtSelect= "SELECT * FROM tbl_admin";
				$result=mysqli_query($conn,$stmtSelect);
				$r=mysqli_num_rows($result);
				//echo $r;

				while($data=mysqli_fetch_array($result))
				{
	
					echo "<option value=$data[1]>$data[1]</option>";
	
				}
				mysqli_close($conn);

				?>

				</select>

					</td></tr>

				<tr><td>&nbsp;</td><td ><input type="submit" value="Delete" name="deletebtn" /></td></tr>
			</table>
		</form>
	</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>

