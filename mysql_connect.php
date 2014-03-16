<?php

$db_host = "";
$db_username = "";
$db_pass = "";
$db_name = "";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not establish a connection to MySQL");
@mysql_select_db("$db_name") or die ("No database found");
?>
