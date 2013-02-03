<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
<?php include($_SERVER['DOCUMENT_ROOT'].'/header.php'); 
if (!$_SESSION['username'])
{
	echo "Sorry "."<i>".$_SESSION['username']."</i>"."<br>";
	echo("You do not have sufficient priveleges. (You did not register as a person seeker) or you are not logged in");
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}
else
?>
<h1>What did you see today?</h1>
<form name="stalk">
<textarea name="limitedtextfield" type="text" rows="4" onKeyDown="limitText(this.form.limitedtextfield,this.form.countdown,100);" onKeyUp="limitText(this.form.limitedtextfield,this.form.countdown,100);" maxlength="100"></textarea><br>
<font size="1">(Maximum characters: 100)<br>
You have <input readonly type="text" name="countdown" size="3" value="100"> characters left.</font>
<br />
<input type="submit" name="submit" value="Post!"></input>
</form>

<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>