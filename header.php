<?php 
ob_start();
session_start();
$title;
$connect = mysql_connect("localhost","vivi1052_user","Kangan123") or die("Couldn't connect; check your mysql_connect() settings");
$database = mysql_select_db("vivi1052_vicspace") or die("Could not locate database!");
date_default_timezone_set("Australia/Melbourne");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/css/custom_tooltip.css" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Images/favicon.ico" />
<title><?php echo $title;?></title>

</head>

<body>

<div id="wrapper">
<table align="center">
<tr><td><img src="/Images/Vicspace.png" /></td></tr>
</table>
<?php 
if ($_SESSION['username'] != "")
{
echo '<table align="right" >
	<tr><td><a href="/gossip/">Gos Board</a></td><td><a href="/panel/">Panel</a></td><td><a href="/logout.php">Logout</a></tr>';
$uname = $_SESSION['username'];
$accesslevel = mysql_query("SELECT user_level FROM users WHERE user_name='$uname'");
$accesslevel = mysql_fetch_row($accesslevel);
$accesslevel = $accesslevel[0];

$firstname = mysql_query("SELECT first_name FROM users WHERE user_name='$uname'");
$firstname = mysql_fetch_row($firstname);
$firstname = $firstname[0];

$middlename = mysql_query("SELECT middle_name FROM users WHERE user_name='$uname'");
$middlename = mysql_fetch_row($middlename);
$middlename = $middlename[0];

$lastname = mysql_query("SELECT last_name FROM users WHERE user_name='$uname'");
$lastname = mysql_fetch_row($lastname);
$lastname = $lastname[0];

$postlimit = mysql_query("SELECT user_post_limit FROM users WHERE user_name='$uname'");
$postlimit = mysql_fetch_row($postlimit);
$postlimit = $postlimit[0];


echo "<font size=2>"."<tr><td colspan=4>"."<i>".$firstname." ".$middlename." ".$lastname."</td></tr></font>";
echo "<tr><td colspan=3 style=text-align:right;><font size=1><a class=\"customtooltip\" href=\"#\" style=\"color:orange;\">DPR:<span class=\"classic\"><font size=3>Daily Posts Remaining </font></span></a> ".$postlimit."</font></td></tr>";
echo "</table></font><br />";
//echo '<br><a href="user_panel.php">User Panel</a>';

if($accesslevel == 100)
{
echo '<br><a href="/admin/admin_panel.php">Admin Panel</a>';
}
}
else
{?>
<font size=2><p align=left>
<form action='/login_connect.php' method='POST'>
<table cellspacing="2">
<tr><td><font size=4><a href="/index.php">Home</a></font></td></tr>
<tr><td>Username:</td><td><input type='text' name='username'></td><td>Password:</td><td><input type='password' name='password'></td></tr>
<tr><td><input type='submit' value="Log in"></td></tr></table>
</form>
<?php
}?>

