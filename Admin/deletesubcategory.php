<?php 
include('layouts/header.php'); 
include('function.php');
$msg='';
if(isset($_POST["sbmt"]))
{
	$conn=makeconnection();
	$deleteQuery="DELETE FROM subcategory  WHERE subcatid='" . $_POST["selectsubcategory"] . "'";
	if(mysqli_query($conn,$deleteQuery)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	SubCategory Deleted Sucessfully</p>
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




		<form method="post" enctype="multipart/form-data">
			<?php  echo $msg; ?>
			<table border="0" width="400px" height="250px" align="center" class="tableshadow">
				<tr><td colspan="2" class="toptd">Delete Subcategory</td></tr>
					<tr>
						<td class="lefttxt">Select Category</td>
						<td>
							<select name="selectcategory" required/>
								<option value="">Select</option>

								<?php
								$conn=makeconnection();
								$selectQuery="SELECT * FROM category";
								$result=mysqli_query($conn,$selectQuery);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
									if(isset($_POST["show"])&& $data[0]==$_POST["selectcategory"])
									{
										echo "<option value=$data[0] selected>$data[1]</option>";
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

				<tr>
					<td class="lefttxt">Select Subcategory</td>
					<td>
						<select name="selectsubcategory" required/>
						<option value="">Select</option>

						<?php
						if(isset($_POST["show"]))
						{
							$conn=makeconnection();
							$selectQuery="SELECT * FROM subcategory WHERE catid='" . $_POST["selectcategory"] ."'";
							$result=mysqli_query($conn,$selectQuery);
							$r=mysqli_num_rows($result);
							//echo $r;

							while($data=mysqli_fetch_array($result))
							{
								echo "<option value=$data[0]>$data[1]</option>";
	
							}
							mysqli_close($conn);
						}
						?>

						</select>
					</td>
				</tr>

				<tr>
					<td>&nbsp;</td>
					<td >
						<input type="submit" value="Delete" name="sbmt" />
					</td>
				</tr>
			</table>
		</form>

	</div>
</div>
<?php include('bottom.php'); ?>

</body>
</html>


             