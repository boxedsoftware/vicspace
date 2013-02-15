<?php
session_start();?>
<html>
<head>
</head>
<body>
<?php
if (!$_SESSION['username'])
{
	echo "Sorry "."<i>".$_SESSION['username']."</i>"."<br>";
	echo("You do not have sufficient priveleges. (You did not register as a person seeker) or you are not logged in");
	include($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	die;
}
else
$address = $_POST['newaddress'];
$num = $_GET['q'];
//$num = 3031;
$detail = null;
$root = simplexml_load_file('postcodes.xml');?>
<table>
<form action='user_panel_connect.php' method='POST'>
<tr><td>Locality: <select name='newlocality'>
<?php
foreach ($root->Locality as $Locality) 
{ 

      $ns_bk = $Locality->children();  
      $Pcode = $ns_bk->Pcode;
      $Suburb = $ns_bk->Suburb;
      $State = $ns_bk->State;

          if($Pcode == $num )
          {
            $detail = $Suburb.", ".$State." ".$Pcode."<br>";?>
            
            <option><?php
            echo $detail;?></option>
            <?php
          }
          
}?>


<?php
         if($detail == null)
          {
          echo "<option>INVALID POST CODE </option>";
          //echo "<button type=\"button\" onClick=\"window.location='query_Pcode.php' \">Go Back</button>";
          }
	 else
	{
		
	}
?>
</select></td></tr>
<tr><td>Street Address: <input type="text" name="newaddress"></input></td></tr>
<tr><td><input type="submit" value="Update" /></tr></td>
</form>
</table>
</body>
</html>
