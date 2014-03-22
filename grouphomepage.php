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



  <article class="content">
   

</form>
<?php 
	
	if (isset($_GET["cat"])) { $cat  = $_GET["cat"]; } else { $cat="%"; }; 

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10; 

if ($cat=="sports") {$sql = "SELECT name,gid FROM Groups where category like 'Sports' LIMIT $start_from, 10" ;} 

else if ($cat=="concerts") {$sql = "SELECT name,gid FROM Groups where category like 'Concerts' LIMIT $start_from, 10";} 

else if ($cat=="outdoor") {$sql = "SELECT name,gid FROM Groups where category like 'Outdoor' LIMIT $start_from, 10";} 

else if ($cat=="party") {$sql = "SELECT name,gid FROM Groups where category like 'Parties' LIMIT $start_from, 10";} 

else 
$sql = "SELECT name,gid FROM Groups where category like '%' LIMIT $start_from, 10";

$rs_result = mysql_query ($sql,$con); 

?> 
<div class="pagestatic">
<table>
<tr><td><b><i>Join various groups. Enjoy!!</i></b></td></tr>

<?php

if (isset($_GET["gid"]))
{

$gid=$_GET["gid"];
$email_address=$_SESSION['id']; 
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
		if($count>=1)
		{
		
		echo "You have already join this group. Search for other groups.";
		}
		else
		{
		mysql_query("INSERT INTO GroupMembers(gid,email_address,approve) VALUES('$gid', '$email_address', '0')");
		$number_member=$number_member+1;
		mysql_query("UPDATE Groups SET number_member='$number_member' WHERE gid='$gid'");
		 echo "you have successfully join the group <?php echo $groupName."; 
		mysql_close($con);
		
		}
		
}
?>

<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>

             <td><a href="groupDes.php?gid=<?php echo $row['gid']?>"><?

             echo $row["name"]; 
             //echo $row["gid"];
             ?>
         	</a></td>
		<td> <a href="./grouphomepage.php?gid=<?php echo $row['gid']?>"><input type="submit" name="drop" id="drop" value="Join"></a>
            
			

			</tr>
			
			
			
<?php 
}; 
?> 
</table>
    </div>
   
    <p>&nbsp;</p>
  <!-- end .content --></article>
    
  <footer>
  <?php 
  
  $sql="SELECT COUNT(name) from Groups where category like '".$cat."'";

$rs_result = mysql_query($sql);
$row = mysql_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / 10);  
$pagLink = "<div class='pagination pagination-right' >"; 
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='grouphomepage.php?page=".$i."&cat=".$cat."'>&nbsp;" .$i. "&nbsp;</a>";  
};  
if($i>1) {echo $pagLink . "</div>";} 
?> 
 
 </footer>
  <!-- end .container --></div></div>
  
</body>
</html>

