<?php 
include('layouts/header.php'); 
include('function.php'); 
$msg='';
if(isset($_POST["sbmt"]))
{
	$conn=makeconnection();
	$f1=0;
	$f2=0;
	$f3=0;
	
	$target_dir = "packimages/";
	//uploadpic1
	$target_file = $target_dir.basename($_FILES["uploadpic1"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	
	
	

		if(move_uploaded_file($_FILES["uploadpic1"]["tmp_name"], $target_file)){
			$f1=1;
	} 	

	
	//uploadpic2
	$target_file = $target_dir.basename($_FILES["uploadpic2"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	
	
	
	
	
	//uploadpic3
	$target_file = $target_dir.basename($_FILES["uploadpic3"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	
	
	
	
	//check file size
	if($_FILES["uploadpic3"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	else{
		if(move_uploaded_file($_FILES["uploadpic3"]["tmp_name"], $target_file)){
			$f3=1;
	} 
	}
}
	 
?>

<?php
if(isset($_POST["sbmt"]))
{
	$conn=makeconnection();
	
	if (empty($_FILES['selectsubcategory']['name'])) {
	
		$updateQuery="UPDATE package SET Packname='" . $_POST["packname"] ."',Category='" . $_POST["selectcategory"] . "',Subcategory='" . $_POST["selectsubcategory"] . "',Packprice='" . $_POST["packprice"] . "',Pic1='" . $_POST["h1"] . "',Pic2='" . $_POST["h2"]. "',Pic3='" .$_POST["h3"] . "',Detail='" . $_POST["details"] . "' WHERE Packid='" . $_POST["s1"] . "'";
	
}
else
{
	
	
	$updateQuery="UPDATE package SE Packname='" . $_POST["packname"] ."',Category='" . $_POST["selectcategory"] . "',Subcategory='" . $_POST["selectsubcategory"] . "',Packprice='" . $_POST["packprice"] . "',Pic1='" .  basename($_FILES["uploadpic1"]["name"]) . "',Pic2='" .  basename($_FILES["uploadpic2"]["name"]) . "',Pic3='" .  basename($_FILES["uploadpic3"]["name"]) . "',Detail='" . $_POST["details"] . "' WHERE Packid='" . $_POST["s1"] . "'";}
	if(mysqli_query($conn,$updateQuery)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	Package Updated Sucessfully</p>
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
			<table border="0" width="500px" height="700px" align="center" class="tableshadow">
				<tr>
					<td colspan="2" class="toptd">Update Package</td>
				</tr>
				<tr>
					<td class="lefttxt">Select Package</td>
					<td>
						<select name="s1" required/>
							<option value="">Select</option>

							<?php
							$conn=makeconnection();
							$selectQuery="SELECT * FROM package";
							$result=mysqli_query($conn,$selectQuery);
							$r=mysqli_num_rows($result);
							//echo $r;

							while($data=mysqli_fetch_array($result))
							{
								if(isset($_POST["show"])&& $data[0]==$_POST["s1"])
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
							$selectQuery="SELECT * FROM package WHERE Packid='" .$_POST["s1"] ."'";
							$result=mysqli_query($conn,$selectQuery);
							$r=mysqli_num_rows($result);
							//echo $r;

							$data=mysqli_fetch_array($result);

							$Packid=$data[0];	
							$Packname=$data[1];
							$Category=$data[2];
							$Subcategory=$data[3];
							$Packprice=$data[4];
							$Pic1=$data[5];
							$Pic2=$data[6];
							$Pic3=$data[7];
							$Detail=$data[8];
							mysqli_close($conn);
						}

						?>
					</td>
				</tr>

				<tr>
					<td class="lefttxt">Package Name</td>
					<td>
						<input type="text"  value="<?php if(isset($_POST["show"])){ echo $Packname ;} ?> " name="packname" required />
					</td>
				</tr>
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
							if(isset($_POST["show"])&& $Category==$data[0])
							{
		
								echo "<option value=$data[0] selected='selected' >$data[1]</option>";
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
					<td class="lefttxt">Select Subcategory</td>
					<td>
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
						if(isset($_POST["show"])&& $Subcategory==$data[0])
						{
		
							echo "<option value=$data[0] selected='selected' >$data[1]</option>";
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
					<td class="lefttxt">Package Price</td>
					<td>
						<input type="text" name="packprice" value="<?php if(isset($_POST["show"])){ echo $Packprice ;} ?> " />
					</td>
				</tr>

				<tr>
					<td class="lefttxt">Old Pic</td>
					<td>
						<img src="packimages/<?php echo @$Pic1; ?>" width="150px" height="50px" />
						<input type="hidden" name="h1" value="<?php if(isset($_POST["show"])) {echo $Pic1;} ?>" />
					</td>
				</tr>
				<tr><td class="lefttxt">Upload Pic1</td><td><input type="file" name="uploadpic1"/></td></tr>

				<tr><td class="lefttxt">Old Pic</td><td><img src="packimages/<?php echo @$Pic2; ?>" width="150px" height="50px" />
						<input type="hidden" name="h2" value="<?php if(isset($_POST["show"])) {echo $Pic2;} ?>" />
					</td></tr>
				<tr><td class="lefttxt">Upload Pic2</td><td><input type="file" name="uploadpic2"/></td></tr>

				<tr><td class="lefttxt">Old Pic</td><td><img src="packimages/<?php echo @$Pic3; ?>" width="150px" height="50px" />
						<input type="hidden" name="h3" value="<?php if(isset($_POST["show"])) {echo $Pic3;} ?>" />
					</td></tr>
				<tr><td class="lefttxt">Upload Pic3</td><td><input type="file" name="uploadpic3"/></td></tr>

				<tr><td class="lefttxt">Details</td><td><textarea name="details" /><?php if(isset($_POST["show"])){ echo $Detail ;} ?></textarea></td></tr>
				<tr><td>&nbsp;</td><td ><input type="submit" value="Update" name="sbmt" /></td></tr>

			</table>
		</form>
	</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>


