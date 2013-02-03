<?php $title = "People Finder";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
$username = $_SESSION['username'];
$accesslevel = mysql_query("SELECT user_level FROM users WHERE user_name='$username'");
$accesslevel = mysql_fetch_row($accesslevel);
$accesslevel = $accesslevel[0];

if($accesslevel != 100)
{
echo "You are not an administrator! You should not be here";
include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
die;
}
else
?>
<h1>Search for Person</h1>

<form action='user_search_connect.php' method='POST'>
<table cellspacing="2">
<tr><td>Please select search by</td><td><select name='searchby'>
<option>First name</option>
<option>Middle name</option>
<option>Last name</option>
<option>Telephone</option>
<option>Profession</option>
</select></td>
<td><input type='text' name='search'></td></tr>
<tr><td><input type='submit' value="Search"></td></tr>
</table>
</form>


<?php 

$result = mysql_query("SELECT user_name, user_pass, user_gender, first_name, middle_name, last_name, user_email, user_address, user_locality, user_phone, user_ip FROM users");
$numrows = mysql_num_rows($result);
if (!$result) 
{ 
$message = 'ERROR:' . mysql_error(); return $message; 
} 
else 
{ $i = 0; 
echo '<table cellspacing="5" border="5"><tr>'; 
while ($i < mysql_num_fields($result)) 
{ 
$meta = mysql_fetch_field($result, $i); 
echo '<td>' . $meta->name . '</td>'; 
$i = $i + 1; 
} 
echo '</tr>'; $i = 0; 
while ($row = mysql_fetch_row($result)) 
{ 
echo '<tr>'; $count = count($row); $y = 0; 
while ($y < $count) 
{ 
$c_row = current($row); 
echo '<td>' . $c_row . '</td>'; 
next($row); $y = $y + 1; 
} 
echo '</tr>'; $i = $i + 1; 
} 
echo '</table>'; 
mysql_free_result($result); 
}

include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>

