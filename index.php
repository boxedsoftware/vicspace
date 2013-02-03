<?php $title = "Vicspace";
include('header.php');
function redirect() 
{
    header('Location:gossip/get_gossip.php');
}
if ($_SESSION['username'] == "" || $_SESSION['username'] == null)
{

?>

<img id='picture' src='/Images/gossip.png' align='left'></img>

<form action='register_connect.php' method='POST'>
<table align="right" cellspacing="5">
<tr><td colspan="2" style="text-align: center;"><font size="5">Register</font></td></tr>
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
<tr><td><input type='submit' value="Register"></td></tr>
</table>
</form>
<?php
}
else if($_SESSION['username'] != "")
{
  redirect();
}
include('footer.php');?>
<style type="text/css">
#picture
{

	max-width: 90%;
	
}
</style>