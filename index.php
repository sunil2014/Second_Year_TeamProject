<?php
session_start();
$user = $_SESSION["authenticatedUser"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Silver Ice - Home</title>
	<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script> <!--(Linked Query Library) Linking in my JS files/scripts-->
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/slideshow.js"></script>
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/Arial.font.js"></script>
	<script type="text/javascript" src="js/loading.js"></script>
	<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/c/video.js"></script>
	<script src="paypal-button.min.js?merchant=barclays_2012@live.co.uk" 
    data-button="buynow" 
    data-name="Xbox 360" 
    data-quantity="1" 
    data-amount="19.00" 
    data-shipping="0.99" 
    data-callback="www.ign.com"
></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,#menu,#copy,.blog-date');
	</script>
	<script type="text/javascript" src="js/fancyzoom.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('div.photo a').fancyZoom({directory: 'images/zoom', scaleImg: true, closeOnClick: true}); //Closes on click from user (JS Event)
		});
	</script>
	<script  id='googlecart-script' type='text/javascript' src='https://checkout.google.com/seller/gsc/v2_2/cart.js?mid=532343890291336' integration='jscart-wizard' post-cart-to-sandbox='true' currency='GBP' productWeightUnits='KG'></script>
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="icon" 
      type="image/gif" 
      href="favicon.png">
</head>
<body>
	<div id="bg">
		<div class="wrap">
			
			<!-- logo -->
			 <h1><img src="images/logo.png" width="35" height="35"/></h1><h1><a href="index.php">Silver Ice</a></h1>
			<!-- /logo -->
			
			<!-- menu -->
			<div id="mainmenu">
				<ul id="menu">
					<li><a class="current" href="index.php">Home</a></li>
					<li><a href="inner.php">Movies &amp; Games</a>
						<ul><li><a href="games.php">Games</a></li><li><a href="movies.php">Movies</a></li></ul>
					</li>
					<li><a href="http://www.leedsmet.ac.uk/" target="_blank">X-Stream</a></li>
					<li><a href="login.php">Log In</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contact.html">Contact Us</a></li>
				</ul>
			</div>
			<!-- /menu -->
			
			<!-- pitch -->
			<div id="pitch">
				<div id="slideshow">
					
					<!-- Frame -->
					<div class="active">
						<img src="images/pitch/slideshowimg7.jpg" alt="GTA V" />
						<div class="overlay transparent"><br><br><br>
							<h1>Grand Theft Auto V <br>Pre-order now</h1>
						</div>
						<p class="arrow"><a href="./bigsale.html"></a></p>
					</div>
					<!-- /Frame -->
					
					<!-- 1st frame -->
					<div class="activate">
						<img src="images/pitch/slideshowimg6.jpg" alt="Halo 3 Sale" />
						<div class="overlay transparent"><br><br><br>
							<h1>Halo Reach <br>60% off!</h1>
						</div>
						<p class="arrow"><a href="./bigsale.html"></a></p>
					</div>
					<!-- /1st frame -->
					
					<!-- 2nd frame -->
					<div>
						<img src="images/pitch/slideshowimg4.jpg" alt="The Elder Scrolls V: Skyrim sale" />
						<div class="overlay transparent"><br><br><br>
						<h1>TES: Skyrim <br>65% off!</h1>	
						</div>
						<p class="arrow"><a href="./bigsale.html"></a></p>
					</div>
					<!-- /2nd frame -->
					
					<!-- 3rd frame -->
					<div>
						<img src="images/pitch/slideshowimg1.jpg " alt="Nintendo Sale" />
						<div class="overlay transparent"><br><br><br><br>
							<h1 id="colour">Nintendo Sale!</h1>
						</div>
						<p class="arrow"><a href="./bigsale.html"></a></p>
					</div>
					<!-- 3rd frame -->
					
					<!-- 4th frame -->
					<div>
						<img src="images/pitch/slideshowimg3.jpg" alt="The Walking Dead" />
						<div class="overlay transparent">
							<h1>The Walking Dead<br>20% off!</h1>
						</div>
						<p class="arrow"><a href="./bigsale.html"></a></p>
					</div>
					<!-- 4th frame -->
					
					<!-- 5th frame -->
					<div>
						<img src="images/pitch/slideshowimg2.jpg" alt="Mass Effect 3 Sale" />
						<div class="overlay transparent"><br><br><br>
						<h1>Mass Effect 3<br>50% off!</h1>	
						</div>
						<p class="arrow"><a href="./bigsale.html"></a></p>
					</div>
					<!-- 5th frame -->
					
				</div>
			</div>
			<!-- /pitch -->
			
			<!-- main -->
			<div id="main">
				<div id="intro">
