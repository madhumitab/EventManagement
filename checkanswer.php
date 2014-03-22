
<?php
	$opt = 0;
	$email = "";
	$answerErr = "";
	$question = "";
	$passwordErr = "";
	if (isset($_POST['submit'])) {
		$con = mysqli_connect("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();	
		}
		$email = mysqli_real_escape_string($con, trim($_GET["email"]));
		$answer = mysqli_real_escape_string($con, trim($_POST["answer"]));
		$question = $_GET["question"];
		$query = "SELECT * FROM Users WHERE email_address = '$email' AND answer = '$answer'";
		$data = mysqli_query($con, $query);

		if (mysqli_num_rows($data) == 1) {
			$opt = 3;
		}
		else {
			$answerErr = "You answer is not correct!";
			$opt = 2;
		}
	}

	else if (isset($_GET['question'])) {
			$opt = 2;
			$question = $_GET['question'];
			$email = $_GET['email'];
	}

	else if (isset($_POST['pass'])) {
		$email = $_GET['email'];
		$con = mysqli_connect("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();	
		}
		$password1 = $_POST['password'];
		$password2 = $_POST['repassword'];
		if ($password1 == $password2) {
			$query = "UPDATE Users SET password = '$password1' WHERE email_address = '$email'";
			mysqli_query($con, $query);
			$opt = 4;
		}
		else {
			$passwordErr = "Two passwords are not match!";
			$opt = 3;
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

	<?php
		if ($opt == 0) {
			header("Location: ./index.php");
		}
		else if ($opt == 2) {
			echo "Please answer the following question:" . $question;
		?>
			<form method = "POST" action = "./checkanswer.php?email=<?php echo $email;?>&question=<?php echo $question;?>">
				<p>Answer: <input type = "text" name = "answer"> <span class="error">* <?php echo $answerErr;?></span></p>
				<p><input type = "submit" value = "Enter" name = "submit"></p>
			</form>
		<?php
		}
		else if ($opt == 3) {
			echo "Please reset your password:";
		?>

			<form method = "POST" action = "./checkanswer.php?email=<?php echo $email;?>">
				<p> Password: <input type = "password" name = "password"></p>
				<p> Repeat Password: <input type = "password" name = "repassword"> <span class="error">* <?php echo $passwordErr;?></span></p>
				<p><input type = "submit" name = "pass" value = "Submit"></p>
			</form>
		<?php
		}
		else if ($opt == 4){
			echo "Your password is reset, please sign in again " . "<a href = './index.php'>Sign In</a>";
		}
		?>

</div>
	</body>
</html>

