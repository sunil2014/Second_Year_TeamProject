<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Silver Ice - Search Results</title>
	<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script> <!--(Linked Query Library) Linking in my JS files/scripts-->
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/Arial.font.js"></script>
	<script type="text/javascript" src="js/loading.js"></script>
<script>
function goBack()
  {
  window.history.back()
  }
  
</script>	
	<link rel="icon" 
      type="image/gif" 
      href="favicon.png">
</head>
<body align="center" bgcolor="#000000">

<?php
//Put all the connection details in the connection.php file 
include "./mysql_connect.php"; 
?>
<?php
//Based on page content SQL query runs and finds keywords stored in the database
//and brings back the relevent link to the page with matching content
$sql = mysql_query("SELECT * FROM searchengine WHERE pagecontent LIKE '%$_GET[term]%' LIMIT 0,$_GET[results]");
?>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<img src='./images/search.png' width="100" height="100" >

<?php
echo "<h1><font face='Arial, Verdana, Tahoma, Sans-Serif' color='white'>Results</font></h1>";
?>

<?php
while($ser = mysql_fetch_array($sql)) {
    echo "<h3><font face='Arial, Verdana, Tahoma, Sans-Serif' color='grey'><a href='$ser[pageurl]'>$ser[title]</a></font></h3>";
}
?>

<input type='IMAGE' width='100' height='100' src='./images/back.png' value="Back" onclick="goBack()">

</body>
</html>
