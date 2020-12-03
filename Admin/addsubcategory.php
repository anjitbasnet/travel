<?php 
include('layouts/header.php'); 
include('function.php'); 
$msg='';
if(isset($_POST["sbmt"]))
{
	$conn=makeconnection();
	
	$target_dir = "subcatimages/";
	$target_file = $target_dir.basename($_FILES["image"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["image"]["tmp_name"]);
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
	if($_FILES["image"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
			
	
	
	$insertQuery="INSERT INTO subcategory(Subcatname,Catid,pic,detail) 
					VALUES('" . $_POST["subcatname"] ."','" . $_POST["selectcategoty"] . "','" . basename($_FILES["image"]["name"]) . "','" . $_POST["detail"] ."')";
	if(mysqli_query($conn,$insertQuery)){
		$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats !! </h4>
                                   	SubCategory Added Sucessfully</p>
                                </div>
                                </div>';
                            }
	
	
		} else{
			$msg='<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title"> Sorry !! </h4>
                                    There was error uploading your file.</p
                                </div>
                                </div>';
		}}
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
		<table border="0" width="400px" height="300px" align="center" class="tableshadow">
			<tr>
				<td colspan="2" class="toptd">Add Subcategory</td>
			</tr>
			<tr>
				<td class="lefttxt">Subcategory Name</td>
				<td><input type="text" name="subcatname" required/></td>
			</tr>
			<tr>
				<td class="lefttxt">Select Category</td>
				<td>
					<select name="selectcategoty" required/>
						<option value="">Select</option>

						<?php
						$conn=makeconnection();
						$selectQuery="SELECT * FROM category";
						$result=mysqli_query($conn,$selectQuery);
						$r=mysqli_num_rows($result);
						//echo $r;

						while($data=mysqli_fetch_array($result))
						{
	
							echo "<option value=$data[0]>$data[1]</option>";
	
						}
						?>

					</select>
			<tr>
				<td class="lefttxt">Upload Pic</td><td><input type="file" name="image" /></td>
			</tr>
			<tr>
				<td class="lefttxt">Details</td><td><textarea name="detail"/></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td>
			</tr>

		</table>
	</form>

</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>


