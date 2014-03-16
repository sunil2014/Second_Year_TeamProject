<?php
ob_start();
session_start();
// Check if we have an authenticated user
if (!isset($_SESSION["authenticatedUser"]))
if (!isset($_SESSION["is_admin"]))
//if not re-direct to login page
{
$_SESSION["message"] = "Please Login";
header("Location: ./login.php");
}
else
{ 
//If authenticated then display page contents

include "connection.php";  

//get id of record
$CustomerID=$_GET['id'];

// create query 
$query = "SELECT * FROM addcustomer WHERE CustomerID = '$CustomerID'"; 

// execute query - put the results in $result (an array) 
$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 

//Check to see you have got at least 1 record 
if (mysql_num_rows($result) > 0) 
{
$row = mysql_fetch_array($result);

//print out record details on a form     
//Otherwise no rows found 
	} // end if
		else echo "No rows found"; 
}
	//function closeconnection($connection){ //get it passed as a function
    //mysql_close($connection);
//}

//closeconnection($connection);
	// Close the DBMS connection  
	//PHP Closes connections at the end of the script...
  // Print message if there is one
   if (isset($_SESSION["message"]))
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
			<h1><img src="images/logo.png" width="35" height="35"/></h1><h1><a href="index.html">Silver ice</a></h1>
			<!-- /logo -->
			
			<!-- menu -->
			<div id="mainmenu">
				<ul id="menu">
					<li><a class="current" href="index.html">Home</a></li>
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
				<h2 class="inner">Log on</h2>
			<div id="page">
				
<h3>Customer Ammend/Delete Form</h3>
<form name="form1" id="form1" method="POST" action= "customerChangeDeleteAction.php"> 
<table width="100%"  border="0"> 
        <tr> 
          <td width="25%"><strong>Customer ID</strong> </td> 
          <td width="75%"><input type="hidden" name="txtID" value="<?php echo $row["CustomerID"]; ?>" /><?php echo $row["CustomerID"]; ?><font size="2"> (Locked Value)</font></td> 
        </tr> 
        <tr> 
          <td><strong>First Name(s)</strong></td> 
          <td><input type="text" name="txtFirst" value="<?php echo $row["Firstname"]; ?>"/></td> 
        </tr> 
        <tr> 
          <td><strong>Surname</strong></td> 
          <td><input type="text" name="txtSurname"  value="<?php echo  $row["Lastname"]; ?>"/></td> 
        </tr> 
        <tr> 
          <td><strong>User Name</strong></td> 
          <td><input type="text" name="txtUser" value="<?php echo $row["Username"]; ?>"/></td> 
        </tr> 
		<tr> 
          <td><strong>Email</strong></td> 
          <td><input type="text" name="txtEmail" value="<?php echo $row["Email"]; ?>"/></td> 
        </tr>
		<tr> 
          <td><strong>Password</strong></td> 
          <td><input type="text" name="txtPassword" value="<?php echo $row["Password"]; ?>"/></td> 
        </tr>
        <tr><td><input name="Amend" type="Submit" value="Amend" /></td><td><input name="Delete" type="Submit" value="Delete" /></td>
        	<td><input type="button" value="Back" onclick="goBack()"> <!--Script loads previous page from browser history !--> </td></tr> 
      </table> 
    </form> 

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
					<h4><a href="#">Forgotten Password</a></h4> <br><br>
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