<?php   
session_start(); //to ensure you are using same session
var_dump($_SESSION); 
$a =& $_SESSION; 
unset($_SESSION); 
session_destroy(); //destroy the session
header("location:./index.php"); //to redirect back to "index.php" after logging out
exit();
?>