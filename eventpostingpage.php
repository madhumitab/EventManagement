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

  ?><!doctype html>
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
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/formvalidation.js"></script>

</head>

<body>

 

	
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

 <?php

if(isset($_POST['Submit']))
{
$sql="INSERT INTO Events(name,upperlimit,lowerlimit,category,owner,start_time,end_time,description,number_register_users) values('$_POST[EventName]','$_POST[UpperLimit]','$_POST[LowerLimit]','$_POST[category]','$_SESSION[id]','$_POST[startdate]','$_POST[enddate]','$_POST[Description]','0')";

$sql1="INSERT INTO search(title,body)VALUES('$_POST[EventName]','$_POST[Description]')";

$sqlres=mysql_query($sql,$con);
$sqlres1=mysql_query($sql1,$con);

  if (!$sqlres){
  return mysql_error();
echo "Server error please try posting again later.";        
}
 else{
 echo "Event Posted Successfully";


 }
 }
?>

  <article class="content" >  
    <form id="form1" name="form1" method="post" action="./eventpostingpage.php">
   <p align="left">Event Name :
     <input name="EventName" type="text" id="name" class="form-control">
   </p>
     <label for="UpperLimit"></label>
    <p align="left"> Upper Limit : 
        <input type="text" name="UpperLimit" id="ulimit" class="form-control" ></p>
    <p align="left">LowerLimit : <input type="text" id="llimit" name="LowerLimit">    </p>
    <p align="left">Start Date : <input type="datetime-local" id="date1" name="startdate">
    </p>
      <p align="left">End Date : <input type="datetime-local" id="date2" name="enddate">
    </p>
    <p align="left">  Description   :   
      <label for="Description" class="required"></label>
      <textarea name="Description" id="Description"></textarea>
  </p>
     <p align="left">  Category   :   
      <label name="category"></label>
    <select name="category" id="category" class=""required">
  <option value="Sports">Sports</option>
  <option value="Parties">Parties</option>
  <option value="concerts">concerts</option>
  <option value="outdoor">outdoor</option>
</select>
  </p>
  
    <p>&nbsp;</p>
    <p align="center">
      <input type="submit" size="15" name="Submit" id="Submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;

    </p>
   </form>

<section>
  
</section>
</article>
  
  <footer>
    <p>Footer </p>
  </footer>
  <!-- end .container --></div>
</body>
</html>
