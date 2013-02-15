<base target="_parent" />
<?php
//Please replace USERNAME and PASSWORD arguments to that of your mysql credentials
$connect = mysql_connect("localhost","USERNAME","PASSWORD") or die("Couldn't connect; check your mysql_connect() settings");
$database = mysql_select_db("vicspace") or die("Could not locate database!");

$name = mysql_query("SELECT c_name, c_message FROM chat order by c_id DESC");
$numonline = mysql_query("SELECT user_name from users WHERE user_online='1'");
$numonline = mysql_num_rows($numonline);

echo "<table border='0'>
<tr>
<th colspan=\"1\">Name</th>
<th colspan=\"1\">Message</th>
<th align=\"right\" colspan=\"6\">Users Online: <font color=\"red\"><a href=/online_users.php> ".$numonline."</a></font></th>
</tr>";

while($row = mysql_fetch_array($name))
  {
  echo "<tr>";
  echo "<td ><strong><a style=\"color:330066;\" href=/user_profile.php?name=".$row['c_name'].">" . $row['c_name'] . "</a>:</strong></td>";
  echo "<td colspan=\"2\"><font face=\"Norasi\" color=\"CC0066\">" . $row['c_message'] . "</font></td>";
  echo "</tr>";
  }
echo "</table>";

$clean = mysql_query("DELETE from chat where c_message = \"\" ");
mysql_close($connect);
echo "<a name=\"Bot\">";
?> 
