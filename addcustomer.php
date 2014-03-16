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
include "./mysql_connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta name="author" content="Hamza Sharif"/>
<meta name="description" content="My top 10 movie site!" />
<meta name="keywords" content="my, top, 10, php, movies, horror, action, adventure" />
<title>Add a Customer</title>
<link rel="stylesheet" type="text/css" href="./css/php.css" />
<link rel="shortcut icon" href="./favicon.ico">
</head>

<body>
<div id="container">
<div id="header">
<h1 id="owner">C</h1>
</div>

<div id="sidebar-a">
<div class="padding"><br />
</div>
</div>

<ul id="main-nav">
<li id="home"><a href="./index.php">Home</a></li>
<li id="adventure"><a href="./adventure.php">Adventure</a></li>
<li id="horror"><a href="./horror.php">Horror</a></li>
<li id="contact_us"><a href="./contact_us.php">Contact Us</a></li>
<li id="user_panel"><a href="./php_page.php">User Panel</a></li>
</ul>

<div id="content">
<div class="padding">
<h4><a href="administration.php">Go back</a> to the Administration page?</h4>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<form id="insertcustomer" name="insertcustomer" method="post" action="customerinsertscript.php">
<tr>
<td colspan="2"><h3 align style="color:gray">Add a customer</h3></td>
</tr>

<tr>
<td>Given Name:</td>
<td>
<input name="txtGiven" type="text" id="txtGiven">
</td>
</tr>

<tr>
<td>Family Name:</td>
<td>
<input name="txtFamily" type="text" id="txtFamily">
</td>
</tr>

<tr>
<td>Username:</td>
<td>
<input name="txtUser" type="text" id="txtUser">
</td>
</tr>

<tr>
<td>Email:</td>
<td>
<input name="txtEmail" type="text" id="txtEmail">
</td>
</tr>

<tr>
<td>Password:</td>
<td>
<input type="password" input name="txtPassword" type="text" id="txtPassword">
</td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" name="Submit" value="Add Customer" />
</td>
</tr>

</form>
</table>


<div class="padding">
<div id="footer">
<div id="altnav">
<a href="./index.php"><u>Home</u></a>
<a href="./adventure.php"><u>Adventure</u></a>
<a href="./horror.php"><u>Horror</u></a>
<a href="./contact_us.php"><u>Contact Us</u></a>
<a href="./accessibility.html"><u>Accessibility</u></a>
<div>
Copyright &copy; Hamza Sharif's Top 10 Movies<br /> 

Powered by <a href="http://www.lmu.ac.uk/" target="_blank"><u>Leeds Met Servers 2011</u></a><br />
<SCRIPT LANGUAGE="JavaScript">
var now = new Date();

var days = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');

var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();

function fourdigits(number)	{
	return (number < 1000) ? number + 1900 : number;
								}
today =  days[now.getDay()] + ", " +
         months[now.getMonth()] + " " +
         date + ", " +
         (fourdigits(now.getYear())) ;

document.write(today);
</script>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

<?php  
} 
?>
