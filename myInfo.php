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
$save=$_GET['save'];

$phno=$_POST['phno'];

$ques=$_POST['ques'];
$ans=$_POST['ans'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
if($save == 'yes')
{
$sql="UPDATE Users SET phone_number='".$phno."', answer='".$ans."',first_name='".$fname."',last_name='".$lname."',gender='".$gender."' WHERE email_address='".$id."'" ;
mysql_query($sql,$con);

}

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
 
  $sql="select * from Users where email_address='".$id."'";
  $rs_result = mysql_query ($sql,$con); 
   ?>
   <form id="form1" action="myInfo.php?save=yes" method="post">
   
   <table>
	<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            
			<tr>
			<td>Phone Number</td>
             <td><input type="text" name='phno' value='<?php
             echo $row["phone_number"];
             ?>' />
         	</td>
		
         
			
			</tr>
			
			<tr>
			<td>Security Question</td>
             <td><input type="text" name='ques' value='<?php
             echo $row["question"];
             ?>' />
         	</td>
		
           
			
			</tr>
			
			<tr>
			<td>Answer</td>
             <td><input type="text" name='ans' value='<?php
             echo $row["answer"];
             ?>' />
         	</td>
		
          
			
			</tr>
			<tr>
			<td>First Name</td>
             <td><input type="text" name='fname' value='<?php
             echo $row["first_name"];
             ?>' />
         	</td>
		
         
			
			</tr>
			<tr>
			<td>Last Name</td>
             <td><input type="text" name='lname' value='<?php
             echo $row["last_name"];
             ?>' />
         	</td>
		
           
			
			</tr>
			<tr>
			<td>Gender</td>
             <td><input type="text" name='gender' value='<?php
             echo $row["gender"];
             ?>' />
         	</td>
		
          
			</tr>
			
			
			
<?php 
}; 
?> 
</table>

<input type="Submit" value="Save"/>
	</form>
       
  
   
<section>
  
</section>
</article>
  
  <footer>
    <p> </p>
  </footer>
  </body>
  </html>
  
  