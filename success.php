<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Silver Ice - Login</title>
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
					<div class="active">
						<img src="images/pitch/contactus.png" alt="Contact us" />
						<div class="overlay transparent">
							
						</div>
						<p class="arrow"><a href="#"></a></p>
					</div>
					<!-- /1st frame -->
					
					<!-- frame -->
					<div class="active">
						<img src="images/pitch/contactus.png" alt="Contact us" />
						<div class="overlay transparent">
							
						</div>
						<p class="arrow"><a href="#"></a></p>
					</div>
					<!-- /frame -->
					
					<!-- frame -->
					<div class="active">
						<img src="images/pitch/contactus.png" alt="Contact us" />
						<div class="overlay transparent">
							
						</div>
						<p class="arrow"><a href="#"></a></p>
					</div>
					<!-- /frame -->
					
				</div>
			</div>
			<!-- /pitch -->
		
			<!-- main -->
			<div id="main">
				<h2 class="inner">Success</h2>
				<?php
if (isset($_POST['email']))
//if "email" is filled out, send email
  {
  //send email
    $name=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$message=$_POST["text"];
  mail("c3333380@inn.leedsmet.ac.uk", $name,
  $message, $phone, "From:" . $email);
  	echo "<h2><strong>Your feedback</strong></h2><br /> "; // I only use echo because its slightly FASTER than PRINT!
	echo "Thank you for contacting us <strong>$name</strong> we will reply to your query within 48 hours.<br />";
	echo "<br /><strong>Your submission:</strong><br /> <br />Name:<strong>$name</strong><br />Email Address:<strong>$email</strong><br />Contact number:<strong>$phone</strong><br />Message:<strong>$message</strong><br />";
	echo "<br /><strong>Thank you.</strong>";
	echo "<h6>*All information is fowarded to our site email address.</h6><br>";
  }
else
//if "email" is not filled out, display the form
  {
echo "<a href='./index.php'><strong>An error has occured, click here to go back...</strong></a>";
  }
?>
<br /><br /><br /><br /><br />
<a href="./index.php"><strong>Go back to our Home page</strong></a> 
			</div>
			<!-- /main -->
			
			<!-- side -->
			<div id="side">
				<h4>Contact Details</h4>
				
				<div class="news">
					<h5><a href="#">Business Address:</a></h5>
					<p><strong>Silver Ice<br>
					   Media Road<br>
					   SI6 1C3</strong>
					</p>
				</div>
				
				<div class="news">
					<h5><a href="#">Telephone:</a></h5>
					<p><strong>0845 3662 288</strong><br><h6>*15p Per Minute</h6></p>
				</div>
				
				<div class="news">
					<h5><a href="#">Alternative Email Address:</a></h5>
					<p><strong>support@silverice.com</strong></p>
				</div>
				
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
					
					<p id="copy">Copyright Protected <span>Silver Ice &copy;</span></p><button onClick="alert('This Website is Copyright Protected since 2013!'); return false;">More Info</button> 
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- /footer -->
		
	</div>
</body>
</html>