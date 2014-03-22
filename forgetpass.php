
<?php 
	$Err = "";
	$email = "";

	if (isset($_POST['submit'])) {
		$con = mysqli_connect("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");
		$email = mysqli_real_escape_string($con, trim($_POST["email"]));
		$query = "SELECT * FROM Users WHERE email_address = '$email'";
		$data = mysqli_query($con, $query);
		if (mysqli_num_rows($data) == 1) {
			$row = mysqli_fetch_array($data);
			$question = $row['question'];
			header("Location: ./checkanswer.php?email=$email&question=$question");
		}
		else {
			$Err = "You must enter an valid registered email to retrive your password.";
		}
	}
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


<h2 align = "center"> Forget Your Password </h2>

<p>&nbsp; </p>

<p> Please enter you registered email address:</p>

<form  id="form1" name="form1" method = "post" action = "./forgetpass.php">

<p align = "center"> Username(Email):

	<input name = "email" id="email" type = "text" value = "<?php echo $email;?>" >
	<span class="error">* <?php echo $Err;?></span>
</p>

<p>&nbsp; </p>

<p align="center">

	<input type = "submit" name = "submit" value = "submit">&nbsp;&nbsp;&nbsp;

</form>
  <p align="center"> Click here to go back to <a href="./index.php"> login page</a></p>
</article>

  

  <footer>

    <p></p>

  </footer>

  <!-- end .container --></div>

</body>

</html>

