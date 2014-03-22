<?php
include 'setSession.php';
?>
<?php
session_start();
//http://forums.phpfreaks.com/topic/202357-why-alert-not-execute-if-i-use-before-header/
function goto_page()
{
        if(true){
			?>
			<script language="JavaScript1.2" type="text/javascript">
				alert("Event Posted Successfully");
				window.location = "http://www.cs.indiana.edu/cgi-pub/ggomatom/eventHomePage.php";
			</script>
			<?php
	        
           }
}

include "db.php";

$con=mysql_connect ($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");

$db_selected=mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");

if (!$db_selected) {
    die ('Can\'t select database : ' . mysql_error());
}

$sql="INSERT INTO Events(name,upperlimit,lowerlimit,category,owner,start_time,end_time,description,number_register_users) values('$_POST[EventName]','$_POST[UpperLimit]','$_POST[LowerLimit]','$_POST[category]','$_SESSION[id]','$_POST[startdate]','$_POST[enddate]','$_POST[Description]','0')";
mysql_query("INSERT INTO search(title,body)VALUES('$_POST[EventName]','$_POST[Description]')");

$sqlres=mysql_query($sql,$con);

  if (!$sqlres){
                return mysql_error();
        }
goto_page();
mysqli_close($con);


?>
