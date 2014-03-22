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


$email_address=$_GET['maddress'];
$mid=$_POST['mid'];

$sql="UPDATE GroupMembers SET approve='1' WHERE email_address='$email_address'";
$sql1="DELETE from GroupMembers where email_address='$mid'";
//echo $sql;

mysql_query($sql1,$con);
mysql_query($sql,$con);

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

  <article class="content1" >
  <?php
  $sql="select * from Groups where owner='".$id."'";
  $rs_result = mysql_query ($sql,$con); 
  
  ?>
  <h3>Groups owned</h3>
	<form>
	<table border="1">
	<tr align ="left">
	<td><b>
	Group Name</b>
	</td>
	<td><b>
	Approve</b>
	</td>
	</tr>
	<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
             <td><?php
             $gid=$row["gid"];
            
             $result=mysql_query("select * from GroupMembers where gid='$gid' and approve='0'");


              echo "<ol>";
             echo $row["name"];
             echo "<br>";

             echo "Members which need approval :";
             echo "</tr>";
             echo "<br>";
              while ($row1 = mysql_fetch_assoc($result)) { 
                echo "<tr><td>";
                echo $row1["email_address"];
             
			
             ?>
</td>
<td>
<a href="membersofgroup.php?maddress=<?php echo $row1['email_address']?>"><input type="button" name="Approve" value="approve" onclick="return confirm('Are you sure you want to approve this user?')">
         	</a></td>
		
           
			</tr>
			
			
			
<?php 
}
echo "</ol>";
}
?> 
</table>
	
	</table>
<p><h4>Remove the user :</h4></p>


  <form action="membersofgroup.php" method="post">Email Address of user: <input type="text" name="mid"/> <input type="submit" value="Remove">
</form>



	</form>
	
       
  
   
<section>
  
</section>
</article>
  
  <footer>
    <p> </p>
  </footer>
  </body>
  </html>
  
  