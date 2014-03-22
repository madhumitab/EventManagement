<?php
include 'setSession.php';
?>
<html>
<body>
<?php
session_start();
$dbHost = "silo.cs.indiana.edu";
$dbUserAndName = "b561f13_ggomatom";
$dbPass = "my+sql=b561f13_ggomatom";

mysql_connect ($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");
mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");;



         $email_address=$_SESSION['id']; 

$name=$_POST["name"];
$cat=$_POST["category"];
$des=$_POST["Description"];
mysql_query("INSERT INTO Groups(owner,name, category,description,number_member)VALUES('$email_address','$name','$cat','$des','0')");
mysql_query("INSERT INTO search(title,body)VALUES('$_POST[name]','$_POST[Description]')");

?>
<script type="text/javascript"> 
 
 	 alert("You are the owner of this group. "); 
    history.back(); 
</script> 


