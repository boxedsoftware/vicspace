<?php $title = "Admin";
include($_SERVER['DOCUMENT_ROOT'].'/header.php');

if($accesslevel != 100)
{
echo "You are not an administrator! You should not be here";
include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
die;
}
else

echo '<br><br><a href=/admin/user_search.php>'."Search User Accounts".'</a>';
echo '<br><br><a href=/delete_my_posts.php>'."Delete Posts".'</a>';
echo '<br><br><a href=/admin/feedback/view_feedback.php>'."View all Feedback".'</a>';



include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>

