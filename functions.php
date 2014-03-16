<?php

function protect($string){
    $string = mysql_real_escape_string($string);
    $string = strip_tags($string);
    $string = addslashes($string);
    
    return $string;
}

function connect(){
    

$connect = mysql_connect("","","") or die("Couldnt connect!");

mysql_select_db("") or die("Couldnt find database!");
}
?> 