<?php 
if ($user)
{
echo "<h2 align='left'>"."Welcome ".$_SESSION["authenticatedUser"]." - "."<a href='./php_page.php'>My Account?</a>"."</h2>";

}
else {
	echo "<h2>Welcome</h2>";
}
?>
					<p>Hi, and welcome to Silver Ice on our site you will find the largest range of video games and movies available to this date, please feel free to browse the site &amp; purchase 
						anything from our vast collection of quality media. </p>
						<!-- Gte method posts results into browser URL -->
						<form action="search.php" method="GET">
<b>Enter Search Term:</b> <input type="text" name="term" size="50"> <b>Results:</b> <select name="results">
    <option>10</option>
    <option>20</option>
    <option>50</option>
</select>
<input type="submit" value="Search">
</form><br /><br />
<h4>Bioshock Infinite: Pre-order now!</h4>
<div class="photo">
	<!-- HTML5 Video PLayer Script --> <!-- Poster THumbnail set to video when in unplayed state -->
<video id="bioshocktrailer" class="video-js vjs-default-skin" controls
preload="auto" width="705" height="390" poster="images/bioshock.jpg"
data-setup="{}">
<source src="./videos/bioshock.mp4" type='video/mp4'>
<source src="./video.webm" type='video/webm'>
</video>
</div>						
						
				</div>
				<!-- bits -->
				<div id="bits">
					<div class="bit">
						<h4>Deal of the Day</h4>
						<div class="photo">
							<a href="#approach"><img src="images/thumb1.png" alt="Xbox - Mafia II - Deal of the day" /></a>
						</div>
						<p><strong>Mafia II - 30% off! <br>RRP: &pound;16.99 <br>Our Price: &pound;11.89 </strong>
<!-- Original PayPal button consideration -->
<!--<p class="more"><a href="#"><h3>Buy Now</h3></a></p>-->
<!--<script src="paypal-button.min.js?merchant=barclays_2012@live.co.uk" 
    data-button="buynow" 
    data-name="PS3: Mafia II" 
    data-quantity="1" 
    data-amount="16.99" 
    data-shipping="0.99" 
    data-callback="www.silverice.com"
>-->
</script>
<br>
<div class="product"><input type="hidden" class="product-title" value="PS3: Mafia II">
<input type="hidden" class="product-image" value="http://cdn4.spong.com/pack/m/a/mafiaii333719l/_-Mafia-II-PS3-_.jpg">
<input type="hidden" class="product-price" value="11.89"><div class="googlecart-add-button" tabindex="0" role="button" title="Add to cart">
</div>
</div>
						<div id="approach">
							<img src="images/dof1.jpg" alt="Approach" />
						</div>
					</div>
					
					
					<div class="bit">
						<h4>50% Off Exclusive!</h4>
						<div class="photo">
							<a href="#methods"><img src="images/thumb2.png" alt="Dead Rising - Exclusive Deal" /></a>
						</div>
						<p><strong>Dead Rising - 50% off! <br>RRP: &pound;9.99 <br>Our Price: &pound;4.98 </strong>
	<!-- Original PayPal button consideration -->
	<!--<p class="more"><a href="#"><h3>Buy Now</h3></a></p>-->
	<!--<script src="paypal-button.min.js?merchant=barclays_2012@live.co.uk" 
    data-button="buynow" 
    data-name="Xbox 360: Dead Rising" 
    data-quantity="1" 
    data-amount="4.98" 
    data-shipping="0.99" 
    data-callback="www.silverice.com"
