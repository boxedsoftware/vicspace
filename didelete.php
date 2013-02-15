<?php include('header.php');

$id = $_GET['id'];
$delete = mysql_query("DELETE FROM gossip WHERE gossip_id='$id'");

echo "<br />Item has been deleted. Click here to go ".'<a href=delete_my_posts.php>Back</a>';

include('footer.php');?>
