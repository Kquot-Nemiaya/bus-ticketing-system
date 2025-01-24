<?php
session_start();
include('db_conn.php');
$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }

    // Check if email is already in use
    $stmt = $conn->prepare('SELECT COUNT(*) FROM users WHERE Email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($emailCount);
    $stmt->fetch();
    if ($emailCount > 0) {
        $errors[] = 'Email is already in use. Please choose a different email address';
    }
    $stmt->close();
// Validate password
if (strlen($password) < 6) {
  $errors[] = 'Password should be at least 6 characters long';
} elseif ($password != $confirmPassword) {
  $errors[] = 'Passwords do not match';
}

// If no errors, insert user into database
if (empty($errors)) {
  $stmt = $conn->prepare('INSERT INTO users (Email,username, password) VALUES (?, ?, ?)');
        $stmt->bind_param('sss',  $email,$username, $password);
        if ($stmt->execute()) {
			$errors[] = 'Account created successfully';

            header('Location: login.php');
            exit;
        } else {
            $errors[] = 'Error inserting user into database. Please try again later';
        }
        $stmt->close();
    }
}
?>
<HTML>
<HEAD>
<TITLE>Registration</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</HEAD>
<style>
		body{
        background-image:url("images/bsimg.png");
        background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
    }
.sign-up-container{
  background-image: linear-gradient(to right,  #000080 , #0000FF);
}
.form-label{
color:white !important;
}
#signup-btn{
	color:white;
	font-weight:bold;
	background: #343a40;
}
</style>
<BODY>
	
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="login.php" style="color:white">login</a>
			</div>
			
					<div class="signup-heading" style="color:white">Registration</div>
					<form method="post">
                <div class="form-group" style="color:white;">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group" style="color:white;">
                  <label for="username">Username</label>
				  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-group" style="color:white;">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label for="confirm-password" style="color:white;">Confirm Password</label>
              <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
   
					
				</form>
			</div>
		</div>
	</div>
	
		

</BODY>
</HTML>
