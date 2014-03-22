
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Event Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link rel="stylesheet" type="text/css" href="css/style_sheet.css">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="js/bootstrap.js"></script>
</head>

<body>
<script src="http://code.jquery.com/jquery.js"></script>
    
	<script src="js/bootstrap.min.js"></script>
 
    <!-- bootbox code -->
    <script src="js/bootbox.min.js"></script>
	
<div class="container">

  <header> <h1 align="center">Event Management </h1>
  <div align="right">
    
    <a href="eventHomePage.php">Home</a>|<a href="eventpostingpage.php">Post Event</a>|<a href="grouphomepage.php">Group Home</a>|<a href="grouppostingpage.php">Post Group</a>|<a href="myaccount.php">Myaccount</a></h6>|<h6><a href="logout.php">Logout</a></h6></div> 
   <div align="right"><form action="search1.php" method="post">Search <input type="search" name="parameter"/> <input type="submit" value=">>">
</form>| <a href="advanceSearch.php">Advanced Search</div></a> </header>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="eventHomePage.php?cat=sports">Sports</a></li>
      <li><a href="eventHomePage.php?cat=concerts">Concerts</a></li>
      <li><a href="eventHomePage.php?cat=outdoor">Outdoor</a></li>
      <li><a href="eventHomePage.php?cat=party">Parties</a></li>
    </ul>
  <!-- end .sidebar1 --></div>
  <article class="content">
   

</form>
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


<div class="pagestatic">
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
   
    <p>&nbsp;</p>
  <!-- end .content --></article>
    
  <footer align="center">
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
 
 </footer>
  <!-- end .container --></div></div>
  
</body>
</html>

