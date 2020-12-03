<?php
include './layouts/header.php';
?>
<!--About-->
     <div class="about section" id="section-2">
	  <div class="about-head text-center">
	  <h3>About Us</h3>
	  <span></span><img src="images/about-img.png" alt=""><span></span>
	  </div>
	   <div class="container">		  
		 <div class="col-md-4 about-grids">
			 <h4><span class="icon1"></span>Our Vision</h4>
			 <p>Tourism which is ethical, fair and a positive experience for both travellers and the people and places they visit</p>
		 </div>	
		 <div class="col-md-4 about-grids grid2">
			 <h4><span class="icon2"></span>Our Mission</h4>
			 <p>To ensure tourism always benefits local people by challenging bad practice and promoting better tourism</p>
		 </div>
		 <div class="col-md-4 about-grids">
			 <h4><span class="icon3"></span>Safety Information</h4>
			 <p>Vacation is a time to relax in safe surroundings.For emergency aid of any kind, call 911 from any phone... in your hotel, dial 9-911.</p>
             <div align="right"><a href="aboutus.php"><input type="button" value="Read More" name="sbmt" /></a></div> 
		 </div>
	 </div>
</div>
<!--/About-->
<!--top-tours-->	
<div  class="section" id="section-3">
<div id="portfolio" class="portfolio">
   <div class="top-tours-head text-center">
		  <h3>Gallery</h3>
		  <span></span><img src="images/star.png" alt=""><span></span>
		 
		  </div>
	      <ul id="filters" class="clearfix wow bounceIn" data-wow-delay="0.4s">
			<li><span class="filter active" data-filter="app card icon logo fun">ALL</span></li>
			<li><span class="filter" data-filter="app">Domestic Travel</span></li>
			<li><span class="filter" data-filter="icon">Short Tour</span></li>
			<li><span class="filter" data-filter="fun">Long Tour</span></li>
	        </ul>
	     <div id="portfoliolist">
					<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#" >
								<img src="./images/g1.jpg" class="img-responsive" alt=""/>
							</a>
						</div>
					</div>				
					<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#">
						     <img src="images/g2.jpg" class="img-responsive" alt=""/>
						 </a>
                            </div>
					</div>		
					<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#">
						     <img src="images/g3.jpg" class="img-responsive" alt=""/>
							 </a>
						</div>
					</div>				
					<div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#">
						     <img src="images/g12.jpg" class="img-responsive" alt=""/>
							 </a>	 
						</div>
					</div>	
					<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#">
						     <img src="images/g5.jpg" class="img-responsive" alt=""/>
						 	</a>
							 
						</div>
					</div>			
					<div class="portfolio fun mix_all" data-cat="fun" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#">
						     <img src="images/g11.jpg" class="img-responsive" alt=""/>
						 	</a>
							
						</div>
			      </div>
				  <div class="portfolio fun mix_all" data-cat="fun" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#">
							<img src="images/g10.jpg" class="img-responsive" alt=""/>
						</a>
							
						</div>
			      </div>
				  <div class="portfolio icon mix_all" data-cat="fun" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper wow bounceIn" data-wow-delay="0.4s">		
							<a href="#">
						     <img src="images/g8.jpg" class="img-responsive" alt=""/>
						 </a>
							 
					   </div>
			      </div>
		   <div class="clearfix"></div>	
	  </div>
</div>
</div>  
<!-- Script for gallery Here-->
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
<script type="text/javascript">
	$(function () {
		var filterList = {
		init: function () {
// MixItUp plugin
// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
				// call the hover effect
				onMixEnd: filterList.hoverEffect()
	});				
},
		hoverEffect: function () {
// Simple parallax effect
		$('#portfoliolist .portfolio').hover(
			function () {
			$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
			$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
			},
					function () {
						$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
			}		
		);				
	}
};
// Run the show!
		filterList.init();
	});	
	
</script>
<!--Gallery Script Ends-->	 
<!--/top-tours-->

<div id="section-4" class="contact section">
	  <div class="contact-head text-center">
		  <h3>Contact Us</h3>
		  <span></span><img src="images/mail.png" alt=""><span></span><br/><br/>
          <h4 style="color:#000">Plan Your Trip Our travel experts can help you book now!</h4>

		  <div class="contact-grids">
			  <div class="container">
				  <div class="col-md-4 address">
						<h4 style="color:#09F">Hamro Yatra</h4>
						<p style="color:#000">NEED HELP BOOKING PACKAGE<br/>
                        For fantastic suggestions you may also call our travel expert</p>
						<h5 style="color:#000"><span class="img1"></span>9845555551&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;9845232356</h5>
						<h5 style="color:#000"><span class="img2"></span><a href="https://www.mytour.com">mytour.com&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;mytour.com</a></h5>
						<h5 style="color:#000"><span class="img3"></span>KamalPokhari Kathamndu, Nepal</h5>
                        <br/>
                       
                      </div>
				  <div class="col-md-8 contact">
                  
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into contactus(Name,Phno,Email,Message) values('" . $_POST["name"] ."','" . $_POST["contact"] ."','" . $_POST["email"] ."','" . $_POST["message"] ."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Message Sent');</script>";
}
?>
<form method="post">
    <table border="0" width="700px" height="500px">
            <tr>
                 <td align="left">
                    <input type="text" class="text" value="Name" name="name" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Your Name';}" required>
                </td>
            </tr>

            <tr>
                <td align="left">
                    <input type="text" class="text" value=" Contact No" name="contact" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Your Contact NO';}" required>
                </td>
            </tr>

			<tr>
				<td align="left">
					<input type="text" class="text" value="Email" name="email" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Your mail';}" required>
			 	</td>
			</tr>

			<tr>
				<td>
					<textarea name="message" onFocus="if(this.value == 'Message') this.value='';"  onBlur="if(this.value == '') {this.value='Enter Your Message Here';}" required >Message</textarea>
				</td>
			</tr>

			<tr>
				<td>
					<input type="submit" value="Send message" name="sbmt">
				</td>
			</tr>

	</table>
	<div class="clearfix"></div>
</form>
</div>
<div class="clearfix"></div>
</div>
</div>
<?php include('./layouts/footer.php'); ?>
</body>
</html>