></script>-->
<br>
<div class="product"><input type="hidden" class="product-title" value="XBOX 360: Dead Rising">
<input type="hidden" class="product-image" value="http://www.cosmetiholic.com/images/deadrising.jpg">
<input type="hidden" class="product-price" value="4.98"><div class="googlecart-add-button" tabindex="0" role="button" title="Add to cart">
</div>
</div>
						<div id="methods">
							<img src="images/dof2.jpg" alt="Dead Rising" />
						</div>
					</div>
					
					
					
					

					<div class="bit last">
						<h4>70% off Exclusive!</h4>
						<div class="photo">
							<a href="#results"><img src="images/thumb3.png" alt="Street Fighter IV - 70% off" /></a>
						</div>						
						<p><strong>Street Fighter IV - 70% off! <br>RRP: &pound;21.99 <br>Our Price: &pound;6.69 </strong>
	<!-- Original PayPal button consideration -->
	<!--<p class="more"><a href="#"><h3>Buy Now</h3></a></p>-->
	<!--<script src="paypal-button.min.js?merchant=barclays_2012@live.co.uk" 
    data-button="buynow" 
    data-name="PC: Street Fighter IV" 
    data-quantity="1" 
    data-amount="6.69" 
    data-shipping="0.99" 
    data-callback="www.silverice.com"
></script> -->
<br>
<div class="product"><input type="hidden" class="product-title" value="PC: Street Fighter IV">
<input type="hidden" class="product-image" value="http://greleases.com/bg_bilder/street-fighter-iv-pc-boxart.jpg">
<input type="hidden" class="product-price" value="6.69"><div class="googlecart-add-button" tabindex="0" role="button" title="Add to cart">
</div>
</div>


<div id="results">
<img src="images/dof3.jpg" alt="Results" />
</div>
</div>
					
					
		
					
					
					<div class="clear"></div>
				</div>
				<!-- /bits -->
		
			</div>
			<!-- /main -->
			
			<!-- side -->
			<div id="side">
				<h4>Upcoming Movies</h4>
				
				<div class="news">
					<h5><a href="#">The Wolverine</a></h5>
					<img width="196" height="96" src="images/wolverine.jpg"/>
					<p>Catch The Wolverine at your local cinema soon. <br><br><strong>In Theaters: Friday, July 26, 2013</strong></p>
				</div>
				
				<div class="news">
					<h5><a href="#">Olympus</a></h5>
					<img width="196" height="96" src="images/olympus.jpg"/>
					<p>One of the most anticipated movies this year, don't miss it. <br><br><strong>In Theaters: Friday, March 22, 2013</strong></p>
				</div>
				
				<div class="news">
					<h5><a href="#">300: Rise of an Empire</a></h5>
					<img width="196" height="96" src="images/300.jpg"/>
					<p>Prepare for this action packed movie to explode onto your screens, coming soon. <br><br><strong>In Theaters: Friday, August 2, 2013</strong></p>
				</div>
				
				<div class="news">
					<h5><a href="#">Friend and Follow us on:</a></h5>
					<img src="images/sponsor2.jpg" alt="IGN Sponsor" width="196" height="96" />
					<h5><a href="#">Facebook and Twitter:</a></h5>
				</div>
				
				<!--<div class="news">
					<h5><a href="#">Join the Playstation Network</a></h5>
					<a href="http://www.sony.com/" target="_blank"><img src="images/sponsor1.jpg" alt="SONY Sponsor" width="196" height="102" /></a>
				</div> -->
                
			</div>
			<!-- /side -->
		</div>
			
		<!-- footer -->
		<div id="footer">
			<div id="footerbg">
				<div class="wrap">
				
					<!-- footer links -->
					<p id="footer_menu">
						<a href="https://x-stream.leedsmet.ac.uk/" target="_blank">Hosted by X-Stream</a>
						<a href="#">Contact Us</a>
						<a href="http://www.inn.leedsmet.ac.uk/~c3348356/">Mobile Site</a>

					</p>
					<!-- /footer links -->
					
					<p id="copy">Copyright Protected <span>Silver Ice &copy;</span></p><button onClick="alert('This Website is Copyright Protected since 2013!'); return false;"> More Info </button> 
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- /footer -->
		
	</div>
	
	<div class="modal"><!-- Place at bottom of page --></div>
</body>
</html>
