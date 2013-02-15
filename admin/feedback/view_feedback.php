<?php $title = "View Feedback";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');

if($accesslevel != 100)
{
echo "You are not an administrator! You should not be here";
include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
die;
}
else
?>
<h1>View Feedback</h1>
<?php

$result = mysql_query("SELECT feedback_id, feedback_name FROM feedback");
if (!$result) 
{ 
$message = 'ERROR:' . mysql_error(); 
return $message; 
} 
else 
{ 
$i = 0; 
echo '<html><body><table border=2><tr>'; 
while ($i < mysql_num_fields($result)) 
{ 
$meta = mysql_fetch_field($result, $i); 
echo '<td>' . $meta->name . '</td>'; 
$i = $i + 1; 
} 
echo '</tr>'; 
$i = 0; 
while ($row = mysql_fetch_assoc($result)) 
{ 
echo '<tr>'; $count = count($row); $y = 0; while ($y < $count) 
{ 
$c_row = current($row); 
echo '<td>' .'<a href=feedback_detail.php?id='.$row['feedback_id'].'>'. $c_row .'</a>'. '</td>'; 
next($row); $y = $y + 1;
} 
echo '</tr>'; $i = $i + 1; 
} 
echo '</table></body></html>'; 
mysql_free_result($result); 
} 


/*else
	{die("Oops. Something went wrong");}*/

include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>

