
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
					<td class="toptd">View ContactUS</td>
				</tr>
				<tr>
					<td align="center" valign="top" style="padding-top:10px;">
						<table border="0" align="center" width="95%">
							<tr>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Name</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Phone No.</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Email</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Message</td>	
							</tr>

						<?php

						$selectQuery="SELECT * from contactus";
						$result=mysqli_query($cn,$selectQuery);
						$r=mysqli_num_rows($result);
						//echo $r;

						while($data=mysqli_fetch_array($result))
						{
	
							echo "<tr><td style=' padding:5px;'>$data[1]</td>
										<td style=' padding:5px;'>$data[2]</td>
										<td style=' padding:5px;'>$data[3]</td>
										<td style=' padding:5px;'>$data[4]</td>
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