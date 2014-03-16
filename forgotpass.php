<?php
// Start a session
session_start();
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
		<script>
function goBack()
  {
  window.history.back()
  }
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
				<h2 class="inner">Forgot Password</h2>
			<div id="page">

<?php
/**
 * ShuttleCMS - A basic CMS coded in PHP.
 * Password Reset - Used for allowing a user to reset password
 * 
 * @author Dan <dan@danbriant.com>
 * @version 0.0.1
 * @package ShuttleCMS
 */
define('IN_SCRIPT', true);

//Connect to the MySQL Database
include 'connection.php';

//this function will display error messages in alert boxes, used for login forms so if a field is invalid it will still keep the info
//use error('foobar');
function error($msg) {
    ?>
    <html>
    <head>
    <script language="JavaScript">
    <!--
        alert("<?=$msg?>");
        history.back();
    //-->
    </script>
    </head>
    <body>
    </body>
    </html>
    <?
    exit;
}

//This functions checks and makes sure the email address that is being added to database is valid in format. 
function check_email_address($email) {
  // First, we check that there's one @ symbol, and that the lengths are right
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
     if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
      return false;
    }
  }  
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}


if (isset($_POST['submit'])) {
	
	if ($_POST['forgotpassword']=='') {
		error('Please Fill in Email.');
	}
	if(get_magic_quotes_gpc()) {
		$forgotpassword = htmlspecialchars(stripslashes($_POST['forgotpassword']));
	} 
	else {
		$forgotpassword = htmlspecialchars($_POST['forgotpassword']);
	}
	//Make sure it's a valid email address, last thing we want is some sort of exploit!
	if (!check_email_address($_POST['forgotpassword'])) {
  		error('Email Not Valid - Must be in format of name@domain.tld');
	}
    // Lets see if the email exists
    $sql = "SELECT COUNT(*) FROM addcustomer WHERE Email = '$forgotpassword'";
    $result = mysql_query($sql)or die('Could not find member: ' . mysql_error());
    if (!mysql_result($result,0,0)>0) {
        error('Email Not Found!');
    }

	//Generate a RANDOM MD5 Hash for a password
	$random_password=md5(uniqid(rand()));
	
	//Take the first 8 digits and use them as the password we intend to email the user
	$emailpassword=substr($random_password, 0, 8);
	
	//Encrypt $emailpassword in MD5 format for the database
	$newpassword = md5($emailpassword);
	
        // Make a safe query
       	$query = sprintf("UPDATE `addcustomer` SET `Password` = '%s' 
						  WHERE `Email` = '$forgotpassword'",
                    mysql_real_escape_string($newpassword));
					
					mysql_query($query)or die('Could not update members: ' . mysql_error());

//Email out the infromation
$subject = "Your New Password"; 
$message = "Your new password is as follows:
---------------------------- 
Password: $emailpassword
---------------------------- 
Please make note this information has been encrypted into our database 

This email was automatically generated."; 
                       
          if(mail($forgotpassword, $subject, $message,  "FROM: $site_name <$site_email>")){ 
              
          }else{ 
                error('New Password Sent!.');
         } 
		
	}
	
else {
?>
      <form name="forgotpasswordform" action="" method="post">
        <table border="0" cellspacing="0" cellpadding="3" >
          <caption>
          <h2 align='left'>Enter your email address</h2><br/>
          </caption>
          <tr>
            <td>Email Address:</td>
            <td><input name="forgotpassword" type="text" value="" id="forgotpassword" /></td>
          </tr>
          <tr>
            <td colspan="2" class="footer"><input type="submit" name="submit" value="Submit" class="mainoption" /></td>
          </tr>
        </table>
      </form>
      <br/>
      <br/>
     
      <?
}
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
					
					<p id="copy">Copyright Protected <span>Silver Ice &copy;</span></p><button onClick="alert('This Website is Copyright Protected since 2013!'); return false;">More Info</button> 
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- /footer -->
		
	</div>
</body>
</html>