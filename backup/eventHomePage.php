
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
<title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/style_sheet.css" rel="stylesheet" type="text/css">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>
<body>
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
<div class="container">

  <header> <h1 align="center">Event Management </h1>
  <div align="right">
    
    Post Event|Myaccount</h6>|Logout</h6></div> 
   <div align="right">Search <input type="search"/> |Advanced Search</div>
  </header>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="#">Sports</a></li>
      <li><a href="#">Concerts</a></li>
      <li><a href="#">Outdoor</a></li>
      <li><a href="#">Parties</a></li>
    </ul>
    <aside>
      
</aside>
  <!-- end .sidebar1 --></div>
  <article class="content">
   

</form>
	<?php 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 5; 
$sql = "SELECT name FROM Events ORDER BY name ASC LIMIT $start_from, 5"; 
$rs_result = mysql_query ($sql,$con); 
?> 
<table>
<tr><td><b>Events:</b></td></tr>
<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><? echo $row["name"]; ?></td></tr>
			<tr><td><input type="submit" name="drop" id="drop" value="Register">
			
			</tr>
			
			
			
<?php 
}; 
?> 
</table>
    
   
    <p>&nbsp;</p>
    <section>
      <h2>&nbsp;</h2>
</section>
    <section>
      <h2>&nbsp;</h2>
</section>
  <!-- end .content --></article>
    
  <footer>
  <?php  
$sql="SELECT COUNT(name) from Events";

$rs_result = mysql_query($sql);
$row = mysql_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / 5);  
$pagLink = "<div class='pagination pagination-right' >"; 
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='eventHomePage.php?page=".$i."'>&nbsp;" .$i. "&nbsp;</a>";  
};  
echo $pagLink . "</div>"; 
?> 
 
 </footer>
  <!-- end .container --></div></div>
  
</body>
</html>
