<?php
session_start();
include('db_conn.php');

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $date = $_POST["date"];
  $departure = $_POST["departure"];
  $arrival = $_POST["arrival"];
  $seat = $_POST["seat"];
  $gender = $_POST["gender"];
  


  $stmt = $conn->prepare("INSERT INTO booked (name,phone, email, date,departure,arrival,seat,gender) VALUES (?, ?, ?,?,?,?,?,?)");
  $stmt->bind_param("ssssssss", $name,$phone, $email, $date,$departure,$arrival,$seat,$gender);
  $stmt->execute();

  if($stmt->affected_rows > 0) {
      
      $_SESSION['message'] = "You have book successfully";
      header("Location: book.php");
      exit;
  }
  else {
      
      $_SESSION['message'] = " not book";
      header("Location: book.php");
      exit;
  }
}
?>
<HTML>
<HEAD>
<TITLE>Booking</TITLE>
<link href="book.css" type="text/css"
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
				<a href="home.php" style="color:white">Back</a>
			</div>
			
					<div class="signup-heading" style="color:white">Passenger Information</div>
          <?php include('message.php');  ?>
          <form class="row g-3" action="" method="post">
  <div class="col-md-6">
    <label for="name" class="form-label">Name</label>
    <input type="name" class="form-control" name="name">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="col-md-6">
    <label for="gender" class="form-label">Gender</label><br>
    <select class="form-select" aria-label="Default select example" name="gender">
  
  <option value="male">male</option>
  <option value="female">female</option>
</select>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">From</label>
    <input type="text" class="form-control" name="departure">
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">To</label>
    <input type="text" class="form-control" name="arrival">
  </div>
  
  
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Date</label>
    <input type="date" class="form-control" name="date">
  </div>
  
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Seat</label>
    <input type="number" class="form-control" name="seat">
  </div>
  <br>
  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">Book</button>
  </div>
</form>
				
			</div>
		</div>
	</div>
	
		

</BODY>
</HTML>



