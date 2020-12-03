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
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["uploadpic1"]["tmp_name"]);
	if($check!==false) {
		echo "file is an image - ". $check["mime"]. ".";
		$uploadok = 1;
	}else{
		echo "file is not an image.";
		$uploadok=0;
	}
	
	
	//check if file already exists
	if(file_exists($target_file)){
		echo "sorry,file already exists.";
		$uploadok=0;
	}
	
	//check file size
	if($_FILES["uploadpic1"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["uploadpic1"]["tmp_name"], $target_file)){
			$f1=1;
	} else{
			echo "sorry there was an error uploading your file.";
		}
	}
	
	
	//uploadpic2
	$target_file = $target_dir.basename($_FILES["uploadpic2"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["uploadpic2"]["tmp_name"]);
	if($check!==false) {
		echo "file is an image - ". $check["mime"]. ".";
		$uploadok = 1;
	}else{
		echo "file is not an image.";
		$uploadok=0;
	}
	
	
	//check if file already exists
	if(file_exists($target_file)){
		echo "sorry,file already exists.";
		$uploadok=0;
	}
	
	//check file size
	if($_FILES["uploadpic2"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["uploadpic2"]["tmp_name"], $target_file)){
			$f2=1;
	} else{
			echo "sorry there was an error uploading your file.";
		}
	}
	//uploadpic3
	$target_file = $target_dir.basename($_FILES["uploadpic3"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["uploadpic3"]["tmp_name"]);
	if($check!==false) {
		echo "file is an image - ". $check["mime"]. ".";
		$uploadok = 1;
	}else{
		echo "file is not an image.";
		$uploadok=0;
	}
	
	
	//check if file already exists
	if(file_exists($target_file)){
		echo "sorry,file already exists.";
		$uploadok=0;
	}
	
	//check file size
	if($_FILES["uploadpic3"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["uploadpic3"]["tmp_name"], $target_file)){
			$f3=1;
	} else{
			echo "sorry there was an error uploading your file.";
		}
	}
	
		if($f1>0&& $f2>0&&$f3>0)
		{
	
	$insertQuery="insert into package(packname,category,subcategory,packprice,pic1,pic2,pic3,detail) values('" . $_POST["packname"] ."','" . $_POST["selectcategory"] . "','" . $_POST["selectsubcategory"] ."','". $_POST["packprice"] . "','" . basename($_FILES["uploadpic1"]["name"]) . "','" . basename($_FILES["uploadpic2"]["name"]) . "','" . basename($_FILES["uploadpic3"]["name"]) . "','" . $_POST["details"] ."')";
	if(mysqli_query($conn,$insertQuery)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	Package Added Sucessfully</p>
                                </div>
                                </div>';
                            }
	mysqli_close($conn);
	
		}
	
		
}
?>
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('layouts/sidebar.php'); ?>
</div>
	<div class="col-sm-9">

		<form method="post" enctype="multipart/form-data">
			<?php echo $msg; ?>
			<table border="0" width="400px" height="450px" align="center" class="tableshadow">
				<tr>
					<td colspan="2" class="toptd">Add Package</td>
				</tr>
				<tr>
					<td class="lefttxt">Package Name</td>
					<td>
						<input type="text" name="packname" required />
					</td>
				</tr>
				<tr>
					<td class="lefttxt">Select Category</td>
					<td>
						<select name="selectcategory" required/>
							<option value="">Select</option>

								<?php
								$conn=makeconnection();
								$selectQuery="select * from category";
								$result=mysqli_query($conn,$selectQuery);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
									if(isset($_POST["show"])&& $data[0]==$_POST["selectcategory"])
									{
										echo "<option value=$data[0] selected='selected'>$data[1]</option>";
									}
									else
									{
										echo "<option value=$data[0]>$data[1]</option>";
									}
								}
								?>

						</select>
							<input type="submit" value="Show" name="show" formnovalidate/>

			<tr>
				<td class="lefttxt">Select Subcategory</td>
				<td>
					<select name="selectsubcategory" required/>
						<option value="">Select</option>

							<?php
							$conn=makeconnection();
							$selectQuery="select * from subcategory";
							$result=mysqli_query($conn,$selectQuery);
							$r=mysqli_num_rows($result);
							//echo $r;

							while($data=mysqli_fetch_array($result))
							{
								if(isset($_POST["show"]))
								{
									if($data[2]==$_POST["selectcategory"])
									{
										echo"<option value=$data[0] >$data[1]</option>";
									}
									else
									{
									//	echo "<option value=$data[0]>$data[1]</option>";
									}
								}
							}



							?>
					</select>

			<tr>
				<td class="lefttxt">Package Price</td>
				<td><input type="text" name="packprice" /></td>
			</tr>
			<tr>
				<td class="lefttxt">Upload Pic1</td>
				<td><input type="file" name="uploadpic1" /></td>
			</tr>
			<tr>
				<td class="lefttxt">Upload Pic2</td>
				<td><input type="file" name="uploadpic2" /></td>
			</tr>
			<tr>
				<td class="lefttxt">Upload Pic3</td>
				<td><input type="file" name="uploadpic3" /></td>
			</tr>
			<tr>
				<td class="lefttxt">Details</td>
				<td><textarea name="details"></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td></tr>
		</table>
	</form>
</div>
</div>
<?php include('bottom.php'); ?>

<?php

?>

</body>
</html>


