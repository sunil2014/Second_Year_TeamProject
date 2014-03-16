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
?>
<html>
<head>
<title>Ammend/Delete Database</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="refresh" content="10;url=./administration.php" />
</head>

<body>
	<p>Ammend/Delete - Customer Database</p>
<p><a href="./administration.php">Go back to Administration page</a></p>	<br />
<p>Or you will be redirected back to the Administration page in 10 seconds...</p>
<?php


include "./connection.php";  

	//gather data from form
		$CustomerID=$_POST['txtID'];
   		$Firstname=$_POST['txtFirst'];
   		$Lastname=$_POST['txtSurname'];
   		$Username=$_POST['txtUser'];
   		$Email=$_POST['txtEmail'];
   		$Password=$_POST['txtPassword'];
		$md5_pass = md5($Password);
         
	// Was the Amend presed 
		if (isset($_POST['Amend'])) 
		{ 
         $query = "UPDATE addcustomer SET ". 
                "Firstname = '$Firstname', " . 
                  "Lastname = '$Lastname', " .
				  "Username = '$Username', " .
				  "Email = '$Email', " .
				  "Password = md5('$Password') " .                     
                  "WHERE CustomerID = $CustomerID"; 

      // execute query 
      	$result = mysql_query($query) ; 
      
     	echo "Customer Record ".$CustomerID." was amended OK";   
   
		}//end if 
	// Or was Delete pressed 
		else if (isset($_POST['Delete'])) 
		
// create query to delete record  
$query = "DELETE FROM addcustomer WHERE CustomerID = '$CustomerID' ";  
$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());  
  // see if any rows were affected 
if (mysql_affected_rows() > 0) {
	echo "The Customer with ID = $CustomerID was deleted";   
  //If so , return to calling page using header function and HTTP_REFERER    
  }  
  else {  
    // print error message  
    //echo "Error in query: $query. ".mysql_error(); 
    exit; 
  } 
  }
?>

</body>
</html>