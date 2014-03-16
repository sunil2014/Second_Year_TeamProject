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
  }//this function is declared for javascript back button
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
				<h2 class="inner">Registration</h2>
			<div id="page">
<?php
include_once "functions.php";//this function includes the php page functions within this page
connect();//connection
					
//below is the html5 form used for registering users
if(!$_POST['submit']){
    echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
    echo "<form method=\"post\" action=\"register.php\">\n";
    echo "<tr><td colspan=\"2\" align=\"center\">Registration Form</td></tr>\n";
	echo "<tr><td>Firstname</td><td><input type=\"text\" name=\"firstname\" required></td></tr>\n";
	echo "<tr><td>Lastname</td><td><input type=\"text\" name=\"lastname\" required></td></tr>\n";
    echo "<tr><td>Username</td><td><input type=\"text\" name=\"username\" required></td></tr>\n";
    echo "<tr><td>Password</td><td><input type=\"password\" name=\"password\" required></td></tr>\n";
    echo "<tr><td>E-Mail</td><td><input type=\"email\" name=\"email\" required></td></tr>\n";
    echo "<tr><td colspan=\"2\" align=\"center\"><input type=\"image\" src=\"./images/registerbutton.png\" name=\"submit\" value=\"Register\"></td></tr>\n";
    echo "</form></table>\n";
}else {
	$firstname = protect($_POST['firstname']);//the variables are declared for the form fields
	$lastname = protect($_POST['lastname']);//the protect function is called from functions page we declared this earlier
	$username = protect($_POST['username']);
    $password = protect($_POST['password']);
    $email = protect($_POST['email']);

    
    $errors = array();
    
        if (isset($_POST)) {
		if(empty($_POST[$firstname]) || empty($_POST[$lastname]) || empty($_POST[$username]) || empty($_POST[$password]) || empty($_POST[$email]))//this statement prevents blank input being stored into the database
		{
			
        if($username){
            if(!ctype_alnum($username)){
                $errors[] = "Username can only contain numbers and letters!";//validation for username field
            }
            
            $range = range(1,32);
            if(!in_array(strlen($username),$range)){
                $errors[] = "Username must be between 1 and 32 characters!";//string length method used to restrict amount of characters within username field validation
            }
        }
        
        
        
        if($email){
            $checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";//this is used for correct format of email
            if(!preg_match($checkemail, $email)){
                $errors[] = "E-mail is not valid, must be name@server.tld!";
            }
        }
        
        if($name){
            $range2 = range(3,64);
            if(!in_array(strlen($name),$range2)){
                $errors[] = "Your name must be between 3 and 64 characters!";//string length function used again for name field
            }
        }
        
       
        
        if($username){
            $sql = "SELECT * FROM `addcustomer` WHERE `Username`='".$username."'";//this statement brings up an error message if user tries to register with an existing username
            $res = mysql_query($sql) or die(mysql_error());
            
                if(mysql_num_rows($res) > 0){
                    $errors[] = "<h4>This username already exists!</br></br>
                    <a href='login.php'>Please click here if you would like to login...</a></br>
                    </br>Otherwise, go back to try another</br></br>
                    <input type='button' value='Back' onclick='goBack()'></h4>";//this message then allows users to either login, or go back to try another 
                }
        }
        
        if($email){
            $sql2 = "SELECT * FROM `addcustomer` WHERE `Email`='".$email."'";//this statement as above shows error message if user tries to create an account with an existing email address
            $res2 = mysql_query($sql2) or die(mysql_error());
            
                if(mysql_num_rows($res2) > 0){
                    $errors[] = "<h3>An account with this email already exists</br></br>
                    <a href='forgotpass.php'>Please click here to retrieve your crudentials</a>
                    </br>Otherwise, go back to try another</br></br>
                    <input type='button' value='Back' onclick='goBack()'></h3>";//options to retrieve 
                }
        }
        
        
        }
        
        if(count($errors) > 0){
            foreach($errors AS $error){
                echo $error . "<br>\n";
            }
        }else {
            $sql4 = "INSERT INTO `addcustomer`
                    (`Firstname`,`Lastname`,`Username`,`Password`,`Email`)
                    VALUES ('".$firstname."','".$lastname."','".$username."','".md5($password)."','".$email."')";
            $res4 = mysql_query($sql4) or die(mysql_error());
            echo " <h3>Thank you, <b>".$firstname."</b> <b>".$lastname." for Registering</h3></br></br> 
            <h3><a href='login.php'>Please Click here to Login</a></h3> ";
        }  
        }
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