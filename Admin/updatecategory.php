<?php include('layouts/header.php'); 
include('function.php'); 
$msg='';
if(isset($_POST["updatebtn"]))
{
	$conn=makeconnection();
	$updateQuery="update category set Cat_name='" . $_POST["t2"] ."' where Cat_id='" . $_POST["t1"] . "'";
	if(mysqli_query($conn,$updateQuery)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	Category Updated Sucessfully</p>
                                </div>
                                </div>';
                            }
	mysqli_close($conn);
}
?>

<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('layouts/sidebar.php'); ?>
</div>
<div class="col-sm-9">

	<form method="post">
		<?php echo $msg; ?>
		<table border="0" width="500px" height="300px" align="center" class="tableshadow">
			<tr><td colspan="2" class="toptd">Update Category</td></tr>
			<tr><td class="lefttxt">Selected Category Name</td>
				<td>
					<select name="t1" required/>
					<option value="">Select</option>

					<?php
					$conn=makeconnection();
					$selectQuery="select * from category";
					$result=mysqli_query($conn,$selectQuery);
					$r=mysqli_num_rows($result);
					//echo $r;

					while($data=mysqli_fetch_array($result))
					{
						if(isset($_POST["show"])&& $data[0]==$_POST["t1"])
						{
							echo"<option value=$data[0] selected>$data[1]</option>";
						}
						else
						{
							echo "<option value=$data[0]>$data[1]</option>";
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
						$selectQuery="select * from category where Cat_id='" .$_POST["t1"] ."'";
						$result=mysqli_query($conn,$selectQuery);
						$r=mysqli_num_rows($result);
						//echo $r;

						$data=mysqli_fetch_array($result);
						$Cat_id=$data[0];
						$Cat_name=$data[1];

						mysqli_close($conn);

					}

					?>

				</td>
			</tr>
			<tr>
				<td class="lefttxt">Category Name</td>
				<td><input type="text"   value="<?php if(isset($_POST["show"])){ echo $Cat_name ;} ?>" name="t2" required/></td>
			</tr>

			<tr>
				<td>&nbsp;</td><td ><input type="submit" value="Update" name="updatebtn" /></td>
			</tr>
		</table>
	</form>
</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>



