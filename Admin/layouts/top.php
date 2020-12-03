<?php
session_start();
include '../app/call.php';
if(!checkAdminLogin())
{
	redirect('login.php');
}

?>
	 	 <div class="header-top">
		 <!--container-->
		  <div class="container">
			 <div class="top-nav">
						<div class="logo">
						<!-- <a href="index.php"><img style="height: 70px; width: 150px" src="../user/images/logo.jpg" id="section-1" class="img-responsive" alt=""/></a> -->
						<table>
						<tr>
							<td class="headingText">Welcome to Hamro Yatra</td>
						</tr>
					</table>
						</div>
						<div class="menu">
						<ul id="nav">
							 <li><a href="../user/index.php" target="_blank">Preview Website</a></li>
							 <li><a href="logout.php">Log Out</a></li>
						     <div class="clearfix"></div>
						 </ul>
						 </div>
			 </div>
			  <div class="clearfix"> </div>
			

		 </div>
		 <!--/container-->
	 </div>