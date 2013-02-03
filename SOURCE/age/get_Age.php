<?php

$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];

$tyear = (int) date('Y');
$tmonth = (int) date('n');
$tday = (int) date('j');
$years = $tyear - $year - 1;
if($tmonth == $month && $tday >= $day) 
{
++$years;
}

echo $years;

?>