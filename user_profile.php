<?php
$title = $_GET['name'];
include($_SERVER['DOCUMENT_ROOT'].'/header.php');

$test = $_GET['name'];

$map = $_SERVER['DOCUMENT_ROOT'].'/scripts/gmap.php';


 
	
if (!$_SESSION['username'])
{
	echo "Sorry "."<i>".$_SESSION['username']."</i>"."<br>";
	echo("You do not have sufficient priveleges. (You did not register as a person seeker) or you are not logged in");
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}

else if($_SESSION['username'] != "")
{
?>
<h1><?php echo $title;?></h1>
<?php
$query = mysql_query("SELECT user_occupation, first_name, middle_name, last_name, user_email, user_phone, user_gender, user_dob_m, user_dob_d, user_dob_y, user_weekend, user_views FROM users WHERE user_name='$test'");
$query = mysql_fetch_row($query);
$viewcheck = mysql_query("SELECT viewer_name from daily_views WHERE viewee_name='$title'");
$viewrow = mysql_num_rows($viewcheck);

$hprofession = $query[0];

$pfirstname = $query[1];

$pmiddlename = $query[2];

$plastname = $query[3];

$helperemail = $query[4];

$helperphone = $query[5];

$usergender = $query[6];

$useragem = $query[7];
$useraged = $query[8];
$useragey = $query[9];

$userweekend = $query[10];

$userviews = $query[11];
$newuserviews = $userviews + 1;

if($viewrow == 0)
{
$update = mysql_query("UPDATE users SET user_views='$newuserviews' WHERE user_name='$test'");
$insert = mysql_query("INSERT into daily_views(viewer_name, viewee_name) VALUES ('$uname', '$title')");
}


echo '<div align=right><table align="right" cellspacing="5">
<div><font size=4>'.$pfirstname.'\'s weekend\'s at <b>'.$userweekend.'</b></font></div>';
echo '<tr><td>';include($map); echo '</td></tr>';
echo '</table></div>';
echo '<table>';
echo '<tr><td rowspan=4><a href="/user_profile_pic.php?name='.$title.'"><img src="/panel/photo/'.$test.'/smalldp.jpg" align=right /></a></td>';
echo '<td><b>Profession</b></td></tr><tr><td>'.$hprofession.'</td></tr>';
echo '<tr><td><b>First Name</b></td></tr><tr><td>'.$pfirstname.'</td></tr>';
echo '<tr><td /><td><b>Middle Name</b></td></tr><tr><td /><td>'.$pmiddlename.'</td></tr>';
echo '<tr><td /><td><b>Last Name</b></td></tr><tr><td /><td>'.$plastname.'</td></tr>';
echo '<tr><td /><td><b>Gender</b></td></tr><tr><td /><td>'.$usergender.'</td></tr>';
echo '<tr><td /><td><b>Date of Birth</b></td></tr><tr><td /><td>'.$useraged.' / '.$useragem.' / '.$useragey.'</td></tr>';
echo '<tr><td /><td><b>Email</b></td></tr><tr><td /><td><font color=brown>'.$helperemail.'</font></td></tr>';
echo '<tr><td /><td><b>Telephone</b></td></tr><tr><td /><td><font color=brown>0'.$helperphone.'</font></td></tr>';
echo '</table>';
echo '<p /><i>Views: '.$userviews.'</i>';

}

include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>

