<?php include('./layouts/header.php'); ?>
<div style="height:50px"></div>
<div style="width:1000px; margin:auto" >

	<div style="width:200px; float:left">

		<table cellpadding="0" cellspacing="0" width="1000px">
			<tr><td style="font-size:18px" color="#09F">Category</td></tr>
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
			<tr><td class="headingText">Packages</td></tr>
			<tr>
				<td class="paraText" width="900px">

					<table cellpadding="0" cellspacing="0" width="900px">

					<?php
					$s="select * from package where package.subcategory='" . $_GET["subcatid"] ."'";
					$result=mysqli_query($cn,$s);
					$r=mysqli_num_rows($result);
					//echo $r;
					$n=0;
					while($data=mysqli_fetch_array($result))
					{
						if($n%3==0)
						{
					?>
						<tr>
						<?php 
						}?>
							<td>

								<table border="0" width="100px">

									<tr><td align="center" style="background-color:#60B0E6; font-size:20px; font-family:Lucida Calligraphy; color:#FFF"><?php echo $data[1]; ?></td></tr>
									<tr><td class="image"><img src="../Admin/packimages/<?php echo $data[5];?>" width="250px" height="250px" /></td></tr>
									<tr><td align="center" style="background-color:#60B0E6; font-size:20px; font-family:Lucida Calligraphy; color:#09F"><a href="detail.php?pid=<?php echo $data[0];   ?>"><font color="#FFFFFF">View Detail</font></a></td></tr>
								</table>
							</td>
							<?php

							if($n%3==2)
							{
							?>
						</tr>

						<?php
							}
						$n=$n+1;
					}
				mysqli_close($cn);
				?>

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