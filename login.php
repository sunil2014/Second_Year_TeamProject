<?php 
ob_start();
session_start();
if (isset($_SESSION["authenticatedUser"]))
{
 header("Location: php_page.php");
 exit; // exit to stop the rest of your page (index.php for example) from processing.
}
?>

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
					<div class="active">
						<img src="./images/pitch/login.jpg" alt="" />
						<div class="overlay transparent">
						</div>
						<p class="arrow"><a href="#"> </a></p>
					</div>
					
					<div class="active">
						<img src="./images/pitch/login.jpg" alt="" />
						<div class="overlay transparent">
						</div>
						<p class="arrow"><a href="#"> </a></p>
					</div>
					
					<div class="active">
						<img src="./images/pitch/login.jpg" alt="" />
						<div class="overlay transparent">
						</div>
						<p class="arrow"><a href="#"> </a></p>
					</div>
					
					
				</div>
			</div>
			<!-- /pitch -->
			
			<!-- main -->
			<div id="main">
				<h2 class="inner">Login</h2>
			<div id="page">

<form name="login" method="post" action="./loginAction.php">
<fieldset>  
<table class="loginstyle">  
<tr class="loginstyle">  
<td class="loginstyle"><label for="username"><h4>Username :</h4></label></td><td><input name="username" type="text" id="username" size="30"></td>  
</tr>  
<tr>  
<td><label for="password"><h4>Password :</h4></label></td><td><input name="password" type="password" id="password" size="30"></td>  
</tr>  
<tr>  
<td class="submit"></td><td><input type="IMAGE" src="images/loginbutton.png" name="Submit" value=" Login "></td>  
</tr>  
</table>  
</fieldset>  
</form>  				
<br />
<?php
	echo "<h4 align='left'>".$_SESSION["message"]."</h4>";
	?>

			</div>
		
			</div>
			<!-- /main -->
			
			<!-- side -->
			<div id="side">
				<h2>Help</h2>
				
				<div class="register">
					<p>Not a user? No problem, click the link below to register!</p>
					<h4><a href="register.php">Register Now</a></h4>
				</div>
				<br>
				<div class="passwordreset">
					<p>Having trouble remembering your password? Click the link below to reset your password!</p>
					<h4><a href="forgotpass.php">Forgotten Password</a></h4> <br><br>
				<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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
					
					<p id="copy">Copyright Protected <span>Silver Ice &copy;</span></p><button onClick="alert('This Website is Copyright Protected since 2013!'); return false;"> More Info </button> 
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- /footer -->
		
	</div>
</body>
</html>