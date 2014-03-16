<html>
<head>
<title>Success</title>
<meta http-equiv="refresh" content="5;url=./login.html" />
</head>
<body>
<?php
include "connection.php"; 
// (2)gather details of CustomerID sent 
$customerId = $_GET['CustomerID'] ;
// (3)create query 
$query = "SELECT * FROM Customer WHERE CustomerID = $customerId";
// (4) Run the query on the customer table through the connection
$result = mysql_query ($query);
// (5) print message with ID of inserted record    
if ($row = mysql_fetch_array($result)) 
{
print "Thankyou for Registering Below are your Details"; 
print "<br>Customer ID: " . $row["CustomerID"]; 
print "<br>First Name: " . $row["Firstnames"]; 
print "<br>Surname: " . $row["Surname"]; 
print "<br>User Name: " . $row["Username"]; 
print "<br>Email: " . $row["Email"]; 
print "<br>Password: " . $row["Password"]; 
print "You Will be redirected to the Login page in a few Seconds";
}
?>
</body>
</html>
