<?php 
//Please replace USERNAME and PASSWORD arguments to that of your mysql credentials
$connect = mysql_connect("localhost","USERNAME","PASSWORD") or die("Couldn't connect; check your mysql_connect() settings");
$database = mysql_select_db("vicspace") or die("Could not locate database!");
 mysql_query("UPDATE users SET user_weekend=NULL");
?>
