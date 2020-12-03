<?php
include './layouts/header.php';?>
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into enquiry(Packageid,Name,Gender,Mobileno,Email,NoofDays,Child,Adults,Message,Statusfield) values('" . $_REQUEST["pid"] ."','" . $_POST["name"] ."','" . $_POST["gender"] ."','" . $_POST["mobilenumber"] ."','" . $_POST["email"] ."','" . $_POST["noofdays"] ."','" . $_POST["noofchildren"] ."','" . $_POST["noofadults"] ."','" . $_POST["message"] ."','Pending')";	
	
	
		mysqli_query($cn,$s);
	
	echo "<script>alert('Enquery Sent');</script>";
}
?>

<div style="height:50px"></div>
<div style="width:1000px; margin:auto"  >

	<div style="width:200px; font-size:18px; color:#09F; float:left">

		<table cellpadding="0" cellspacing="0" width="1000px">
			<tr>
				<td style="font-size:18px" color="#09F">Category</td>
			</tr>
			<?php

$s="select * from category";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;'><a href='subcat.php?catid=$data[0]'>$data[1]</a></td></tr>";

}
?>

		</table>

	</div>

	<div style="width:800px; float:left">
		<table cellpadding="0px" cellspacing="0" width="1000px">
			<tr>
				<td class="headingText">Enquiry</td>
			</tr>
			<tr>
				<td class="paraText" width="900px">
					<table cellpadding="0" cellspacing="0" width="900px">
						<td>
							<table border="0"; width="600px" height="400px" align="center" >
<?php

$s="select * from package,category,subcategory where package.category=category.cat_id and package.subcategory=subcategory.subcatid and package.packid='" . $_GET["pid"] ."'";

$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;
$n=0;
$data=mysqli_fetch_array($result);
mysqli_close($cn);
?>
								<form method="post" enctype="multipart/form-data">
								<tr>
									<td colspan="3" class="middletext">Package Id:&nbsp;&nbsp;&nbsp;<?php echo $data[0];?></td>
								</tr>
								<tr>
									<td colspan="3" class="middletext">Pack Name:&nbsp;&nbsp;&nbsp;<?php echo $data[1];?></td>
								</tr>
								<tr>
									<td class="lefttxt">Name:</td><td><input type="text" name="name" required pattern="[a-zA-z1 _]{3,50}" placeholder="Enter Name"/></td>
								</tr>
								<tr>
									<td class="lefttxt">Gender:</td>
									<td>
										<input type="radio" name="gender" value="Male" checked="checked" />Male
										<input type="radio" name="gender"  value="Female"/>Female
									</td>
								</tr>
								<tr>
									<td class="lefttxt">Mobile No.</td><td><input type="text" name="mobilenumber" required pattern="[0-9]{10,12}" placeholder="Enter Mobile No"/></td>
								</tr>
								<tr>
									<td class="lefttxt">Email:</td><td><input type="email" name="email" required /></td>
								</tr>
								<tr>
									<td class="lefttxt">No.of Days:</td><td><input type="number" name="noofdays" required pattern="[1 _]{1,20}" placeholder="Enter No.Of Days"/></td>
								</tr>
								<tr>
									<td class="lefttxt">No.of Children:</td><td><input type="number" name="noofchildren" required pattern="[1 _]{1,10}" placeholder="Enter No.Of Children"/></td>
								</tr>
								<tr>
									<td class="lefttxt">No.of Adults:</td><td><input type="number" name="noofadults" required pattern="[1 _]{1,20}" placeholder="Enter No.Of Adults"/></td>
								</tr>
								<tr>
									<td class="lefttxt">Enquiry Message:</td><td><textarea name="message" required placeholder="Enter Message"/></textarea></td>
								</tr>
								<tr>
									<td>&nbsp;</td><td ><input type="submit" value="Submit" name="sbmt" /></td>
								</tr>

								</form>
							</td>
						</tr>
					</table>
				</td>
			</table>
		</td>
	</tr>
</table>

</div>

</div>

<div style="clear:both"></div>

<?php include('./layouts/footer.php'); ?>
</body>
</html>

