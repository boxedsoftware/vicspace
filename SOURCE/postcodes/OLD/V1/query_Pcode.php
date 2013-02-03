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
<tr><td><img src="../Images/Vicspace.gif" /></td></tr>
<tr><td></td><td><img src="../Images/clod.gif" /></td></tr>
</table>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
if($password != $password2)
{
	echo("<font size=\"2\" color='red'>Password does not match! Re-type your password correctly </font><br />");
}

$email = $_POST['email'];
$gender = $_POST['gender'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$state = $_POST['state'];
$type = $_POST['type'];
$type2 = $_POST['type2'];
$type3 = $_POST['type3'];
$type4 = $_POST['type4'];
$accesslevel;

if($username == "")
{
 echo "<font size=\"2\" color='red'>Please Enter Username </font><br />";
}
if($password == "")
{
 echo "<font size=\"2\" color='red'>Please Enter a valid Password </font><br />";
}
if($firstname == "")
{
 echo "<font size=\"2\" color='red'>Please Enter First Name </font><br />";
}
if($lastname == "")
{
 echo "<font size=\"2\" color='red'>Please Enter Last Name </font><br />";
}
$checkusername = mysql_query("SELECT * FROM users WHERE user_name='$username'");
	$numrows = mysql_num_rows($checkusername);
	if($numrows !=0) {echo("Username already exists! Please choose a different Username");}


if($username == "" || $password == "" || $firstname == "" || $lastname == "" || $password != $password2)
{
?>
<form action='query_Pcode.php' method='POST'>
<table align="center" cellspacing="5">
<tr><td>Username:</td><td><input type='text' name='username' value="<?php echo $username;?>"></td></tr>
<tr><td>Password:</td><td><input type='password' name='password'></td></tr>
<tr><td>Confirm Password:</td><td><input type='password' name='password2'></td></tr>
<tr><td>Email:</td><td><input type='email' name='email' value="<?php echo $email;?>"></td></tr>
<tr><td>Gender/Sex:</td><td><select name='gender'>
<option>Male</option>
<option>Female</option></select>
</td></tr>
<tr><td>First Name:</td><td><input type='text' name='firstname' "<?php echo $firstname;?>"></td></tr>
<tr><td><font size="2" color='red'>(OPTIONAL)</font>Middle Name:</td><td><input type='text' name='middlename' value="<?php echo $middlename;?>"></td></tr>
<tr><td>Last Name:</td><td><input type='text' name='lastname' value="<?php echo $lastname;?>"></td></tr>
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
<?php
} else if($username != "" || $password != "" || $firstname != "" || $lastname != ""){
?>

<h1>Postcode</h1>
<form action='get_Pcode.php' method='POST'>
<table cellspacing="2">
<tr><td>Street Address:</td><td><input type='text' name='streetaddress'></td></tr>
<tr><td><font size="1">E.g. 40 Sanctuary Drive</font></td></tr>
<tr><td>Postcode:</td><td><input type='text' name='postcode'></td></tr>
<tr><td><input type='submit' value="Address"></td></tr>
</table>
</form>
<?php } ?>


