<?php ob_start();
include "connection.php";
?>
<?php
//
session_start();
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
$admin   =    mysql_real_escape_string($_POST['username']);
$username   =    mysql_real_escape_string($_POST['username']);
$password    =    mysql_real_escape_string($_POST['password']);
$encrypted_mypassword= md5($password);

if($username=="" || $password=="")
{
	error('Please Enter A Username & Password!.');
}
//$sql = "SELECT COUNT(*) FROM addcustomer WHERE Username = '$username'";
    //$result = mysql_query($sql)or die('Could not find member: ' . mysql_error());
    //if (!mysql_result($result,0,0)>0) {
    //    error('Incorrect Username!');
    //}
//$sql2 = "SELECT COUNT(*) FROM addcustomer WHERE Password = '$encrypted_mypassword'";
  //  $result2 = mysql_query($sql2)or die('Could not find member: ' . mysql_error());
    //if (!mysql_result($result2,0,0)>0) {
      //  error('Incorrect Password!');
    //}

//if (isset($_POST['submit'])) {
	
	//if ($_POST['username']=='') {
	
	//Make sure it's a valid email address, last thing we want is some sort of exploit!
	//if (!check_email_address($_POST['forgotpassword'])) {
  		//error('Email Not Valid - Must be in format of name@domain.tld');
	//}
    // Lets see if the email exists
    //$sql = "SELECT COUNT(*) FROM addcustomer WHERE Email = '$forgotpassword'";
    //$result = mysql_query($sql)or die('Could not find member: ' . mysql_error());
    //if (!mysql_result($result,0,0)>0) {
       // error('Email Not Found!');
    //}

// (3) Create query of the form below to search the user table
$query = "SELECT * FROM addcustomer WHERE Username='$username' AND Password='$encrypted_mypassword'";
$adminquery = "SELECT * FROM User WHERE UserName='$username' AND Password='$encrypted_mypassword'";
// (3) Run query through connection
$result = mysql_query ($query);
$adminresult = mysql_query ($adminquery);
// (4) Check result of query using code below

// if rows found set authenticated user to the user name entered 

if (mysql_num_rows($adminresult) > 0) { 
$_SESSION["admin"] = $admin;
$_SESSION["is_admin"] = true;
// Relocate to the logged-in page
header("Location: administration.php");
} 

else if (mysql_num_rows($result) > 0) { 
$_SESSION["authenticatedUser"] = $username;
// Relocate to the logged-in page
header("Location: loggedon.php");
} 
else
// login failed redirect back to login page with error message
{
$_SESSION["message"] = "Could not connect as $username " ;
header("Location: login.php");
}
?>