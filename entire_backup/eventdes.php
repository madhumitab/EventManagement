<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="css/style_sheet.css"  type="text/css" rel="stylesheet">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>

<div class="container">
  <header> <h1 align="center">Event Management </h1>
  <div align="right">
   <a href="eventHomePage.php">Home</a>|<a href="eventpostingpage.php">Post Event</a>|<a href="myaccount.php">Myaccount</a></h6>|Logout</h6></div> 
   <div align="right">Search <input type="search"/> |Advanced Search</div>
  </header>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="http://www.cs.indiana.edu/cgi-pub/ggomatom/eventHomePage.php?cat=sports">Sports</a></li>
      <li><a href="http://www.cs.indiana.edu/cgi-pub/ggomatom/eventHomePage.php?cat=concerts">Concerts</a></li>
      <li><a href="http://www.cs.indiana.edu/cgi-pub/ggomatom/eventHomePage.php?cat=outdoor">Outdoor</a></li>
      <li><a href="http://www.cs.indiana.edu/cgi-pub/ggomatom/eventHomePage.php?cat=party">Parties</a></li>
    </ul>
 
  <!-- end .sidebar1 --></div>
  <article class="content">

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
		
?>

    <h2 align="center"><?php echo "$eventName"; ?></h2>
  <p style="color:blue;margin-left:20px;"> <?php echo "Event Date: $sdate : Category :$category"; ?> event </p>
<p>&nbsp;</p>
<h3>DESCRIPTION</h3>
 <h4>Dates:</h4> 
<p><?php echo "From $sdate to $edate"; ?></p>
<h4>
Overview
</h4><p><?php echo "$des"; ?>
   <h4>OWNER : <a href="#"> <?php echo "$owner"; ?></a></h4>
   <P> NUMBER OF PEOPLE REGISTERED : <?php echo "$nreg"; ?></P>
   </p> <input name="" type="button" value="REGISTER"> 
      <section>
    
      <!-- begin htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/default/skin.css" />
 <script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={  };} (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&opts=470&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end htmlcommentbox.com -->
</section>

  <!-- end .content --></article>
  
  <footer>
    <p>&nbsp;</p>
  </footer>
  <!-- end .container --></div>
</body>
</html>
