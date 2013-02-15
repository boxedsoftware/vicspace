<iframe src="/chat/update.html" align="bottom" width="100%" height="200px"></iframe>
<?php
if ($_SESSION['username'] != "")
{
?>
<iframe src="/chat/insert.html" height="35" width="100%" scrolling="no" frameborder="0"></iframe>
<?php } 
else
{
echo "You will need to login to chat!";
}
?>
<br /> <br />
<table align=center><tr><td><a href="/info/about.php">About </a></td><td><a href="/info/contact.php"> Contact Us</a></td><td><a href="/info/up.html"> Usage Policy</a></td><td><a href="/info/leave_feedback.php"> Feedback</a></td></tr></table>
<br><p align=center> Vicspace</p>
</div>
</body>
</html>
