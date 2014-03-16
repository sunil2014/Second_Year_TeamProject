<?php
//Put all the connection details in the connection.php file 
include "./mysql_connect.php"; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Silver Ice</title>
	<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/slideshow.js"></script>
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/Arial.font.js"></script>
	<script  id='googlecart-script' type='text/javascript' src='https://checkout.google.com/seller/gsc/v2_2/cart.js?mid=532343890291336' integration='jscart-wizard' post-cart-to-sandbox='true' currency='GBP' productWeightUnits='KG'></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,#menu,#copy,.blog-date');
	</script>
	<script type="text/javascript" src="js/fancyzoom.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('div.photo a').fancyZoom({scaleImg: true, closeOnClick: true});
		});
	</script>
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="icon" 
      type="image/gif" 
      href="favicon.png">
</head>
<body>
	<div id="bg">
		<div class="wrap">
			
			<!-- logo -->
			<h1><img src="images/logo.png" width="35" height="35"/></h1><h1><a href="index.php">Silver ice</a></h1>
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
					
					<!-- 1st frame -->
					<!--<div class="active">
						<img src="images/black.jpg" alt="" />
						<div class="overlay transparent">
							<h1>Games &amp; Movies</h1>
						</div>
						<p class="arrow"><a href="#"></a></p>
					</div> -->
					<!-- /1st frame -->
					
				</div>
			</div>
			<!-- /pitch -->
			
			<!-- main -->
			<div id="main">
				<div id="page">
					<h2 class="inner">Browse</h2>
					<p>Browse our media collection and buy now whilst stocks last!</p>
						
					<br />
					<!--<h4>Box Examples</h4>
					<br />
					
					<!-- half boxes -->
					<!--<div class="half">
						<h4>Box</h4>
						<p>LOLOL</p>
					</div>
					<div class="half last">
						<h4>Box</h4>
						<p>TROLOLOL</p>
					</div>
					<!-- /half boxes -->
					
					<!-- third boxes -->
					<!--<div class="third">
						<h4>Box</h4>
						<p>UNDERTAKER</p>
					</div>
					<div class="third">
						<h4>Box</h4>
						<p>PAUL BEARER</p>
					</div>
					<!--<div class="third last">
						<h4>Box</h4>
						<p>KANE</p>
					</div>
					<!-- /third boxes -->
					
					<div class="clear"></div>					
					
				</div>
			</div>
			<!-- /main -->
			
			<!-- side -->
			<div id="side">
				<h4>Games - Platform</h4>
				<p>Paul Bearer and the Undertaker will prevail!</p>
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
						<a href="#">Terms and Conditions</a>
					</p>
					<!-- /footer links -->
					
					<p id="copy">Copyright Protected <span>Silver Ice &copy;</span></p><button onClick="alert('This Website is Copyright Protected since 2013!'); return false;"> More Info </button> 
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- /footer -->
		
	</div>
</body>
</html>