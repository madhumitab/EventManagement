<?php
include "db.php";

$con=mysql_connect ($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");

$db_selected=mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");

if (!$db_selected) {
    die ('Can\'t select database : ' . mysql_error());
}
echo "before selet";
$sql = "SELECT eid FROM Events"; 
$rs_result = mysql_query ($sql,$con); 

echo "result is "
echo $rs_result;

mysqli_close($con);
?>