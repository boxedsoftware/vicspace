<?php
include('SimpleImage.php');
$filename = $_FILES["file"]["name"];
$username = $_SESSION['username'];
$uid = uniqid("", true);
$ufname = $uid."_".$_FILES["file"]["name"];
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/bmp"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    
    if(!file_exists($username))
    {
    mkdir($username);
    }
    if (file_exists($username."/" . $_FILES["file"]["name"]))
      {
      
      //echo $_FILES["file"]["name"] . " already exists. ";
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $username."/" .$uid. "_".$_FILES["file"]["name"]);
      echo "Stored in: " . $username."/" .$uid."_".$_FILES["file"]["name"];
      //copy($username."/".$_FILES["file"]["name"], $username."/small".$_FILES["file"]["name"]);
      
      $image = new SimpleImage();
      $image->load($username."/".$ufname);
      $image->resizeToWidth(250);
      $image->save($username."/small".$ufname);
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $username."/" . $_FILES["file"]["name"]);
      echo "Stored in: " . $username."/" . $_FILES["file"]["name"];
      //copy($username."/".$_FILES["file"]["name"], $username."/small".$_FILES["file"]["name"]);
      $image = new SimpleImage();
      $image->load($username."/".$filename);
      $image->resizeToWidth(250);
      $image->save($username."/small".$filename);
      }
    }
  }
else if($_FILES["file"]["size"] > 2000000)
  {
  echo "Image too large";
  }
else
  {
  echo "Not an Image file!";
  
  }
  
?> 
