<?php
include "db.php";

$con=mysql_connect ($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");

$db_selected=mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");

if (!$db_selected) {
    die ('Can\'t select database : ' . mysql_error());
}

mysqli_close($con);
?>

<?php
session_start();
$id=$_SESSION['id'];

?>
<html>
<body>

<?php

$eid=$_GET['eid'];

$sql = "select * from Events where eid='$eid'";

$result = mysql_query ($sql,$con);
$row = mysql_fetch_array($result);
$eventName = $row['name'];

$sql="DELETE from Register where email_address='$id' and eid='$eid'";
//echo $sql;
$sql="UPDATE Events SET number_register_users=number_register_users-1 WHERE eid='$eid'";
//echo $sql1;

mysql_query("DELETE from Register where email_address='$id' and eid='$eid'",$con);
mysql_query("UPDATE Events SET number_register_users=number_register_users-1 WHERE eid='$eid'",$con);

?>
<script type="text/javascript"> 
    alert("You have cancelled registration for <?php echo $eventName; ?>"); 
    history.back(); 
  </script> 
</body>
</html>