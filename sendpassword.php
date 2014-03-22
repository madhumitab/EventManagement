<?php 
	$Err = "";

	if (isset($_POST['submit'])) {
			$con = mysqli_connect("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$email = mysqli_real_escape_string($con, trim($_POST["email"]));

			if (!empty($email)) {
				$query = "SELECT password FROM Users WHERE email_address = '$email'";
				$data = mysqli_query($con, $query);

				if (mysqli_num_rows($data) == 1) {
						$row = mysqli_fetch_array($data);
						$password = $row['password'];
					  mail($email,"Event management system password", "The pass word for " . $email . " is " . $password);
						$Err =  "Mail Sent!";
				}
				else {
						$Err = "Your email dose not exist!";
				}
			}
			else {
				$Err = "You must enter an email to retrive your password.";
			}
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>
			Password Retrive
		</title>
	</head>

	<body>
		<?php echo '<p class="error">' . $Err . '</p>'; ?>i
	</body>
</html>
