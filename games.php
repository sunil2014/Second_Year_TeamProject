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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
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
			<h1><img src="images/logo.png" width="35" height="35"/></h1><h1><a href="index.php">Silver ice</a></h1>
			<!-- /logo -->
			
			<!-- menu -->
			<div id="mainmenu">
				<ul id="menu">
					<li><a class="current" href="index.php">Home</a></li>
					<li><a href="inner.php">Movies &amp; Games</a>
						<ul><li><a href="games.php">Games</a></li><li><a href="movies.php">Movies</a></li></ul>
					</li>
					<li><a href="www.leedsmet.ac.uk">X-Stream</a></li>
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
						<img src="./images/pitch/games.jpg" alt="Consoles" />
						<div class="overlay transparent">
						</div>
						
					</div>
					<!-- /1st frame -->
					<div class="active">
						<img src="./images/pitch/games.jpg" alt="Consoles" />
						<div class="overlay transparent">
						</div>
						
					</div>
					<div class="active">
						<img src="./images/pitch/games.jpg" alt="Consoles" />
						<div class="overlay transparent">
						</div>
						
					</div>
					<div class="active">
						<img src="./images/pitch/games.jpg" alt="Consoles" />
						<div class="overlay transparent">
						</div>
						
					</div>
					
				</div>
			</div>
			<!-- /pitch -->
			
			<!-- main -->
			<div id="main">
				<div id="page">
					<h2 class="inner">Browse</h2>
					<p>Browse our media collection and buy now whilst stocks last!</p>
					
					<br />
					
<?php

$initialLetter = $_GET["letter"];
// Query to select records chosen by menu //Initial Letter Catagory Filtering
//Store Query
$query = "SELECT * FROM SV_GAMES WHERE TYPE LIKE '$initialLetter%'";  
     
// execute query //Run Stored Query  
$result = mysql_query($query) or die ("Error in query");  

// see if any rows were returned  
if (mysql_num_rows($result)>0) {  
   //If so, print the table headers 
   print "<table border=5 bordercolor=#000000 style=background-color:#ffffff cellpadding=15 cellspacing=2 width=450>\n<tr>" .  
              "<th>Platform</th>" .
              "<th>Name</th>" .  
              "<th>Rating</th>" .  
              "<th>Certificate</th>" .  
              "<th>Developer</th>" .  
              "<th>Price</th>" .     
              "<th>Image</th>".
		      "<th>Add to cart</th></tr>";
   //Use a while loop to display each row 
    while ($row = mysql_fetch_array($result)) { 
        print "<tr>";  
        print "<td>".$row["TYPE"]."</td>";
        print "<td>".$row["TITLE"]."</td>";
        print "<td>".$row["RATING"]."</td>";
        print "<td>".$row["CERTIFICATE"]."</td>";
		print "<td>".$row["DEVELOPER"]."</td>";
		print "<td>".$row["PRICE"]."</td>";
    //this line creates a image link to an image in the images directory 
        print "<td><img src=".$row["IMAGE"]."></td>";
        print "<td>"."<div class='product'>"."<input type='hidden' class='product-title' value=".$row["TITLE"].">
<input type='hidden' class='product-image' value=".$row["IMAGE"].">
<input type='hidden' class='product-price' value=".$row["PRICE"]."><div class='googlecart-add-button' tabindex='0' role='button' title='Add to cart'>
</div></td>";  
        print "</tr>";  
    } //Finish the while loop 
    print "</table>"; //Finsh the table 
} //Finish 'if rows found' 

else {  
       // print status message  
    print "<h4>Games/Movie Database Error ('No Rows Found')</h4>";  
}  
//print "<p>For debugging purposes! - $query </p>"; // Remember to run this command line in MySQL
?> 
					
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
					<!--Clear format -->
					<div class="clear"></div>					
					
				</div>
			</div>
			<!-- /main -->
			
			<!-- side -->
			<div id="side">
				<p id="back-top">
				<a href="#top"><span></span>Back to top</a>
			</p>
				<h4>Platform</h4>
				<!-- Initial Letter sent to browser URL -->
				<ul class="side-menu">
					<li><a href="games.php?letter=">All</a></li>
					<li><a href="games.php?letter=PC">PC</a></li>
					<li><a href="games.php?letter=X">Xbox 360</a></li>
					<li><a href="games.php?letter=PS">Playstation 3</a></li>
					<li><a href="games.php?letter=N">Nintendo</a></li>
				</ul>
				<br>
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