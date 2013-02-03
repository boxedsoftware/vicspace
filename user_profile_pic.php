<?php
$title = $_GET['name'];
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
list($width1, $height1) = getimagesize($_SERVER['DOCUMENT_ROOT'].'/panel/photo/'.$title.'/dp.jpg');
echo '</script><br /><br /><div align="center"><img id="picture" src="/panel/photo/'.$title.'/dp.jpg" /></div>';
}


include($_SERVER['DOCUMENT_ROOT'].'/footer.php');

?>
<style type="text/css">
#picture
{
    max-width: 80%;
}
</style>