<?php
session_start();
//include($_SERVER['DOCUMENT_ROOT'].'/header.php');
include('SimpleImage.php');
//$filename = "dp";
$filename = $_FILES["file"]["name"];
$uname = $_SESSION['username'];
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
    
    if(!file_exists("photo/".$uname))
    {
    mkdir("photo/".$uname);
    }
    if (file_exists("photo/".$uname."/" . $_FILES["file"]["name"]))
      {
      
      //echo $_FILES["file"]["name"] . " already exists. ";
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "photo/".$uname."/dp.jpg");
      echo "Stored in: photo/" . $uname."/" .$uid."_".$_FILES["file"]["name"];
      //copy($uname."/".$_FILES["file"]["name"], $uname."/small".$_FILES["file"]["name"]);
      
      $image = new SimpleImage();
      $image->load("photo/".$uname."/"."dp.jpg");
      $image->resizeToWidth(250);
      $image->save("photo/".$uname."/small"."dp.jpg");
      $image1 = new SimpleImage();
      $image1->load("photo/".$uname."/"."dp.jpg");
      $image1->resizeToWidth(50);
      $image1->save("photo/".$uname."/tinydp.jpg");
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "photo/".$uname."/dp.jpg");
      echo "Stored in: photo/" . $uname."/dp.jpg";
      //copy($uname."/".$_FILES["file"]["name"], $uname."/small".$_FILES["file"]["name"]);
      $image = new SimpleImage();
      $image->load("photo/".$uname."/"."dp.jpg");
      $image->resizeToWidth(250);
      $image->save("photo/".$uname."/smalldp.jpg");
      $image1 = new SimpleImage();
      $image1->load("photo/".$uname."/"."dp.jpg");
      $image1->resizeToWidth(50);
      $image1->save("photo/".$uname."/tinydp.jpg");
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
