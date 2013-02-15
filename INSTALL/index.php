<?php

//Please replace USERNAME and PASSWORD arguments to that of your mysql credentials
$connect = mysql_connect("localhost","USERNAME","PASSWORD") or die("Couldn't connect; check your mysql_connect() settings");
$createdb = mysql_query ("CREATE database vicspace;");
exec('mysql -h localhost -u USERNAME --password=PASSWORD vicspace < /var/www/vicspace/INSTALL/vicspace.sql');
echo "Installed database!";
?>
