<?php $title = "Panel Updated!";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
//$username = $_SESSION['username'];
include($_SERVER['DOCUMENT_ROOT'].'/panel/photo/photo_upload.php');
$password = filter_var($_POST['newpassword'], FILTER_SANITIZE_STRING);
$password2 = filter_var($_POST['newpassword2'], FILTER_SANITIZE_STRING);
if($password != $password2)
{
	die("Password does not match! Re-type your password correctly");
}
else
//$email = $_POST['newemail'];
$firstname = filter_var($_POST['newfirstname'], FILTER_SANITIZE_STRING);
$middlename = filter_var($_POST['newmiddlename'], FILTER_SANITIZE_STRING);
$lastname = filter_var($_POST['newlastname'], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['newphone'], FILTER_SANITIZE_NUMBER_INT);
$postcode = filter_var($_POST['newpostcode'], FILTER_SANITIZE_STRING);
$address = filter_var($_POST['newaddress'], FILTER_SANITIZE_STRING);
$locality = filter_var($_POST['newlocality'], FILTER_SANITIZE_STRING);
//$state = $_POST['newstate'];
$agemonth = filter_var($_POST['month'], FILTER_SANITIZE_NUMBER_INT);
$ageday = filter_var($_POST['day'], FILTER_SANITIZE_NUMBER_INT);
$ageyear = filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
$occupation = filter_var($_POST['newoccupation'], FILTER_SANITIZE_STRING);
$weekend = filter_var($_POST['weekend'], FILTER_SANITIZE_STRING);

	if($password)
	{
	$query=mysql_query("UPDATE users SET user_pass=MD5('$password') WHERE user_name='$uname'");
	}
	
	if($firstname)
	{	
	$query3=mysql_query("UPDATE users SET first_name='$firstname' WHERE user_name='$uname'");
	}
	if($middlename)
	{
	$query4=mysql_query("UPDATE users SET middle_name='$middlename' WHERE user_name='$uname'");
	}
	if($lastname)
	{	
	$query5=mysql_query("UPDATE users SET last_name='$lastname' WHERE user_name='$uname'");
	}
	if($phone)
	{	
		if(!eregi( "^[0-9]+$", $phone ))
		{die("Invalid phone number! Please type in digits");}
		else
	$query6=mysql_query("UPDATE users SET user_phone='$phone' WHERE user_name='$uname'");
	}
	if($address)
	{	
	$query7=mysql_query("UPDATE users SET user_address='$address' WHERE user_name='$uname'");
	}
	if($postcode)
	{	
	$query=mysql_query("UPDATE users SET user_pcode='$postcode' WHERE user_name='$uname'");
	}	
	if($locality)
	{	
	$query8=mysql_query("UPDATE users SET user_locality='$locality' WHERE user_name='$uname'");
	}
	if($agemonth && $ageday && $ageyear)
	{
	$query9=mysql_query("UPDATE users SET user_dob_d='$ageday', user_dob_m='$agemonth', user_dob_y='$ageyear' WHERE user_name='$uname'");
	}
	if($occupation)
	{	
	$query10=mysql_query("UPDATE users SET user_occupation='$occupation' WHERE user_name='$uname'");
	}
	if($weekend)
	{
	$query11=mysql_query("UPDATE users SET user_weekend='$weekend' WHERE user_name='$uname'");
	}	
echo "<br /><br /><br /><br /><table>";
echo "<tr><td>Panel Updated!</td></tr>";
echo"</table><br>"."<br>";
		
		echo '<meta http-equiv="refresh" content="1;url=/panel/user_panel.php">';




include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>



