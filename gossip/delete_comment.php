<?include($_SERVER['DOCUMENT_ROOT'].'/header.php');

$cusername = $_GET['cusername'];
$cid = $_GET['cid'];
$gid = $_GET['gid'];

$nameverify = mysql_query("select comment_user_name from comments WHERE comment_id='$cid'");
$nameverify = mysql_fetch_row($nameverify);
$nameverify = $nameverify[0];

if($nameverify == $uname)
{
$delete = mysql_query("DELETE FROM comments WHERE comment_id='$cid'");

echo "<br />Item has been deleted. Click here to go ".'<a href=comment.php?id='.$gid.'>Back</a>';
echo '<meta http-equiv="refresh" content="1;url=/gossip/comment.php?id='.$gid.'">';
}
else if($accesslevel > 50)
{
$delete = mysql_query("DELETE FROM comments WHERE comment_id='$cid'");

echo "<br />";
echo "Item has been deleted. Click here to go ".'<a href=comment.php?id='.$gid.'>Back</a>';
echo '<meta http-equiv="refresh" content="0.2;url=/gossip/comment.php?id='.$gid.'">';
}
else
{
echo "<br />";
echo 'Mmm trying to delete other peoples comments??? Not going to happen sunshine :)';
}

include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>
