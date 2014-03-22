<?php
// Inialize session
include "db.php";
session_start();
if (!isset($_SESSION['id'])) {

if(isset($_POST['submit']))
{
$con=mysql_connect($dbHost, $dbUserAndName, $dbPass) or die ("Cannot connect to host $dbHost with user $dbUserAndName and the password provided.");

$db_selected=mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");

if (!$db_selected) {
    die ('Can\'t select database : ' . mysql_error());
}

$user=$_POST['id'];
$pwd=mysql_real_escape_string($_POST['password']);
//echo $pwd;
//$pwd=sha1($pwd1);
//echo $pwd;
$login = mysql_query("SELECT * FROM Users WHERE email_address='$user'  and password ='$pwd'");

// Check username and password match
if (mysql_num_rows($login) == 1){ 
// Set username session variable
$_SESSION['id'] = $user;
$flag=1;
// Jump to secured page
header('Location: ./eventHomePage.php');
}
else {
// Jump to login page
$Err = 'Sorry, id and password not match, please sign in again.';
//header('Location: index.php');
}
}
} 
      mysqli_close($con);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Event Management System Login Page</title>
<link href="css/style_sheet.css" rel="stylesheet" type="text/css">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/formvalidation.js"></script>
</head>
<body>
<div class="container">
<header> <h1 align="center">Event Management </h1>
<p>&nbsp; </p>
</header>
<article class="content">
<h2 align = "center"> Please Sign In to View the Website </h2>
<p>&nbsp; </p>
 <form id="form1" name="form1" method="post" action = "./index.php">
<p align = "center"> Username(Email):

	<input name ="id" id="email" type = "text">

</p>

<p align = "center"> Password:

	<input name ="password" id="password" type = "password">

</p>

<p>&nbsp; </p>
<p align="center">

	<input type = "submit" name ="submit" value = "Sign In">&nbsp;&nbsp;&nbsp;

    <a href="signup.php">Sign Up</a>&nbsp;&nbsp;&nbsp;

    <a href="forgetpass.php">Forget Password?</a>

<?php

 if(isset($_POST['submit']))
{
      if($flag==0){

        ?>
        <p style="color:red;">Incorrect email adresss/ password </p>
        <?php
      }

 }   
?>
</p>

</form>
</article>
  <footer>
    <p>@Indiana Univ </p>
  </footer>
</div>
</body>
</html>

