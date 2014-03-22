<?php
session_start();
// store session data
$_SESSION['id']="ggomatom@indiana.edu";
?>

<!doctype html>
<html>
<head>
<title>Event Post Page</title>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Event Posting Page</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="css/style_sheet.css" rel="stylesheet" type="text/css">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/formvalidation.js"></script>

</head>
<body>
<form action="eventHomePage.php">
<input type="submit" size="15" name="Submit" id="Submit" value="login">
</form>
</body>