<?php $title = "User Panel";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');?>
<script type="text/javascript" src="/scripts/age.js"></script>
<?php
$map = $_SERVER['DOCUMENT_ROOT'].'/scripts/gmap.php';

if ($_SESSION['username'] == "")
{
	echo "Sorry, you are not logged in. Click here to "."<a href=../index.php>Go Back</a>";
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}

else

$today = date("D");



/*$email = mysql_query("SELECT user_email FROM users WHERE user_name='$uname'");
$email = mysql_fetch_row($email);
$email = $email[0];*/

$firstname = mysql_query("SELECT first_name FROM users WHERE user_name='$uname'");
$firstname = mysql_fetch_row($firstname);
$firstname = $firstname[0];

$middlename = mysql_query("SELECT middle_name FROM users WHERE user_name='$uname'");
$middlename = mysql_fetch_row($middlename);
$middlename = $middlename[0];

$lastname = mysql_query("SELECT last_name FROM users WHERE user_name='$uname'");
$lastname = mysql_fetch_row($lastname);
$lastname = $lastname[0];

$telephone = mysql_query("SELECT user_phone FROM users WHERE user_name='$uname'");
$telephone = mysql_fetch_row($telephone);
$telephone = $telephone[0];

$address = mysql_query("SELECT user_address FROM users WHERE user_name='$uname'");
$address = mysql_fetch_row($address);
$address = $address[0];

$locality = mysql_query("SELECT user_locality FROM users WHERE user_name='$uname'");
$locality = mysql_fetch_row($locality);
$locality = $locality[0];

$pcode = mysql_query("SELECT user_pcode FROM users WHERE user_name='$uname'");
$pcode = mysql_fetch_row($pcode);
$pcode = $pcode[0];

/*$state = mysql_query("SELECT user_state FROM users WHERE user_name='$username'");
$state = mysql_fetch_row($state);
$state = $state[0];*/

$userweekend = mysql_query("SELECT user_weekend FROM users WHERE user_name='$uname'");
$userweekend = mysql_fetch_row($userweekend);
$userweekend = $userweekend[0];

$age = mysql_query("SELECT user_dob_d, user_dob_m, user_dob_y FROM users WHERE user_name='$uname'");
$age = mysql_fetch_row($age);
$aged = $age[0];
$agem = $age[1];
$agey = $age[2];

$profession = mysql_query("SELECT user_occupation FROM users WHERE user_name='$uname'");
$profession = mysql_fetch_row($profession);
$profession = $profession[0];
?>

<h1 align="left">User Panel</h1>
<table align="right">

<form action="user_panel_connect.php" method="POST">
<tr><td style="text-align: center;" colspan="3" height="1px"><font size="1">Where are you going this weekend:<input type="text" name="weekend" size="20" value="<?php echo $userweekend; ?>" onchange="this.form.submit()"></input></font></td></tr><?php echo '<tr><td></td><td>';include($map); echo '</td></tr>';?></form>
<tr height=40 /><tr><td></td><td><a href="change_address.php">Add/Change Address</a></td></tr>
<tr><td /><td><?php echo $address;?></td></tr>
<tr><td /><td><?php echo $locality;?></td></tr>
</table>


<table align="left" cellspacing="0">
<tr><td><font color=#41383C><u>Current Settings:</u></font></td><td><font color=#302226><u>New Settings</u></font></td></tr>
<tr><td></td></tr>
<tr><td><a href="photo/<?php echo $uname;?>/dp.jpg"><img src="photo/<?php echo $uname;?>/smalldp.jpg" /></td>
<td colspan="2">
<form action='user_panel_connect.php' method='POST' enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />


<tr><td></td><td><font color=302226>New Password:</font></td><td><input type='password' name='newpassword'></td></tr>
<tr><td></td><td><font color=302226>Re-type Password:</font></td><td><input type='password' name='newpassword2'></td></tr>
<tr><td><?php echo "<font color=41383C>".$firstname."</font>"." ";?></td><td><font color=302226>Change First Name:</font></td><td><input type='text' name='newfirstname'></td></tr>
<tr><td><?php echo "<font color=41383C>".$middlename."</font>"." ";?></td><td><font color=302226>Change Middle Name:</font></td><td><input type='text' name='newmiddlename'></td></tr>
<tr><td><?php echo "<font color=41383C>".$lastname."</font>"." ";?></td><td><font color=302226>Change Last Name:</font></td><td><input type='text' name='newlastname'></td></tr>
<tr><td><?php echo "<font color=41383C>0".$telephone."</font>"." ";?></td><td><font color=302226>Change Phone:</font></td><td><input type='text' name='newphone'></td></tr>

<tr><td><?php echo "<font color=41383C>". $agem. " ". $aged. " ". $agey;?></td><td>Age</td><td><select name="month" id="month"  onchange="loadDays(this);">
            <option value="0">Month</option>
            <option value="1">January</option>
            <option value="2">Febuary</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        <select name="day" id="day"></select>
        <select name="year" id="year" onchange="loadMonths(this);"></td>
        </select>
<?php /*<tr><td>What are you after?</td></tr>
<tr><td><input type="checkbox" name="type" value="item-donor" />Item Donor</td><td><input type="checkbox" name="type2" value="item-seeker" />Item Seeker</td></tr>
<tr><td><input type="checkbox" name="type3" value="people-seeker" />People Seeker</td><td><input type="checkbox" name="type4" value="people-helper" />People Helper</td></tr>*/?>
<tr><td><?php echo "<font color=#41383C>".$profession."</font>"." ";?></td><td><font color=#302226>Change Profession:</font></td><td><input type='text' name='newoccupation'></td></tr>
<tr><td><input type='submit' value="Update"></td></tr>
<tr />
</table>
</form>
<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>

