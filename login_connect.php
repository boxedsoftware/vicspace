<?php $title = "Connect...";
include('header.php');
session_start();
date_default_timezone_set("Australia/Melbourne");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$username = strtolower($username);

if($username && $password)
{
	$query = mysql_query("SELECT * FROM users WHERE user_name='$username' AND user_pass=MD5('$password')
	UNION SELECT * FROM users WHERE user_email='$username' AND user_pass=MD5('$password')");
	
	$numrows = mysql_num_rows($query);
	$user_row = mysql_fetch_row($query);
	$user_row = $user_row[1];


	if($numrows !=0)
	{
    
    
		$_SESSION['username'] = $user_row;
		$_SESSION['accesslevel'] = $accesslevel;
		$ip = $_SERVER['REMOTE_ADDR'];
		mysql_query("UPDATE users set user_ip='$ip', user_online='1' where user_name='$username'");
		echo "<font size=2>Thanks for signing in "; echo "<i>".$_SESSION['username']."</font></i>";
		echo"<br>";
		echo"<br>";
		echo "<b>".date("d/m/y  h:i:s", time())."</b>";
		echo '<meta http-equiv="refresh" content="3;url=/gossip/get_gossip.php">';
		echo " Click here to go ".'<a href="/gossip/get_gossip.php">Home</a></font>';
		
	}

	else
	{
		echo("Incorrect Username or Password ");
		
	}
		
}
else
{
	echo("Please enter a username and password");
	mysql_close($connect);
}

include('footer.php'); ?>
