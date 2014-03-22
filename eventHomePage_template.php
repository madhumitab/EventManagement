<?php
include 'setSession.php';
?>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	@import "stylesheet.css";
</style>
<title>SiteName</title>
</head>
<body>
<div id="wrapper">

 <h1 align="center"> Event Management system</h1>
 
	<div class="topbar">
   <a href="eventHomePage.php">Home</a>|<a href="eventpostingpage.php">Post Event</a>|<a href="grouphomepage.php">Group Home</a>|<a href="grouppostingpage.php">Post Group</a>|<a href="myaccount.php">Myaccount</a>|<a href="logout.php">Logout</a>
    </div>
	<div class="topbar_bottom"></div>
	
	
	<div id="menu_container">
	
		<div class="menu">
			
			<p class="item_top">Categories</p>

			
			
		  <p class="item_top"><a href="eventHomePage.php?cat=sports">Sports</a></p>
		
			
			<p class="item_top"><a href="eventHomePage.php?cat=concerts">Concerts</a></p>
<p class="item_top"><a href="eventHomePage.php?cat=outdoor">Parties</a></p>
			
<p class="item_top"><a href="eventHomePage.php?cat=outdoor">Outdoor</a></p>
<p class="item_top"> <a href="advanceSearch.php">AdvancedSearch</a></p>
	  </div>
			
	<div class="menu_bottom"></div>
	<div class="menu">
			
	  <p class="item_top">Search Events</p>
			<ul>
				<input type="text" value="type text to search" style="width: 105px;" />
		
				<input type="submit" value="Search" />
				
			</ul>
	  </div>
	  <div class="menu_bottom"></div>
	</div>

	<div id="content_container"> </div>
	  <div class="content">
		
		  <p class="item_top">Event List :</p>
	
    <?php 
	
	if (isset($_GET["cat"])) { $cat  = $_GET["cat"]; } else { $cat="%"; }; 

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 5; 

if ($cat=="sports") {$sql = "SELECT name,eid FROM Events where end_time > now() and category like 'Sports' ORDER BY start_time DESC LIMIT $start_from, 5";} 

else if ($cat=="concerts") {$sql = "SELECT name,eid FROM Events where end_time > now() and category like 'Concerts' ORDER BY start_time DESC LIMIT $start_from, 5";} 

else if ($cat=="outdoor") {$sql = "SELECT name,eid FROM Events where end_time > now() and category like 'Outdoor' ORDER BY start_time DESC LIMIT $start_from, 5";} 

else if ($cat=="party") {$sql = "SELECT name,eid FROM Events where end_time > now() and category like 'Parties' ORDER BY start_time DESC LIMIT $start_from, 5";} 

else 
$sql = "SELECT name,eid FROM Events where end_time > now() ORDER BY start_time DESC LIMIT $start_from, 5";

$rs_result = mysql_query ($sql,$con); 

?>
<?php
$email_address=$_SESSION['id']; 
if (isset($_GET["register"])) { $reg  = $_GET["register"]; 
$eid=$_GET['eid'];
//echo $eid;

         
//echo $email_address;
$query = "select * from Events where eid='$eid'";
$result = mysql_query ($query);

	$info = mysql_fetch_array( $result );


	//$eventID = $info[$_EVENT_ID];
	$eventName = $info['name'];
	$number_register_users= $info['number_register_users'];
	$upperlimit= $info['upperlimit'];
	$res=mysql_query("select count(eid) as total from Register where eid='$eid' and email_address='$email_address'");
	//echo "select count(eid) as total from Register where eid='$eid' and email_address='$email_address'";
		$info3 = mysql_fetch_assoc($res);
		//echo $info3;
		$count=$info3['total'];
		//echo $count;
		if($count==1)
		{
		echo "You are already registered for this event";
		
		//bootbox.alert("hi");
		//alert func here
		}
		else{
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
	echo "You have been registered for the event ".$eventName;
		
		
}
	
mysql_close($con);
}

?>


<div>
<table>

<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
             <td><a href="eventdes.php?eid=<?php echo $row['eid']?>"><?
             echo $row["name"]; 
             ?>
         	</a></td>
		<td> <a href="eventHomePage.php?eid=<?php echo $row['eid']?>&register=y"><input type="submit" name="drop" id="drop" value="Register"></a>
            
			
			</tr>
			
			
			
<?php 
}; 
?> 
</table>
    
    </div>
	<div class="content">
	<br />
	<center>
      <?php 
  
  $sql="SELECT COUNT(name) from Events where end_time > now() and category like '".$cat."'";

$rs_result = mysql_query($sql);
$row = mysql_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / 5);  
$pagLink = "<div class='pagination pagination-right' >"; 
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='eventHomePage.php?page=".$i."&cat=".$cat."'>&nbsp;" .$i. "&nbsp;</a>";  
};  
if($i>1) {echo $pagLink . "</div>";} 
?> 
    
   	  </div>
    
	<div class="content_bottom">
    
    <br />
	</div>
	
		<!-- START OF ZYMIC.COM COPYRIGHT, DO NOT REMOVE OR EDIT ANYTHING BELOW WITHOUT PAYING LICENSE FEE (ELSE FACE LEGAL ACTION) -->
		<p style="color: #fff; margin: 0; width: auto; text-align: center;">	Copyright &copy; 2013 Indiana University </p>
	  <!-- END ZYMIC.COM COPYRIGHT -->
	</div>
</div>


</body>
</html>

