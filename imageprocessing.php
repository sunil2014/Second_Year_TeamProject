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
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Success</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="refresh" content="5;url=./php_page.php" />
	<link rel="icon" 
      type="image/gif" 
      href="favicon.png">
</head>
<body align="center" bgcolor="#000000"> 
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<p><font face="Arial, Verdana, Tahoma, Sans-Serif" color="grey">Image Upload Successful! We are processing your image  <strong><?php echo $_SESSION["authenticatedUser"] ?></strong></font></p>
<p><font font face="Arial, Verdana, Tahoma, Sans-Serif" color="grey">You will be redirected back to the User Panel in <strong>5 seconds...</strong></font></p> <br /><br /><img align='center' width='100' height='100' src="./images/loading.gif">


</body>
</html>
<?php
} 
?>
