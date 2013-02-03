<?php
date_default_timezone_set("Australia/Melbourne"); 
$connect = mysql_connect("localhost","vivi1052_user","Kangan123") or die("Couldn't connect; check your mysql_connect() settings");
$database = mysql_select_db("vivi1052_vicspace") or die("Could not locate database!");
session_start();
$username = $_SESSION['username']
?>
<html>
<head><title>Logged Out</title></head>
<body>
<font size="2">Loggged Out</font>
<?php 
mysql_query("UPDATE users set user_online='0' where user_name='$username'");
session_destroy();
?>
<meta http-equiv="refresh" content="0.2;url=/index.php">
Click <a href="index.php">here</a> to return to Home Page
<?php include('footer.php');?>

