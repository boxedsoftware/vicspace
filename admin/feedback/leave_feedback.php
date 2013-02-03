<?php $title = "Leave Feedback";
include('../header.php');

$username = $_SESSION['username'];

$accesslevel = mysql_query("SELECT user_level FROM users WHERE user_name='$username'");
$accesslevel = mysql_fetch_row($accesslevel);
$accesslevel = $accesslevel[0];


if ($accesslevel <= 1)
{
	echo "Sorry "."<i>".$_SESSION['username']."</i>"."<br>";
	echo ("You do not have sufficient priveleges. You are not logged in");
	include('../footer.php');
	die;
}
else if ($accesslevel >= 1)
{
?>
<h1>Leave Feedback</h1>
 <form action='feedback_connect.php' method='POST'>
 <table>
 <tr><td>Feedback Title:</td><td><input type='text' name='feedback_name'></td></tr>
 <tr><td>Please enter full Feedback:</td><td><textarea type='comment' name='feedback_description' cols='50' rows='10'></textarea></td></tr>
 <tr><td><input type='submit' value="Post Feedback"></td></tr>
 </table>
 </form>
<?php
}

else
	die("died :(");


include('../footer.php');
?>

