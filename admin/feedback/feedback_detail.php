<?php $title = "Item Detail";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');

$username = $_SESSION['username'];
$accesslevel = mysql_query("SELECT user_level FROM users WHERE user_name='$username'");
$accesslevel = mysql_fetch_row($accesslevel);
$accesslevel = $accesslevel[0];
$test = $_GET['id'];


	
	//$person_id = mysql_fetch_row($person_id);
	//$person_id = $person_id[0];
 
	
if($accesslevel != 100)
{
echo "You are not an administrator! You should not be here";
include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
die;
}
else
?>
<h1>Feedback Detail</h1>

<?php
$feedback_id = mysql_query("SELECT feedback_id FROM feedback WHERE feedback_id='$test'");
$feedback_id = mysql_fetch_row($feedback_id);
$feedback_id = $feedback_id[0];
$feedback_name = mysql_query("SELECT feedback_name FROM feedback WHERE feedback_id='$test'");
$feedback_name = mysql_fetch_row($feedback_name);
$feedback_name = $feedback_name[0];
$feedback_description = mysql_query("SELECT feedback_description FROM feedback WHERE feedback_id='$test'");
$feedback_description = mysql_fetch_row($feedback_description);
$feedback_description = $feedback_description[0];



echo '<table><tr><td><b>Feedback ID</b></td></tr><tr><td>'.$feedback_id.'</td></tr>';
echo '<tr><td><b>Feedback Name</b></td></tr><tr><td>'.$feedback_name.'</td></tr>';
echo '<tr><td><b>Feedback Description</b></td></tr><tr><td>'.$feedback_description.'</td></tr>';;
echo '</table>';



include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>

