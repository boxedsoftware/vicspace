<?php
include($_SERVER['DOCUMENT_ROOT'].'/scripts/SimpleImage.php');
//include($_SERVER['DOCUMENT_ROOT'].'/vicspace.com/header.php');
//$filename = "dp";
$filename = $_FILES["file"]["name"];
$uid = uniqid("", true);
$ufname = $uid."_".$_FILES["file"]["name"];
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/png"))
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
    
    if(!file_exists("photo/".$gossip_id))
    {
    mkdir("photo/".$gossip_id);
    }
    if (file_exists("photo/".$gossip_id."/pic" . $_FILES["file"]["type"]))
      {
      
      echo $_FILES["file"]["name"] . " already exists. ";
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "photo/".$gossip_id."/" .$uid. "_pic".$_FILES["file"]["type"]);
      echo "Stored in: photo/" . $gossip_id."/" .$uid."_pic".$_FILES["file"]["type"];
      //copy($gossip_id."/".$_FILES["file"]["name"], $gossip_id."/small".$_FILES["file"]["name"]);
      
      $image = new SimpleImage();
      $image->load("photo/".$gossip_id."/" .$uid."_pic".$_FILES["file"]["type"]);
      $image->resizeToWidth(50);
      $image->save("photo/".$gossip_id.$uid."_/smallpic".$_FILES["file"]["type"]);
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "photo/".$gossip_id."/pic.jpg");
      echo "Stored in: photo/" . $gossip_id."/pic.jpg";
      //copy($gossip_id."/".$_FILES["file"]["name"], $gossip_id."/small".$_FILES["file"]["name"]);
      $image = new SimpleImage();
      $image->load("photo/".$gossip_id."/pic.jpg");
      $image->resizeToWidth(50);
      $image->save("photo/".$gossip_id."/smallpic.jpg");
      }
    }
  }
else if($_FILES["file"]["size"] > 2000000)
  {
  echo "Image too large";
  }
else
  {
  //echo "Not an Image file!";
  
  }
  
?> 
