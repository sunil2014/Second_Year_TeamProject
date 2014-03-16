<?php
//Put all the connection details in the connection.php file 
include "./mysql_connect.php"; 
?>

<?php
$pagedata = htmlspecialchars(file_get_contents($_POST['url']));
$pagedata = str_replace("'","",$pagedata);
mysql_query("INSERT INTO searchengine VALUES ('','$_POST[url]','$pagedata')");
echo "URL Added.<br><a href='./addurl.php'>Continue...</a>";
?>