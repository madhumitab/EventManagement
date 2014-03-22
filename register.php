<?php
include 'setSession.php';
?>
<html>
<body>

<?php
session_start();
$dbHost = "silo.cs.indiana.edu";
$dbUserAndName = "b561f13_ggomatom";
$dbPass = "my+sql=b561f13_ggomatom";

mysql_connect ($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");
mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");;
$eid=$_GET['eid'];
//echo $eid;

         $email_address=$_SESSION['id']; 
//echo $email_address;
$query = "select * from Events where eid='$eid'";
$result = mysql_query ($query);

	$info = mysql_fetch_array( $result );


	//$eventID = $info[$_EVENT_ID];
	$eventName = $info['name'];
	$number_register_users= $info['number_register_users'];
	$upperlimit= $info['upperlimit'];
	$res=mysql_query("select count(eid) as total from Register where eid='$eid' and email_address='$email_address'");
	//echo $res;
		$info3 = mysql_fetch_assoc($res);
		//echo $info3;
		$count=$info3['total'];
		//echo $count;
?>
<script type="text/javascript"> 
if(<?php echo $count?>==1)
{
 	 alert("You have already registered for this event. Search for other events. "); 
    history.back(); 
}
</script>
<?php


	if($number_register_users>=$upperlimit)
	{
		$status='w';

	
	}
	else
	{
		$status='r';

	}
	if($status=='w')
	{
		$max=mysql_query ("select count(eid) from Register where eid='$eid' and status='w'");
		$info2 = mysql_fetch_array( $max);
		$maximum=$info2['count(eid)'];
		
		$query1 = "select * from Register where eid='$eid'";
		$result1 = mysql_query ($query1);

		$info1 = mysql_fetch_array( $result1 );


		//$eventID = $info[$_EVENT_ID];
	
	$Status_Number = $info1['Status_Number'];
	$Status_Number= $maximum+1;
	
	mysql_query("INSERT INTO Register(eid,email_address,status, Status_Number)VALUES('$eid', '$email_address', '$status','$Status_Number')");

	}
	else
	{
		//mysql_query("INSERT INTO Register(eid,email_address,status, Status_Number)VALUES('$eid', 'cadeshpa@indiana.edu', 'r','0')");
	
		mysql_query("INSERT INTO Register(eid,email_address,status, Status_Number)VALUES('$eid', '$email_address', 'r','0')");
	}

	$number_register_users=$number_register_users+1;
	mysql_query("UPDATE Events SET number_register_users='$number_register_users' WHERE eid='$eid'");

	
mysql_close($con);
?>
<script type="text/javascript"> 
 
 	 alert("You have successfully registered for <?php echo $eventName; ?>."); 
    history.back(); 
</script> 
</body>
</html>