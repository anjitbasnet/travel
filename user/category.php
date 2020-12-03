<?php
include './layouts/header.php';
?>

<div style="height:50px"></div>
<div style="width:1000px; margin:auto" >
	<div style="width:200px; float:left">
		<table cellpadding="0" cellspacing="0" width="1000px">
			<tr>
				<td style="font-family:Lucida Calligraphy; font-size:20px; color:#09F"><b>Category</b>
				</td>
			</tr>

<?php
$selectQuery="SELECT * FROM category";
$result=mysqli_query($cn,$selectQuery);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;'><b><a href='subcat.php?catid=$data[0]'>$data[1]</a></b></td></tr>";

}
mysqli_close($cn);
?>

		</table>
	</div>

		<div style="width:800px; float:left">
			<table cellpadding="0px" cellspacing="0" width="1000px">
				<tr>
					<td class="headingText">Welcome to Hamro Yatra</td>
				</tr>
				<tr>
					<td class="paraText" width="900px">Plan and Book Your Perfect Trip.Create your dream holiday.
					what you like. Do what you love.
					What's New Explore new experiences, attractions, food and wine trends.
					What will you find during your visit to My Tour? Awe-inspiring natural beauty and the dreamatric jungle safari. Exhilarating outdoor adventures including
					hiking, camping or skiing on the Grand Mesa. Hundreds of miles of world-class mountain biking trails such as the Kokopelli Trail. A charming downtown full of great
					shops, restaurants, art galleries and so much more. This is My Tour, where you can experience
					beautiful tourist places.</td>
					<td style="background-image:url(images/13.jpg); background-repeat:no-repeat; color:#FFF; font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:24px; " width="700px" height="250px" >
						<div style="background:linear-gradient(#09F,#096,#09F); vertical-align:text-top; padding-left:5%;  width:100%;">Have a Great Day</div>
					</td>
				</tr>
			</table>

		</div>

</div>

<div style="clear:both"></div>
<?php include('./layouts/footer.php'); ?>
</body>
</html>