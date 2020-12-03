<?php include('layouts/header.php'); 
$msg='';
if(isset($_POST['savebtn']))
{
	if(createAdminUser($conn,$_POST))
	{
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	User Created Sucessfully</p>
                                </div>
                                </div>';

	}

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
			<tr>
				<td colspan="2" class="toptd">Add Admin User</td>
			</tr>
			<tr>
				<td class="lefttxt">User Name</td><td><input type="text" name="adm_username" required pattern="[a-zA-z1 _]{3,50}" palceholder="User name" /></td>
			</tr>
			<tr>
				<td class="lefttxt">Password</td><td><input type="password" name="adm_password" required pattern="[a-zA-z0-9]{1,10}" palceholder="Password"/></td>
			</tr>
			
			<tr>
				<td class="lefttxt">Role</td>
				<td>
					<select name="adm_role" required>
						<option value="">Select</option>
						<option value="admin">Admin</option>
						<option value="general">General</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="lefttxt">Status</td>
				<td>
					<select name="adm_status" required>
						<option value="">Select</option>
						<option value="active">Active</option>
						<option value="inactive">Inactive</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td ><input type="submit" value="Submit" name="savebtn" /></td>
			</tr>

		</table>
	</form>

	</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>