<?php $title = "Registration"; ?>
<?php
$title;
$connect = mysql_connect("localhost","root","Kangan123") or die("Couldn't connect; check your mysql_connect() settings");
$database = mysql_select_db("vicspace") or die("Could not locate database!");
session_start();
date_default_timezone_set("Australia/Melbourne");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
</head>

<body>
<table align="center">
<tr><td><img src="Images/Vicspace.gif" /></td></tr>
<tr><td></td><td><img src="Images/clod.gif" /></td></tr>
</table>

<h2>Registration</h2>
<form action='postcodes/query_Pcode.php' method='POST'>
<table align="center" cellspacing="5">
<tr><td>Username:</td><td><input type='text' name='username'></td></tr>
<tr><td>Password:</td><td><input type='password' name='password'></td></tr>
<tr><td>Confirm Password:</td><td><input type='password' name='password2'></td></tr>
<tr><td>Email:</td><td><input type='email' name='email'></td></tr>
<tr><td>Gender/Sex:</td><td><select name='gender'>
<option>Male</option>
<option>Female</option></select>
</td></tr>
<tr><td>First Name:</td><td><input type='text' name='firstname'></td></tr>
<tr><td><font color='red'>(OPTIONAL)</font>Middle Name:</td><td><input type='text' name='middlename'></td></tr>
<tr><td>Last Name:</td><td><input type='text' name='lastname'></td></tr>
<tr><td>State:</td><td><select name='state'>
<option>NSW</option>
<option>NT</option>
<option>QLD</option>
<option>SA</option>
<option>TAS</option>
<option>VIC</option>
<option>WA</option></select></td></tr>
<tr><td>What are you after?</td></tr>
<tr><td><input type="checkbox" name="type" value="man-seeking-woman" />Man-Seeking-Woman</td>
<td><input type="checkbox" name="type2" value="man-seeking-man" />Man-Seeking-Man</td></tr>
<tr><td><input type="checkbox" name="type3" value="woman-seeking-man" />Woman-Seeking-Man</td>
<td><input type="checkbox" name="type4" value="woman-seeking-woman" />Woman-Seeking-Woman</td></tr>
<tr><td><input type='submit' value="Next"></td></tr>
</table>
</form>



<?php include('footer.php');?>

