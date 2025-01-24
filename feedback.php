
<?php
session_start();
 include('db_conn.php');

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);
  $stmt->execute();

  if($stmt->affected_rows > 0) {
      session_start();
      $_SESSION['message'] = "Feedback sent successfully";
      header("Location: index.php");
      exit(0);
  }
  else {
      session_start();
      $_SESSION['message'] = "Feedback not sent";
      header("Location: index.php");
      exit(0);
  }
} 
?>









