<?php 
session_start(); 
include "db_conn.php";

$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if email and password match
    $stmt = $conn->prepare('SELECT username FROM users WHERE Email= ? AND password = ?');
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($username);
        $stmt->fetch();
        session_start();
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit;
    } else {
        $errors[] = 'Invalid email or password';
    }
    $stmt->close();
}
?>

		
<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Login</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
	body{
        background-image:url("images/bsimg.png");
        background-position: center;
  background-repeat: no-repeat; 
  background-size: cover; 
    }
.sign-up-container{
  background-image: linear-gradient(to right, #000080 , #0000FF);
}
.form-label{
color:white !important;
}
#login-btn{
	color:white;
	font-weight:bold;
	background: #343a40;
}
</style>
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="user-registration.php" style="color:white;">Sign up</a>
			</div>
			<div class="signup-align">
				
				
					<div class="signup-heading"  style="color:white;">Login</div>
					<form method="post">
                <div class="form-group" style="color:white;">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group" style="color:white;">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
				
				
			</div>
		</div>
				</div>
</BODY>
</HTML>
