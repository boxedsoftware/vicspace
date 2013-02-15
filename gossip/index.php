<?php 
error_reporting(0);
$title = "GosBoard";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');?>
<link rel="stylesheet" type="text/css" href="style.css" />
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) 
{
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
<?php
if (!$_SESSION['username'])
{
	echo "Sorry "."<i>".$_SESSION['username']."</i>"."<br>";
	echo("You are not logged in");
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}
else
//$user = $_SESSION['username'];

$page = $_GET['page'];
if($page >= 2)
{
$mysql_page = $page*9 - 9;
}
else
{
$mysql_page=0;
}

$gossip = filter_var($_POST['gossip'], FILTER_SANITIZE_STRING);
if($gossip && $postlimit > 0)
{
  $newlimit = $postlimit - 1;
  echo $newlimit;
	$query = mysql_query("INSERT into gossip (gossip_message, gossip_user_name) VALUES ('$gossip', '$uname')");
  $query2 = mysql_query("UPDATE users SET user_post_limit='$newlimit' WHERE user_name='$uname'");                  
	header('Location:get_gossip.php');
}
else if($gossip && $postlimit <= 0)
{
  echo '<font color=red>You have exceeded your daily GosPost limit! How many things did you really see today -.-</font>';
	die;
}
	
?>
<h1>Gos Board</h1><br />
<div align="center">
<form name="gossip" id="gossip" action="get_gossip.php" method="POST" enctype="multipart/form-data">
What did you see today? <div align="center" class="container">
<textarea name="gossip" type="text" rows="4" onKeyDown="limitText(this.form.gossip,this.form.countdown,100);" onKeyUp="limitText(this.form.gossip,this.form.countdown,100);" onFocus=this.value="" maxlength="100">What Did You See Today?</textarea>
<table align=right><tr><td><font size="1">
(Maximum characters: 100)</td></tr><tr><td>
<input readonly type="text" name="countdown" size="3" value="100"></font></td></tr>
</table>
</div>
<br />
<label for="file">Photo:(JPG)</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="GosPost!"></input>
</form>
</div>

<p>Need <a class="tooltip" href="#" style="color:orange;">Help<span class="classic">Simply type in a gratifying event which you witnessed, Upload a photo as evidence of the event and click GosPost! </span></a>?</p>

<?php


$result = mysql_query("SELECT gossip_id, gossip_message, gossip_ts, gossip_user_name FROM gossip ORDER BY gossip_id DESC LIMIT $mysql_page, 9");
$result2 = mysql_query("SELECT gossip_message FROM gossip ORDER BY gossip_id DESC");


$gossip_id = mysql_fetch_row($result);
$gossip_id = $gossip_id[0];
if($gossip && $postlimit > 0)
{
include('photo_upload.php');
}
else if($_FILES["file"]["name"] && !$gossip)
{
echo '<font color=red>Must write something along with the photo hot shot!</font>';
}
mysql_data_seek($result,0);
if (!$result) 
{ 
$message = 'ERROR:' . mysql_error(); 
return $message; 
} 
else 
{ 
$i = 0;
echo '<table border=0 align=center cellpadding=20 cellspacing=30 style=table-layout:fixed; text-align: justify;>'; 

while ($i < mysql_num_fields($result)) 
{ 
$meta = mysql_fetch_field($result);
//echo '<td>' . $meta->name . '</td>';
$i = $i + 1; 
} 
//echo '</tr>'; 
$i = 0;
$l = 0;
echo '<tr>'; 
while ($row = mysql_fetch_row($result))
{
if($l == 3)
{
$l = 0;
echo '</tr><tr>';
}
$records = mysql_num_rows($result2) / 9;
$records = ceil($records);
$count = count($row[1]); 
$y = 0; 

	while ($y < $count) 
	{ 
		
		$c_row = $row[1];
		$picid = $row[0];
		$time = $row[2];
		$user2 = $row[3];
$cresult = mysql_query("SELECT comment_id, comment_message, comment_user_name, comment_gossip_id, comment_ts FROM comments WHERE comment_gossip_id='$picid'");
$cresult = mysql_num_rows($cresult);

		echo '<td class=wordwrap >' . $c_row.'<br /><font size=1>by <a href=/user_profile.php?name='.$user2.'>'.$user2.'</a> at '.$time.'</font>' .'<br><a href="/gossip/comment.php?id='.$picid.'"><img src="photo/'.$picid.'/smallpic.jpg" /></a><br><a href=/gossip/comment.php?id='.$picid.'>'.$cresult.' Comments</a></td>';
		next($row); $y = $y + 1;
		
		
	} 
$l++;
 
$i = $i + 1;
} 
echo '</table><table><tr>';
for($j=1; $j<=$records; $j++)
{
$k=$j+1;
echo '<td><a href=get_gossip.php?page='.$j.'>'.$j.'</a></td>'; 
}
echo '</tr></table>';
mysql_free_result($result); 
} 
include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>
