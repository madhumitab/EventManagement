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

<?php

$eid=$_GET['eid'];

$sql = "select * from Events where eid='$eid'";

$result = mysql_query ($sql,$con);
$row = mysql_fetch_array($result);
$eventName = $row['name'];

$sql="DELETE from Register where email_address='$id' and eid='$eid'";
//echo $sql;
$sql1="UPDATE Events SET number_register_users=number_register_users-1 WHERE eid='$eid'";
//echo $sql1;

mysql_query($sql,$con);
mysql_query($sql1,$con);

?>

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
<script src="js/formvalidation.js"></script>
</head>

<body>
<script src="http://code.jquery.com/jquery.js"></script>
    
	<script src="js/bootstrap.min.js"></script>
 
    <!-- bootbox code -->
    <script src="js/bootbox.min.js"></script>
	
<div class="container">

  <header><div class="wrapper" ><h1 align="center">Event Management </h1></div>


<nav align="center">
<a href="./eventHomePage.php" class="currentpage">  Home</a> |
<a href="./eventpostingpage.php">Post Event</a> |
<a href="./grouphomepage.php">Group Home</a> |
<a href="./grouppostingpage.php">Post Group</a> |
<a href="./myaccount.php">Myaccount</a> |
<a href="./logout.php"> Logout</a>
</nav>


    </header>
  <div class="sidebar1">
<p></p>
    <ul class="nav">
      <li><a href="eventHomePage.php?cat=sports">Sports</a></li>
      <li><a href="eventHomePage.php?cat=concerts">Concerts</a></li>
      <li><a href="eventHomePage.php?cat=outdoor">Outdoor</a></li>
      <li><a href="eventHomePage.php?cat=party">Parties</a></li>
    </ul>

  
  <div class="menu">
			
	  <p class="search">Search Events</p>
			<ul>
<form action="./search1.php" method="post">
				<input type="search" name="parameter" style="width: 105px;" />
		
				<input type="submit" value="Search"/></form>
			</ul>
	  </div>

<div class="menu">

<p class="advancesearch"><a href="./advanceSearch.php">Advanced Search </a></p>


</div>
  <!-- end .sidebar1 -->
</div>



  <article class="content" >
  <?php
  

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10; 
  $sql="select event.name,event.eid,reg.status from Events event,Register reg where event.eid=reg.eid and reg.email_address='".$id."' LIMIT $start_from, 10";
  $rs_result = mysql_query ($sql,$con); 
  
  ?>
  <h3>Your registered events</h3>
	<form>
	<table border="1">
	<tr align ="left">
	<td><b>
	Event Name</b>
	</td>
	<td><b>
	Status</b>
	</td>
	<td><b>
	Action</b>
	</td>
	</tr>
	<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
             <td><?php
             echo $row["name"];
             ?>
         	</td><td><?php if($row["status"]=='r') echo 'Registered'; else echo 'Waitlist'; ?></td>
		
           <td>
			<a href="registeredEvents.php?eid=<?php echo $row['eid']?>"> <input name="" type="button" value="Cancel" onclick="return confirm('Are you sure you want to cancel your registration for this event?')" /> 
      </a></td>
			</tr>
			
			
			
<?php 
}; 
?> 
</table>
	
	</table>
	</form>
	
       
  
   
<section>

  
</section>
</article>
  
  <footer>
  
  <?php 
  
  $sql="select count(event.name) from Events event,Register reg where event.eid=reg.eid and reg.email_address='".$id."'";

$rs_result = mysql_query($sql);
$row = mysql_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / 10);  
$pagLink = "<div class='pagination pagination-right' >"; 
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='registeredEvents.php?page=".$i."'>&nbsp;" .$i. "&nbsp;</a>";  
};  
if($i>1) {echo $pagLink . "</div>";} 
?> 
    <p> </p>
  </footer>
  </body>
  </html>
  
  