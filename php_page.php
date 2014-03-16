<?php
session_start();

// Check if we have an authenticated user
if (!isset($_SESSION["authenticatedUser"]))
//if not re-direct to login page
{
$_SESSION["message"] = "Please Login";
header("Location: ./login.php");
}
else
{ 
//If authenticated then display page contents
?>

<?php 
  // Print message if there is one
  session_start();
   if (isset($_SESSION["message"]))
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
				<h2 class="inner">My Account <img width="20" height="19" src='./images/lock.png'/></h2>
					<?php 
 
 $time = time();

 $hour = date("g",$time); //12-hour format of an hour without leading zeros
 $date = date ("A", $time); //AM or PM

 if ($date == "AM")
 {
 if ($hour == 12)
 {
 echo "<h4>Good Evening ".$_SESSION["authenticatedUser"]."</h4>";
 }
 elseif ($hour < 4)
 {
 echo "<h4>Good Evening ".$_SESSION["authenticatedUser"]."</h4>";
 }
 elseif ($hour > 3)
 {
 echo "<h4>Good Morning ".$_SESSION["authenticatedUser"]."</h4>";
 }
 }

 elseif ($date == "PM")
 {
 if ($hour == 12)
 {
 echo "<h4>Good Afternoon ".$_SESSION["authenticatedUser"]."</h4>";
 }
 elseif ($hour < 7)
 {
 echo "<h4>Good Afternoon ".$_SESSION["authenticatedUser"]."</h4>";
 }
 elseif ($hour > 6)
 {
 echo "<h4>Good Evening ".$_SESSION["authenticatedUser"]."</h4>";
 }
 }
 ?> 
			<?php
// if the form has been submitted, display result
if (isset($result)) {
  echo "<p><strong>$result</strong></p>";
}
?>
			
<div id="page">
<br />
<?php
//Put all the connection details in the connection.php file 
include "./mysql_connect.php"; 
  
//Get the film type submitted by the form 
$initialLetter = $_GET["letter"]; //Remember Movies_Menu holds the innitial letter links for the genre to be selcted by the user!

// Query to select records chosen by menu 
$query = "SELECT * FROM Coupon_Schema";  
     
// execute query  
$result = mysql_query($query) or die ("Error in query");  

print "<h4 align='left'>"."Member Exclusive Coupon Codes</td>"."</h4>";   
// see if any rows were returned  
if (mysql_num_rows($result)>0) {  
   //If so, print the table headers 
   print "<table align='center' border=1 bgcolor=#DADADA>\n<tr>" .  
              "<th>Coupon ID</th>" .  
              "<th>Title</th>" .  
              "<th>Genre</th>" .  
              "<th>Rating</th>". 
              "<th>Coupon Code</th>".
              "<th>Reward</th>"."</tr>";  

   //Use a while loop to display each row 
    while ($row = mysql_fetch_array($result)) { 
        print "<tr>";  
        print "<td>".$row["id"]."</td>";  
        print "<td>".$row["title"]."</td>"; 
        print "<td>".$row["genre"]."</td>";  
        print "<td>".$row["rating"]."</td>"; 
        print "<td>".$row["coupon_code"]."</td>";
        print "<td>".$row["reward"]."</td>"; 
    //this line creates a image link to an image in the images directory 
        print "</tr>";  
    } //Finish the while loop 
    print "</table>"; //Finsh the table 
} //Finish 'if rows found' 

else {  
       // print status message  
    print "<p>No rows found!<p>";  
}  
//print "<h6>For debugging purposes! - $query </h6>"; // Remember to run this command line in MySQL
?>
<br />
<br />
<?php
include "./mysql_connect.php"; 
// Query to select records chosen by menu 
$query = "SELECT * FROM addcustomer WHERE Username= '" . $_SESSION['authenticatedUser'] . "'";  
     
// execute query  
$result = mysql_query($query) or die ("Error in query");  

print "<h4 align='left'>"."Your Account Details</td>"."</h4>";    
// see if any rows were returned  
if (mysql_num_rows($result)>0) {  
   //If so, print the table headers 
   print "<table align='center' border=1 bgcolor=#DADADA>\n<tr>" .    
              "<th>First Name</th>" .  
              "<th>Surname</th>" .  
              "<th>Username</th>" .
              "<th>Email</th>" .  
              "<th>Password</th>" .
              "<th>Image</tr>";       

   //Use a while loop to display each row 
    while ($row = mysql_fetch_array($result)) { 
        print "<tr>";  
        print "<td>".$row["Firstname"]."</td>";
        print "<td>".$row["Lastname"]."</td>";
        print "<td>".$row["Username"]."</td>";
		print "<td>".$row["Email"]."</td>";
		print "<td>".$row["Password"]."</td>";
		print "<td><img src=".$row["Image"]."></td>";
    //this line creates a image link to an image in the images directory  
        print "</tr>";  
    } //Finish the while loop 
    print "</table>"; //Finsh the table 
} //Finish 'if rows found' 

else {  
       // print status message  
    print "<p>No rows found!<p>";  
}  
//print "<h6 align='center'>For debugging purposes! - $query </h6>"; // Remember to run this command line in MySQL
?>

<br /><br />
<?php echo "<h4 align='left'>".$_SESSION["authenticatedUser"]." would you like to <a href='./logout.php'>Logout?</a>"."</h4>" ?>
			</div>
		
			</div>
			<!-- /main -->
			
			<!-- side -->
			<div id="side">
				<h2>Amend Your Details</h2><br />
<h4 align='left'>Upload Images</h4>
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<div id='file_browse_wrapper'>
<input type='file' name='file' id='file_browse'>
</div><br />
<input type="image" src="./images/submit.png" name="submit" id="submit">
</form><br />
		<h4 align='left'>Amend</h4>
				<h3 align='left'><a href='changepassword.php'>Change Password</a></h3>
				<h3 align='left'><a href='changeusername.php'>Change Username</a></h3>
			
<br />
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


