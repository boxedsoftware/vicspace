<?php $title = "Found Person";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
if($accesslevel != 100)
{
echo "You are not an administrator! You should not be here";
include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
die;
}
else
$searchby = $_POST['searchby'];
$search = $_POST['search'];?>
<h1>View Found Persons</h1>
<?php
if($searchby && $search)
{
if($searchby=="First name")
{
$result = mysql_query("SELECT user_name, user_pass, user_gender, first_name, middle_name, last_name, user_email, user_address, user_locality, user_phone, user_ip FROM users where first_name LIKE '%$search%'");
}
else if($searchby=="Middle name")
{
$result = mysql_query("SELECT user_name, user_pass, user_gender, first_name, middle_name, last_name, user_email, user_address, user_locality, user_phone, user_ip FROM users where middle_name LIKE '%$search%'");
}
else if($searchby=="Last name")
{
$result = mysql_query("SELECT user_name, user_pass, user_gender, first_name, middle_name, last_name, user_email, user_address, user_locality, user_phone, user_ip FROM users where last_name LIKE '%$search%'");
}
else if($searchby=="Telephone")
{
$result = mysql_query("SELECT user_name, user_pass, user_gender, first_name, middle_name, last_name, user_email, user_address, user_locality, user_phone, user_ip FROM users where user_phone LIKE '%$search%'");
}
else if($searchby=="Profession")
{
$result = mysql_query("SELECT user_name, user_pass, user_gender, first_name, middle_name, last_name, user_email, user_address, user_locality, user_phone, user_ip FROM users where user_occupation LIKE '%$search%'");
}
}
else
{
echo "Please type something in to search."." Click here to go ".'<a href="user_search.php">back</a>';
die;
}


$numrows = mysql_num_rows($result);
if($numrows == 0)
{
echo "Person not found."." Click here to go ".'<a href="user_search.php">back</a>';
die;
}

else
{
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
}



include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>

