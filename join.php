<html>
<body>

<?php
session_start();
$dbHost = "silo.cs.indiana.edu";
$dbUserAndName = "b561f13_ggomatom";
$dbPass = "my+sql=b561f13_ggomatom";

mysql_connect ($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");
mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");;
$gid=$_GET['gid'];
echo $gid;

         $email_address=$_SESSION['id']; 
//echo $email_address;
$query = "select * from Groups where gid='$gid'";
$result = mysql_query ($query);

	$info = mysql_fetch_array( $result );


	//$eventID = $info[$_EVENT_ID];
	$groupName = $info['name'];
	$number_member= $info['number_member'];
	//$upperlimit= $info['upperlimit'];
	$res=mysql_query("select count(gid) as total from GroupMembers where gid='$gid' and email_address='$email_address'");
	//echo $res;
		$info3 = mysql_fetch_assoc($res);
		//echo $info3;
		$count=$info3['total'];
		//echo $count;
?>
<script type="text/javascript"> 
if(<?php echo $count?>==1)
{
 	 alert("You have already join this group. Search for other groups. "); 
    history.back(); 
}
</script>
<?php


	
	
	mysql_query("INSERT INTO GroupMembers(gid,email_address,approve) VALUES('$gid', '$email_address', '0')");

	
	$number_member=$number_member+1;
	mysql_query("UPDATE Groups SET number_member='$number_member' WHERE gid='$gid'");

	
mysql_close($con);
?>
<script type="text/javascript"> 
 
 	 alert("You have successfully join the group <?php echo $groupName?>. "); 
    history.back(); 
</script> 
</body>
</html>