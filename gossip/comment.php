<?php
error_reporting(0);
include($_SERVER['DOCUMENT_ROOT'].'/header.php');


$test = $_GET['id'];
$query1 = mysql_query("SELECT gossip_message FROM gossip WHERE gossip_id='$test'");
$query1 = mysql_fetch_row($query1);
$title = $query1[0];
if (!$_SESSION['username'])
{
	echo "Sorry "."<i>".$_SESSION['username']."</i>"."<br>";
	echo("You must be logged in to view this content :( <a href=/index.php>Registration</a> is Quick, Free and Easy!");
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}

else if($_SESSION['username'] != "")
{

$newcomment = filter_var($_GET['comment'], FILTER_SANITIZE_STRING);
if($newcomment)
{
	$insert = mysql_query("INSERT into comments (comment_message, comment_user_name, comment_gossip_id) VALUES ('$newcomment', '$uname', '$test')");
	header('Location:comment.php?id='.$test);
}
 
	

?>
<h1><?php echo $title;?></h1>
<?php

list($width, $height) = getimagesize('photo/'.$test.'/pic.jpg');


echo '<div align=center><img id="picture" src="photo/'.$test.'/pic.jpg" /></div>';
echo '<table><form name=comments action=comment.php method=\"POST\">';
echo '<tr><td>Comment</td><td><input type=text name=comment /><input type=hidden name=id value='.$test.' /></td>';
echo '<td><input type=submit name=submit value=comment></input></form></td></tr></table>';
$query = mysql_query("SELECT comment_id, comment_message, comment_user_name, comment_gossip_id, comment_ts FROM comments WHERE comment_gossip_id='$test'");








if (!$query) 
{ 
$message = 'ERROR:' . mysql_error(); 
return $message; 
} 
else 
{ 
//mysql_data_seek($query,0);
$i = 0;
echo '<table>';


while ($row = mysql_fetch_row($query))
{
$commentid = $row[0];
$commentmessage = $row[1];
$commentuser = $row[2];
$commentgossipid = $row[3];
$commentts = $row[4];

echo '<tr><td class=wordwrap><font size=2><b><a href=/user_profile.php?name='.$commentuser.'>'.$commentuser.'</a></b>: '.$commentmessage.'</font> <font size=1 color=gray>at '.$commentts;
if($uname == $commentuser)
{
echo ' <a href=/gossip/delete_comment.php?cid='.$commentid.'&gid='.$commentgossipid.'><img src=/Images/cancel.png /></a>';
}
else if($accesslevel > 50)
{
echo ' <a href=/gossip/delete_comment.php?cid='.$commentid.'&gid='.$commentgossipid.'><img src=/Images/cancel.png /></a>';
}
echo '</font></td></tr>';
$i++;
}

echo '</table>';

}


}
include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>
<style type="text/css">
#picture
{

	max-width: 80%;
	
}
</style>
