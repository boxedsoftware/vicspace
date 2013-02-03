<html>
<head>
</head>
<body>
<?php
$num = $_GET['q'];
//$num = 3031;
$detail = null;
$root = simplexml_load_file('postcodes.xml');?>
<form>
<select name='address'>
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
		echo "<input type='submit' value=\"submit\">" ;
	}
?>
</select>
</form>
</body>
</html>
