<?php include('layouts/header.php');
include('function.php'); 
$msg='';

if(isset($_POST["sbmt"]))
{
	$conn=makeconnection();
	$updatequery="UPDATE tbl_admin SET adm_username='" . $_POST["adm_username"] ."',adm_password='" . $_POST["adm_password"] ."',adm_role='" . $_POST["adm_role"] . "' ,adm_status='" . $_POST["adm_status"] ."' WHERE adm_username='" . $_POST["select"] . "'";
	mysqli_query($conn,$updatequery);
	mysqli_close($conn);
	$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	User Updated Sucessfully</p>
                                </div>
                                </div>';

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
			<table border="0" width="400px" height="300px" align="center" class="tableshadow">
				<tr><td colspan="2" class="toptd">Update User</td></tr>
				<tr><td class="lefttxt">Select User</td>
					<td><select name="select" required/>
						<option value="">Select</option>

						<?php
						$conn=makeconnection();
						$selectquery="SELECT * FROM tbl_admin";
						$result=mysqli_query($conn,$selectquery);
						$r=mysqli_num_rows($result);
						//echo $r;

						while($data=mysqli_fetch_array($result))
						{
							if(isset($_POST["show"])&& $data[1]==$_POST["select"])
								{
									echo"<option value=$data[1] selected>$data[1]</option>";
								}
							else
								{
									echo "<option value=$data[1]>$data[1]</option>";
								}
						}
						mysqli_close($conn);
						?>

						</select>
				<input type="submit" value="Show" name="show" formnovalidate/>
				<?php
					if(isset($_POST["show"]))
					{
						$conn=makeconnection();
						$selectquery="SELECT * FROM tbl_admin where adm_username='" .$_POST["select"] ."'";
						$result=mysqli_query($conn,$selectquery);
						$r=mysqli_num_rows($result);
						//echo $r;

						$data=mysqli_fetch_array($result);
						$adm_username=$data[1];
						$adm_password=$data[2];
						$adm_role=$data[3];
						$adm_status=$data[4];

						mysqli_close($conn);

					}

				?>

			</td>
		</tr>
		<tr>
			<td class="lefttxt">User Name</td>
			<td><input type="text" value="<?php if(isset($_POST["show"])){ echo $adm_username ;} ?>" name="adm_username" required/></td>
		</tr>
		<tr>
			<td class="lefttxt">Role</td>
			<td>
				<select name="adm_role" required />
				<option value="">Select</option>
				<option value="Admin" <?php if(isset($_POST["show"])&& $adm_role=="admin"){ echo "selected"; } ?>>Admin</option>
				<option value="General" <?php if(isset($_POST["show"])&& $adm_role=="general"){ echo "selected"; } ?>>General</option>
				</select>
			</td>
		</tr>
			<tr>
			<td class="lefttxt">Status</td>
			<td>
				<select name="adm_status" required />
				<option value="">Select</option>
				<option value="Active" <?php if(isset($_POST["show"])&& $adm_status=="active"){ echo "selected"; } ?>>Active</option>
				<option value="InActive" <?php if(isset($_POST["show"])&& $adm_status=="inactive"){ echo "selected"; } ?>>InActive</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td >
				<input type="submit" value="Update" name="sbmt" />
			</td>
		</tr>
	</table>
</form>
</div>
</div>
</body>
</html>
