<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup Page</title>
<link href="css/style_sheet.css" rel="stylesheet" type="text/css">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/formvalidation.js"></script>
</head>
<body>
<body>
<div class="container">
<header> <h1 align="center">Event Management </h1>
<p>&nbsp; </p>
</header>
<?php
                $con = mysqli_connect("silo.cs.indiana.edu", "b561f13_ggomatom", "my+sql=b561f13_ggomatom", "b561f13_ggomatom");

                if (mysqli_connect_errno()) {

                        echo "Failed to connect to MySQL: " . mysqli_connect_error();

                }

                if (isset($_POST['submit'])) {

                        $fname = mysqli_real_escape_string($con, trim($_POST['fname']));

                        $lname  = mysqli_real_escape_string($con, trim($_POST['lname']));

                        $id = mysqli_real_escape_string($con, trim($_POST['id']));

                        $pnumber = mysqli_real_escape_string($con, trim($_POST['pnumber']));

                        $password1 = mysqli_real_escape_string($con, trim($_POST['password1']));

                        $password2 = mysqli_real_escape_string($con, trim($_POST['password2']));

                        $question = mysqli_real_escape_string($con, trim($_POST['question']));

                        $answer = mysqli_real_escape_string($con, trim($_POST['answer']));
                        $gender =mysqli_real_escape_string($con, trim($_POST['gender']));
                        //$password1=sha1($password_1);
                        //$password2=sha1($password_2);

                        if($password1 != $password2)
                        {
                        echo '<p>Passwords donot Match</p>';
                        }
                        if (!empty($id) && !empty($password1) && !empty($password2) && ($password1 == $password2))
                        {
                                if(strlen($password1)<6)
                                {
                      echo '<p>Passwords length should be at least 6</p>';

                                }
                                else{
                                        $query = "SELECT * FROM Users WHERE id = '$id'";

                                        $data = mysqli_query($con, $query);
        //                     echo $data;

                                        if (mysqli_num_rows($data) == 0) {

                                        $query = "INSERT INTO Users (email_address, phone_number, password, question, answer, first_name, last_name, gender) VALUES ('$i
d', '$pnumber', '$password1','$question', '$answer', '$fname', '$lname', '$gender')";

                                if($res=mysqli_query($con, $query))
                                                        echo '<p>Your new account has been successfully created. You\'re now ready to <a href="./index.php">log in</a>.<
/p>';
                                   else
                                                        echo '<p class="error">An account already exists for this id. Please use a different address.</p>';

                                        $id = "";


                                        }
                       }
                        }
                     else {

                                        echo '<p class="error">Password fields can not be null.</p>';

                                        $id = "";

                                }



                }

?>
<article class="content1">

<form id="form1" name="form1" method = "post" action = "./signup.php">

<h2 align = "center"> Sign Up </h2>


<p align = "center"> First Name:

	<input name = "fname" id="name" type = "text" value = "<?php if (!empty($fname)) echo $fname; ?>">

</p>

<p align = "center"> Last Name:

	<input name = "lname" id="lname" type = "text" value = "<?php if (!empty($lname)) echo $lname; ?>">

</p>
<p align="center"> Gender:

<select name="gender">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>

</p>

<p align = "center"> Email Address:

	<input name = "id" id="email" type = "text" value = "<?php if (!empty($id)) echo $id; ?>">

</p>

<p align = "center"> Password:

	<input name = "password1" type = "password">

</p>

<p align = "center"> Repeat Password:

	<input name = "password2" type = "password">

</p>

<p align = "center"> Phone Number:

	<input name = "pnumber" id="phone" type = "text" value = "<?php if (!empty($pnumber)) echo $pnumber; ?>">

</p>

<p align = "center"> Security Question:

	<input name = "question" id="question" type = "text" value = "<?php if (!empty($question)) echo $question; ?>">

</p>

<p align = "center"> Answer:

	<input name = "answer" id="answer" type = "text" value = "<?php if (!empty($qanswer)) echo $qanswer; ?>">

</p>

<p>&nbsp; </p>



<p align="center">

    <input type = "submit" name = "submit" value = "Sign up">&nbsp;&nbsp;&nbsp;

</p>

</form>



  <p align="center"> Click here to go back to <a href="./index.php"> login page</a></p>
</article>
 

  <!-- end .container --></div>

</body>

</html>
