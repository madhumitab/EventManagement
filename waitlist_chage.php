<?php
include "db.php";

$con=mysql_connect ($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");

$db_selected=mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");

if (!$db_selected) {
    die ('Can\'t select database : ' . mysql_error());
}


 
$sql="SELECT distinct eid from Events";

$info = mysql_fetch_array( $result );
echo "no of rows is".count($info);
for($i=1;$i<count($info);$i++){
echo $info["eid"];
echo $info["upperlimit"].""<br><br>";
}

?>
