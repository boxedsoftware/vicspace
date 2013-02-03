<?php
$title = 'Online Users';
include($_SERVER['DOCUMENT_ROOT'].'/header.php');

if (!$_SESSION['username'])
{
	echo "Sorry "."<i>".$_SESSION['username']."</i>"."<br>";
	echo("You do not have sufficient priveleges. (You did not register as a person seeker) or you are not logged in");
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}

else if($_SESSION['username'] != "")
{

$query = mysql_query("SELECT user_id, user_name, user_email, user_gender FROM users WHERE user_online=1");
//$usersonline = mysql_fetch_row($usersonline);
//echo $usersonline;

if (!$query) 
{ 
$message = 'ERROR:' . mysql_error(); 
return $message; 
} 
else 
{ 

echo '<table><font size="2">';
while ($row = mysql_fetch_row($query))
{
$onlineuser = $row[1];

echo '<tr><td class=wordwrap><a href=/user_profile.php?name='.$onlineuser.'><img src="/panel/photo/'.$onlineuser.'/tinydp.jpg" /></a></td><td><a style="color:blue;" href=/user_profile.php?name='.$onlineuser.'>'.$onlineuser.'</a>';

echo '</td></tr>';
}
echo '</font></table>';

}

}

include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>