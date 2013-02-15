<?php
session_start();
$user = $_SESSION['username'];
include("insert.html");
$msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

//Please replace USERNAME and PASSWORD arguments to that of your mysql credentials
$connect = mysql_connect("localhost","USERNAME","PASSWORD") or die("Couldn't connect; check your mysql_connect() settings");
$database = mysql_select_db("vicspace") or die("Could not locate database!");

if($msg == null)
{
	mysql_close($connect);
}
else


$insert = mysql_query("INSERT into chat (c_name, c_message) VALUES ('$user','$msg')");
header('Location: insert_table.php');


mysql_close($connect);

?> 
