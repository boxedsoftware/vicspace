<?php $title = "View/Delete My Posts";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');

$username = $_SESSION['username'];
$userid = mysql_query("SELECT user_id FROM users WHERE user_name='$username'");
$userid = mysql_fetch_row($userid);
$userid = $userid[0];
$accesslevel = mysql_query("SELECT user_level FROM users WHERE user_name='$username'");
$accesslevel = mysql_fetch_row($accesslevel);
$accesslevel = $accesslevel[0];


	
	//$person_id = mysql_fetch_row($person_id);
	//$person_id = $person_id[0];
 
	
if ($accesslevel <= 0)
{
	echo "Sorry "."<i>".$_SESSION['username']."</i>"."<br>";
	echo("You do not have sufficient priveleges or you are not logged in");
	include('../footer.php');
	die;
}

else if($accesslevel >= 1)
{
?>
<h1>View/Delete My current posts</h1><br>
<?php
if($accesslevel == 100)
{
$result = mysql_query("SELECT gossip_id, gossip_ts, gossip_message FROM gossip ORDER BY gossip_ts DESC");
}
else
{
$result = mysql_query("SELECT gossip_id, gossip_ts, gossip_message FROM gossip WHERE donor_id='$userid' ORDER BY gossip_ts DESC");
}


echo '<h3>'."Gospots".'</h3>';
if (!$result) 
{ 
$message = 'ERROR:' . mysql_error(); 
return $message; 
} 
else 
{ 
$i = 0;
echo '<html><body><table border=2><tr>'; 
//while ($posts = mysql_fetch_array($person_id))
//{
while ($i < mysql_num_fields($result)) 
{ 
$meta = mysql_fetch_field($result);
echo '<td>' . $meta->name . '</td>';
$i = $i + 1; 
} 
echo '</tr>'; 
$i = 0; 
//while ($row = mysql_fetch_object($delete)) Fetches single value in column
while ($row = mysql_fetch_assoc($result))
{
echo '<tr>'; $count = count($row); $y = 0; while ($y < $count) 
{ 
$c_row = current($row);
//$person_id = mysql_query("SELECT person_id FROM wanted_users");
echo '<td>' . '<a href=didelete.php?id='.$row['gossip_id'].'>'.$c_row.'</a>'. '</td>';
next($row); $y = $y + 1;
} 
echo '</tr>'; $i = $i + 1;
} 
//}
echo '</table></body></html>'; 
mysql_free_result($result); 
} 




echo '</body></html>'; 





}

include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>

