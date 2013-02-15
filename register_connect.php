<?php $title = "Complete Registration";
include('header.php');
$username = strtolower($_POST['username']);
$password = $_POST['password'];
$password2 = $_POST['password2'];
if($password != $password2)
{
	die("Password does not match! Re-type your password correctly");
}
else
$email = $_POST['email'];
$gender = $_POST['gender'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];




if($username && $password && $email && $gender && $firstname && $lastname || $middlename)
{
if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
{
$accesslevel = '1';





	$checkusername = mysql_query("SELECT * FROM users WHERE user_name='$username'");
	$numrows = mysql_num_rows($checkusername);
	$checkuseremail = mysql_query("SELECT * FROM users WHERE user_email='$email'");
	$numrows2 = mysql_num_rows($checkuseremail);
	if($numrows !=0) {die("Username already exists! Please choose a different Username");}
	else if($numrows2 !=0) {die("Email already exists! Please enter an email address which belongs to you!");}
	$query=mysql_query("INSERT into users(user_name, user_pass, user_email, user_level, first_name, middle_name, last_name, user_gender) values('$username', MD5('$password'), '$email', 1, '$firstname', '$middlename', '$lastname', '$gender')");
	echo"Thank you for registering ". $firstname." ".$lastname."! Your user details are:";
echo"<br>";
	echo("Username: $username");
echo"<br>";
	echo("Password: $password");
echo"<br>" ;
	echo("Email: $email");
echo"<br>"."<br>";
		echo "Click here to go ";
		echo '<a href="index.php">Log on</a>';
		$txt = "Welcome to Vicspace!\n
            Your credentials are as follows\n\n
            Username: ".$username."\n
            Password: ".$password."\n\n
            We hope you have a great time online!";
    
    $headers = "From: noreply@vicspace.com" . "\r\n" .
                "CC: sam@vicspace.com";
    mail($email,"Welcome to Vicspace",$txt, $headers);
}
else
{
	echo("Please enter correct email address");
	echo"<br>";
	echo("Click here to go ");
	echo '<a href="index.php">back</a>';
	die;

}	
}
else
{
	echo("Please fill in the registration forms");
	echo"<br>";
	echo("Click here to go ");
	echo '<a href="index.php">back</a>';
	die;
}



include('footer.php'); ?>



