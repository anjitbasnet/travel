
<?php 
include('layouts/header.php'); 
include('function.php'); 
?>

<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
	<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('layouts/sidebar.php'); ?>
	</div>
	<div class="col-sm-9">
		<form method="post">
			<table border="0" width="90%" height="300px" align="center" class="tableshadow">
				<tr>
					<td class="toptd">View Enquiry</td>
				</tr>
				<tr>
					<td align="center" valign="top" style="padding-top:10px;">
						<table border="0" align="center" width="95%">
							<tr><td style="font-size:15px; padding:5px; font-weight:bold;" >Package Name</td>
								<td style="font-size:15px; padding:5px; font-weight:bold; ">Package Id</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Name</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Gender</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Mobile No.</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Email</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">No.of Days</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">No.of Children</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">no.of Adults</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Status Field</td>
							</tr>

							<?php
							$conn=makeconnection();
							$selectQuery="SELECT * from enquiry,package 
										WHERE enquiry.Packageid=package.Packid";
							$result=mysqli_query($conn,$selectQuery);
							$r=mysqli_num_rows($result);
							//echo $r;

							while($data=mysqli_fetch_array($result))
							{
								echo "<td style=' padding:5px;'>$data[12]</td>
								<td style=' padding:5px;'>$data[1]</td>
								<td style=' padding:5px;'>$data[2]</td>
								<td style=' padding:5px;'>$data[3]</td>
								<td style=' padding:5px;'>$data[4]</td>
								<td style=' padding:5px;'>$data[5]</td>
								<td style=' padding:5px;'>$data[6]</td>
								<td style=' padding:5px;'>$data[7]</td>
								<td style=' padding:5px;'>$data[8]</td>
								<td style=' padding:5px;'><a href='chstatus.php?eid=$data[0]'>$data[10]</a></td>
								</tr>";

							}

							?>

					</table>
				</td>
			</tr>
		</table>
	</form>
</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>