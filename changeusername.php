<?php
ob_start();
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Silver Ice - User Page</title>
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
				<h2 class="inner">Change Username</h2>
<div id="page">
<?php
session_start();

$user = $_SESSION["authenticatedUser"];

if ($user)
{
//user is logged in

if ($_POST['submit'])
{
	//check fields
	$oldusername = $_POST['oldusername'];
	$newusername = $_POST['newusername'];
	$repeatnewusername = $_POST['repeatnewusername'];
	
	// check password
	
	//connectdb
	include "./connection.php";
	$queryget = mysql_query("SELECT Username FROM addcustomer WHERE Username= '$user'") or die("Query didnt work");
	$row = mysql_fetch_assoc($queryget);
	
	$oldusernamedb = $row['Username'];
	//check usernames
	if ($oldusername==$oldusernamedb)
	{
		//check two new passwords
		if ($newusername==$repeatnewusername)
		{
			//success
			//change password in database
			
		$querychange = mysql_query("
		
		UPDATE addcustomer SET Username='$newusername' WHERE Username='$user'
		");	
		session_destroy();
		die("Your Username has been changed. <a href='login.php'>Return To Login Page</a>");
		
		}else
			die("New usernames don't match!");
		
		
	}
	else
		die("Old username doesnt match!");
}	
else
{
echo"
<form name='changeuser' method='POST' action='./changeusername.php'>
<fieldset>  
<table class='loginstyle'>  
<tr class='loginstyle'>  
<td class='loginstyle'><label for='username'><h4>Current Username :</h4></label></td><td><input type='text' name='oldusername' size='30'></td>  
</tr>  
<tr>  
<td><label for='newusername'><h4>New Username :</h4></label></td><td><input type='text' name='newusername' size='30'></td>  
</tr>  
<tr>  
<td><label for='newusernamerepeat'><h4>Repeat New Username :</h4></label></td><td><input type='text' name='repeatnewusername' size='30'></td>  
</tr>  
<tr>  
<td class='submit'></td><td><input type='IMAGE' src='images/userbutton.png' name='submit' value='Change Password'></td>  
</tr>  
</table>  
</fieldset>  
</form> ";
}
} else
	die("You must be logged in to change your username!");

?><br /><br />
<?php echo "<h4 align='left'>".$_SESSION["authenticatedUser"]." would you like to <a href='./logout.php'>Logout?</a>"."</h4>" ?>
<br /><br />
			</div>
		
			</div>
			<!-- /main -->
			
			<!-- side -->
			<div id="side">
				<h2>Change Password?</h2>
				<img width="200" height="120" src='./images/lock.png'/><br /><br />
				<h3><a href='changepassword.php'>Change Password</a></h3>
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
<?php  
} 
?>


