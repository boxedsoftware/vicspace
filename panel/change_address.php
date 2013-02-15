<?php $title = "Change Address";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');?>

<script type="text/javascript" src="/scripts/postcode.js"></script>
<script type="text/javascript" src="/scripts/jquery-1.7.2.js"></script>

<?php

$address = mysql_query("SELECT user_address FROM users WHERE user_name='$uname'");
$address = mysql_fetch_row($address);
$address = $address[0];

$locality = mysql_query("SELECT user_locality FROM users WHERE user_name='$uname'");
$locality = mysql_fetch_row($locality);
$locality = $locality[0];

$pcode = mysql_query("SELECT user_pcode FROM users WHERE user_name='$uname'");
$pcode = mysql_fetch_row($pcode);
$pcode = $pcode[0];

if ($_SESSION['username'] == "")
{
	echo "Sorry, you are not logged in. Click here to "."<a href=/index.php>Go Back</a>";
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}

else ?>
<h2>New Address</h2>
<form action="user_panel_connect.php" method="POST">
<table>
<tr><td><?php echo "<font color=41383C>".$postcode."</font>";?></td><td>Postcode: </td><td><input type="text" id="newpostcode" name="newpostcode" onkeyup="showHint(this.value)" size="20" /></td></tr>
<tr><td></td><td><span id="txtHint" name="newlocality" /></td></tr>

</table>
</form>
<br />
<h3>Current Address</h3>
<table>
<tr><td /><td><?php echo $address;?></td></tr>
<tr><td /><td><?php echo $locality;?></td></tr>
</table>
<br /><br /><br /><br /><br /><br /><br />

<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>
