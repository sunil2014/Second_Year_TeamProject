<?php
session_start();
if (!$_SESSION["is_admin"])
{
$_SESSION["message"] = "Please Login with Administrator credentials - Sessions will automatically be terminated!";
header("Location: ./login.php");
}
// Check if we have an authenticated user
else if (!isset($_SESSION["admin"]))
//if not re-direct to login page
{
$_SESSION["message"] = "Error: Please Login with Administrator credentials";
header("Location: ./login.php");
}

else
{ 
//If authenticated then display page contents
?>
<?php
//Put all the connection details in the connection.php file 
include "./connection.php"; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Silver Ice - Admin page</title>
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
			<h1><img src="images/logo.png" width="35" height="35"/></h1><h1><a href="index.html">Silver ice</a></h1>
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
				<h2 class="inner">Administration</h2>
			<div id="page">
				<?php echo "<h4 align='left'>"."Welcome back..."."</h4>"."<br />"."<br />"."<br />"?>
<?php
// Query to select records chosen by menu 
$query = "SELECT * FROM addcustomer ORDER BY CustomerID";  
     
// execute query  
$result = mysql_query($query) or die ("Error in query");  

print "<h4 align='left'>"."<a href=register.php>Add Customer</a></td>"."</h4>";    
// see if any rows were returned  
if (mysql_num_rows($result)>0) {  
   //If so, print the table headers 
   print "<table align='center' border=1 bgcolor=#DADADA>\n<tr>" .  
              "<th>Customer ID</th>" .  
              "<th>First Name</th>" .  
              "<th>Surname</th>" .  
              "<th>Username</th>" .
              "<th>Email</th>" .       
		      "<th>Amend/Delete</th></tr>";  

   //Use a while loop to display each row 
    while ($row = mysql_fetch_array($result)) { 
        print "<tr>";  
        print "<td>".$row["CustomerID"]."</td>";
        print "<td>".$row["Firstname"]."</td>";
        print "<td>".$row["Lastname"]."</td>";
        print "<td>".$row["Username"]."</td>";
		print "<td>".$row["Email"]."</td>";
    //this line creates a image link to an image in the images directory 
        print "<td><a href=customerChangeDelete.php?id=".$row[CustomerID].">Amend/Delete</a></td>";  
        print "</tr>";  
    } //Finish the while loop 
    print "</table>"; //Finsh the table 
} //Finish 'if rows found' 

else {  
       // print status message  
    print "<p>No rows found!<p>";  
}  
//print "<h6 align='center'>For debugging purposes! - $query </h6>"; // Remember to run this command line in MySQL
?><br /><br /><br /><br />
<h4 align="left"><a href=logout.php>Admin would you like to Logout?</a></h4>


			</div>
		
			</div>
			<!-- /main -->
			
			<!-- side -->
			<div id="side">
				<h2>Security Tips</h2>
				
				<div class="news">
					<h4>Tip: 1</h4>
					<p>Ensure after you are done with this page that you log out, by clicking the logout link provided on this page.</p>
					
				</div>
				<div class="news">
					<h4>Tip: 2</h4>
					<p>Make sure any technical glitches or bugs found are dealt with immediatley.</p>
				</div>
					
					<div class="news">
					<h4>Tip: 3</h4>
					<p>Reset and change your password at least every 90 days.</p>
				</div>
				<br /><br /><br /><br /><br />
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