
<?php 
include('layouts/header.php'); 
include('function.php'); 
$msg='';
if(isset($_POST["sbmt"]))
{
	$conn=makeconnection();
	$deleteQuery="DELETE FROM package  WHERE packid='" . $_POST["selectpackage"] . "'";
	if(mysqli_query($conn,$deleteQuery)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	Package Deleted Sucessfully</p>
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

		<form method="post" enctype="multipart/form-data">
			<?php echo $msg; ?>
			<table border="0" width="400px" height="150px" align="center" class="tableshadow">
				<tr>
					<td colspan="2" class="toptd">Delete Package</td></tr>
				<tr>
					<td class="lefttxt">Select Package</td>
					<td>
						<select name="selectpackage" required/>
						<option value="">Select</option>

						<?php
						$conn=makeconnection();
						$selectQuery="SELECT * FROM package";
						$result=mysqli_query($conn,$selectQuery);
						$r=mysqli_num_rows($result);
						//echo $r;

						while($data=mysqli_fetch_array($result))
						{
		
							echo "<option value=$data[0]>$data[1]</option>";
		
	
						}
						mysqli_close($conn);
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


             