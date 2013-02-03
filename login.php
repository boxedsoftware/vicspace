<?php 
$title = "Login";
include('header.php');?>
<h1>Log on</h1>
<form action='login_connect.php' method='POST'>
<table cellspacing="2">
<tr><td>Username:</td><td><input type='text' name='username'></td></tr>
<tr><td>Password:</td><td><input type='password' name='password'></td></tr>
<tr><td><input type='submit' value="Log in"></td></tr>
</table>
</form>
<?php include('footer.php');?>

