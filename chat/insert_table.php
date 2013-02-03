<?php
session_start();
$user = $_SESSION['username'];
include("insert.html");
$msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$connect = mysql_connect("localhost","vivi1052_user","Kangan123") or die("Couldn't connect; check your mysql_connect() settings");
$database = mysql_select_db("vivi1052_vicspace") or die("Could not locate database!");

if($msg == null)
{
	mysql_close($connect);
}
else


$insert = mysql_query("INSERT into chat (c_name, c_message) VALUES ('$user','$msg')");
header('Location: insert_table.php');


mysql_close($connect);

?> 
