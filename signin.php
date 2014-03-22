
<?php
	session_start();
	$Err = "";
	if (!isset($_SESSION['id'])) {
		$id = $password = "";
            $mysqli = new mysqli("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");

	//	$con = mysqli_connect("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		
		if (isset($_POST['submit'])) {
			$id = mysqli_real_escape_string($mysqli, trim($_POST["id"]));
			$password = mysqli_real_escape_string($mysqli, trim($_POST["password"]));
		if (!empty($id) && !empty($password)) {
			$preparedStatement = $mysqli->prepare('SELECT email_address, password FROM Users WHERE email_address =? AND password = ?');
			$preparedStatement->bind_param('s', $id);
            $preparedStatement->bind_param('pwd',$password);			
			
			$preparedStatement->execute();

			$data = $preparedStatement->get_result();
			//$data = mysqli_query($con, $query);

			if (mysqli_num_rows($data) == 1) {

				$row = mysqli_fetch_array($data);

				$_SESSION['id'] = $row['email_address'];

				setcookie('id', $row['email_address'], time() + (60 * 60 * 24 * 30));

				$home_url = 'index.php';

				header('Location: ' . $home_url);

			}

			else {

				$Err = 'Sorry, id and password not match, please sign in again.';

			}

		}

		else {

				//$Err = 'Sorry, you must enter your id and password to log in.';

		}
		}
    $mysqli->close();
	}
?>

<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Event Management System</title>
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
<?php
	if(empty($_SESSION['id'])) {

			echo '<p class="error">' . $Err . '</p>';
?>
<form method = "post" action = "./eventHomePage.php">
<p align = "center"> Username(Email):

	<input name = "id" type = "text" value = "<?php echo $id;?>">

</p>

<p align = "center"> Password:

	<input name = "password" type = "text">

</p>

<p>&nbsp; </p>
<p align="center">

	<input type = "submit" name = "submit" value = "Sign In">&nbsp;&nbsp;&nbsp;

    <a href="signup.php">Sign Up</a>&nbsp;&nbsp;&nbsp;

    <a href="forgetpass.html">Forget Password?</a>

</p>

</form>
<?php

	}

	else {

		echo('<p class="login">You are logged in as ' . $_SESSION['id'] . '.</p>');

	}

?>
</article>
  <footer>
    <p>Footer </p>
  </footer>
  <!-- end .container --></div>
</body>
</html>

=======
<?php
	session_start();
	$Err = "";
	if (!isset($_SESSION['id'])) {
		$id = $password = "";
            $mysqli = new mysqli("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");

	//	$con = mysqli_connect("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		
		if (isset($_POST['submit'])) {
			$id = mysqli_real_escape_string($con, trim($_POST["id"]));
			$password = addslashes(mysqli_real_escape_string($con, trim($_POST["password"])));
            $password = htmlentities($password);
			echo $password;
		}	
		if (!empty($id) && !empty($password)) {
			$preparedStatement = $mysqli->prepare('SELECT email_address, password FROM Users WHERE email_address =? AND password = ?');
			$preparedStatement->bind_param('s', $id);
            $preparedStatement->bind_param('pwd',$password);			
			
			$preparedStatement->execute();

			$data = $preparedStatement->get_result();
			//$data = mysqli_query($con, $query);

			if (mysqli_num_rows($data) == 1) {

				$row = mysqli_fetch_array($data);

				$_SESSION['id'] = $row['email_address'];

				setcookie('id', $row['email_address'], time() + (60 * 60 * 24 * 30));

				$home_url = 'index.php';

				header('Location: ' . $home_url);

			}

			else {

				$Err = 'Sorry, id and password not match, please sign in again.';

			}

		}

		else {

				//$Err = 'Sorry, you must enter your id and password to log in.';

		}
    $mysqli->close();
	}
?>

<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Event Management System</title>
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
<?php
	if(empty($_SESSION['id'])) {

			echo '<p class="error">' . $Err . '</p>';
?>
<form method = "post" action = "./eventHomePage.php">
<p align = "center"> Username(Email):

	<input name = "id" type = "text" value = "<?php echo $id;?>">

</p>

<p align = "center"> Password:

	<input name = "password" type = "text">

</p>

<p>&nbsp; </p>
<p align="center">

	<input type = "submit" name = "submit" value = "Sign In">&nbsp;&nbsp;&nbsp;

    <a href="signup.php">Sign Up</a>&nbsp;&nbsp;&nbsp;

    <a href="forgetpass.php">Forget Password?</a>

</p>

</form>
<?php

	}

	else {

		echo('<p class="login">You are logged in as ' . $_SESSION['id'] . '.</p>');

	}

?>
</article>
  <footer>
    <p>Footer </p>
  </footer>
  <!-- end .container --></div>
</body>
</html>

