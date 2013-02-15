<?php $title = "Donate Item";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
$username = $_SESSION['username'];
$feedback_name = $_POST['feedback_name'];
$feedback_description = $_POST['feedback_description'];




if($feedback_name && $feedback_description)
{
	$query=mysql_query("INSERT into feedback(feedback_name, feedback_description) values('$feedback_name', '$feedback_description')");
	echo "Feedback Sent! Thank you for your time ";
}
else
{
	echo("Please fill in all the details!");
	echo"<br>";
	echo("Click here to go ");
	echo '<a href="leave_feedback.php">back</a>';
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}


include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>



