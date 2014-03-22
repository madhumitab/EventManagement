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
   <p align="center" style="font-size:26px"><b><u>Advanced Search</u></b></p>
   <form name="form1" method="post">
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


 	 $query = mysql_query("select Distinct owner from Events"); // Run your query
 	echo "<p><input type='checkbox' name='check_list[]' value='1'>";
        echo "   Owners :";

	echo "<select name='owner'>";
	while ($row = mysql_fetch_array($query)) 
	{
    echo "<option value='" . $row['owner'] ."'>" . $row['owner'] ."</option>";
	}	
	echo "</select></p>";
	

		 $query1 = mysql_query("select name from Categories"); // Run your query
		echo "<p><input type='checkbox' name='check_list[]' value='2'>";
                    echo " Categories :";
	echo "<select name='category'>";
	while ($row1 = mysql_fetch_array($query1)) 
	{
    echo "<option value='" . $row1['name'] ."'>" . $row1['name'] ."</option>";
	}	
	echo "</select></p>";
	
function get_option($sdate) {
   $defaults = array(
      'Start' => '2013-11-01 00:00:00',
      'End' => '2013-11-01 00:00:00'
      
      );
   // get the value from the $defaults array
   $val = $defaults[$sdate];

   // but if the same value has already been posted - replace the default one
   if (isset($_POST[$sdate])) {
      $val = $_POST[$sdate];
   }
   return $val;
}

	$default = get_option('Start');
	$default1 = get_option('End');

?>
 <p><input type="checkbox" name="check_list[]" value="3"> 
  Start Date: <input type="text" name="Start" value="<?php echo $default; ?>"></p>
  <p><input type="checkbox" name="check_list[]" value="4">
  
  End Date: <input type="text" name="End" value="<?php echo $default1; ?>"></p>
<p>  <input type="checkbox" name="check_list[]" value="5">
  No of Registered Users: <input type="text" name="noUser"></p>
  <input type="submit" name="submit">
</form> 
  <?php 

	if(isset($_POST['submit'])){  


$count=0;
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
    	
            if($check==1)
            {
            	$count++;
            }
              if($check==2)
            {
            $count++;	
            }
              if($check==3)
            {
            	$count++;
            }
              if($check==4)
            {
            	$count++;
            }
              if($check==5)
            {
            	$count++;
            }
    

    }
}
	  		$Owner=$_POST['owner'];
	  		$Category=$_POST['category']; 
	  		$Start=$_POST['Start']; 
	  		$End=$_POST['End']; 
	  		$noUser=$_POST['noUser'];

switch($count)
{
    case 1:
       $sql= "SELECT * FROM Events WHERE owner='$Owner'"; 
        break;
    case 2:
       	$sql= "SELECT * FROM Events WHERE owner='$Owner' and category='$Category'"; 
        break;
    case 3:
        $sql= "SELECT * FROM Events WHERE owner='$Owner' and category='$Category' and start_time>='$Start'"; 
        break;
    case 4:
        $sql= "SELECT * FROM Events WHERE owner='$Owner' and category='$Category' and start_time>='$Start' and end_time<='$End'"; 
        break;
    case 5:
        $sql= "SELECT * FROM Events WHERE owner='$Owner' and category='$Category' and start_time>='$Start' and end_time<='$End' and number_register_users>='$noUser'"; 
        break;
    DEFAULT:
        echo "Please select atleast one option ";
}


     
  
 			  	
	  		
	  		
	  		$result=mysql_query($sql);
	  		echo "SEARCH RESULT GIVES FOLLOWING EVENTS: \n";
	          echo "";
	         
	  		while($row=mysql_fetch_array($result))
	  		{ 
	          $EName  =$row[$_EVENT_NAME]; 
	          $eid= $row[$_EVENT_ID ];
	          $Description=$row[$_DES]; 
	          $StartTime=$row[$_START_TIME];
	          $EndTime=$row[$_END_TIME]; 
	 		 //-display the result of the array 


	 		 echo "<br>"; 
			 echo "<li><a href='eventdes.php?eid=".$eid."'>" . $EName . "</a> <br> "; 
			 echo "Description :". $Description .  "<br>"; 
	 		 echo "Start time of event : " . $StartTime . "<br>"; 
	 		 echo "  End time of event : " . $EndTime .  "</li><br>"; 
			  
                        
        	}
        
        }
        ?>
   
          
	 
	  
		

<section>
  
</section>
  <!-- end .content --></article>
  
  <footer>
    
  </footer>
  <!-- end .container --></div>
</body>
</html>
