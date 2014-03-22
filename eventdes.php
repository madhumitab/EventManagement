<?php
include 'setSession.php';
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
  <div class="sidebar2">
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

  <article class="content1">

<?php

$dbHost = "silo.cs.indiana.edu";
$dbUserAndName = "b561f13_ggomatom";
$dbPass = "my+sql=b561f13_ggomatom";

$_TABLE_NAME = "Events";
$_EVENT_ID = "eid";
$_EVENT_NAME = "name";
$_UPPER_LIMIT = "upperlimit";
$_LOWER_LIMIT = "lowerlimit";
$_START_TIME = "start_time";
$_END_TIME = "end_time";
$_CATEGORY = "category";
$_OWNER = "owner";
$_DES="description";
$_nreg="number_register_users";

mysql_connect ($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");
mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");;

$eventID=$_GET['eid'];		
$query = "select * from Events where eid='$eventID'";
$result = mysql_query ($query);

	$info = mysql_fetch_array( $result );


	$eventID = $info[$_EVENT_ID];
	$eventName = $info[$_EVENT_NAME];
	$ulimit = $info[$_UPPER_LIMIT];
	$llimit = $info[$_LOWER_LIMIT];
	$sdate =  $info[$_START_TIME];
	$edate =  $info[$_END_TIME];
	$category =  $info[$_CATEGORY];
	$owner =  $info[$_OWNER];
	$des =  $info[$_DES];
	$nreg =  $info[$_nreg];


mysql_close($con);
		
?>

    <h2 align="center"> Event Name :<?php echo "$eventName"; ?></h2>
<div class="pagestatic">
<p>&nbsp;</p>
<p style="size:100;color:red;margin-left:20px;"> The event gets kicked off at <?php echo "$sdate"; ?> </p>                                 
     <p> Category : <?php echo "$category"; ?> </p>
<h3 style="color:blue;margin-left:20px;"> Event Details: </h3>
<p> <?php echo "Event Date: $sdate"; ?> </p>

<p><?php echo "Start Date $sdate "; ?> </p>
<p><?php echo "End Date $edate "; ?> </p>
<p>Event Description :<?php echo "$des"; ?>
<p>Posted by : <a href="#"> <?php echo "$owner"; ?></a></p>
   <P> NUMBER OF PEOPLE REGISTERED : <?php echo "$nreg"; ?></P>
   </p> 
   <p> <a href="register.php?eid=<?php echo $eventID?>"> <input name="" type="button" value="REGISTER"> </p></a>

</div>

<div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/default/skin.css" />
 <script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={  };} (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&opts=470&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>

  </article>
  
  <footer>
    <p>&nbsp;</p>
  </footer>
  <!-- end .container --></div>
</body>
</html>
