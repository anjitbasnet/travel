
<?php 
include('layouts/header.php'); 
include('function.php'); 
$msg='';
if(isset($_POST["sbmt"]))
{
	
	$conn=makeconnection();
	
	$target_dir = "subcatimages/";
	$target_file = $target_dir.basename($_FILES["uploadpic"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	
	if(move_uploaded_file($_FILES["uploadpic"]["tmp_name"], $target_file)){
			
	}else{
			echo "sorry there was an error uploading your file.";
		}
}
?>

<?php
if(isset($_POST["sbmt"]))
{
	$conn=makeconnection();

if (empty($_FILES['uploadpic']['name'])) {
	
	$updateQuery="UPDATE subcategory SET Subcatname='" . $_POST["subcategoryname"] ."',Catid='" . $_POST["selectcategory"] . "',Pic='" . $_POST["oldpic"] . "',Detail='" . $_POST["t4"] . "' where Subcatid='" . $_POST["selectsubcategory"] . "'";
	
}
else
{
	
		 $updateQuery="UPDATE subcategory 
		 				SET Subcatname='" . $_POST["subcategoryname"] ."',Catid='" . $_POST["selectcategory"] . "',Pic='" .  basename($_FILES["uploadpic"]["name"]) . "',Detail='" . $_POST["detail"] . "' WHERE Subcatid='" . $_POST["selectsubcategory"] . "'";}
	if(mysqli_query($conn,$updateQuery)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	SubCategory Updated Sucessfully</p>
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
		<table border="0" width="450px" height="500px" align="center" class="tableshadow">
			<tr><td colspan="2" class="toptd">Update Subcategory</td></tr>
			<tr>
				<td class="lefttxt">Select Subcategory</td><td>
					<select name="selectsubcategory" required/>
						<option value="">Select</option>

							<?php
							$conn=makeconnection();
							$selectQuery="SELECT * FROM subcategory";
							$result=mysqli_query($conn,$selectQuery);
							$r=mysqli_num_rows($result);
							//echo $r;

							while($data=mysqli_fetch_array($result))
							{
								if(isset($_POST["show"])&& $data[0]==$_POST["selectsubcategory"])
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
						$selectQuery="SELECT * FROM subcategory WHERE subcatid='" .$_POST["selectsubcategory"] ."'";
						$result=mysqli_query($conn,$selectQuery);
						$r=mysqli_num_rows($result);
						//echo $r;

						$data=mysqli_fetch_array($result);
						$Subcatid=$data[0];
						$Subcatname=$data[1];
						$Catid=$data[2];
						$Pic=$data[3];
						$Detail=$data[4];

						mysqli_close($conn);

					}

					?>
				</td>
			</tr>

			<tr>
				<td class="lefttxt">Subcategory Name</td>
				<td><input type="text" value="<?php if(isset($_POST["show"])){ echo $Subcatname ;} ?> " name="subcategoryname" required /></td>
			</tr>
			<tr>
				<td class="lefttxt">Select Category</td>
				<td>
					<select name="selectcategory"  value="<?php if(isset($_POST["show"])){ echo $Catid ;} ?> " required/>
						<option value="Select">Select</option>

						<?php
						$conn=makeconnection();
						$selectQuery="SELECT * FROM category";
						$result=mysqli_query($conn,$selectQuery);
						$r=mysqli_num_rows($result);
						//echo $r;

						while($data=mysqli_fetch_array($result))
						{
							if(isset($_POST["show"]) && $data[0]==$Catid)
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

		<tr>
			<td class="lefttxt">Old Picture</td>
			<td>
				<img src="subcatimages/<?php echo @$Pic; ?>" width="150px" height="100px" / >
				<input type="hidden" name="oldpic" value="<?php if(isset($_POST["show"])) {echo $Pic;} ?>" />
			</td>
		</tr>

		<tr>
			<td class="lefttxt">Upload Picture</td>
			<td><input type="file" name="uploadpic" /></td>
		</tr>
		<tr>
			<td class="lefttxt">Details</td>
			<td>
				<textarea name="detail" >
					<?php if(isset($_POST["show"])){ echo $Detail ;} ?>
				</textarea>
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
<?php include('bottom.php'); ?>
</body>
</html>


             