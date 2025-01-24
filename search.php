<?php
session_start();
include('db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>search</title>
    <style>
    body{
        background-image:url("images/bsimg.png");
        background-position: cover; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
    }
</style>
</head>
<body>



<div class="card text-center">
<div class="container">
  <h2>Choose Your Departure Time</h2>
</div>
  <div class="card-body bg-info">
<div class="container my-5">
<table class="table">
  <?php
  if(isset($_POST['submit'])){
    $departure=$_POST['departure'];
    $arrival=$_POST['arrival'];
    $date=$_POST['date'];

    $sql="SELECT * FROM routes WHERE departure LIKE '%$departure%' OR arrival LIKE '%$arrival%' OR date LIKE '%$date%'";
    $result=mysqli_query($conn,$sql);
    if($result){
      if(mysqli_num_rows($result)>0){
        echo'<thread>

          <tr>
          <th>Date</th>
          <th>Departure</th>
          <th>Departure time</th>
          <th>Arrival time</th>
          <th>Arrival</th>
          <th>seats</th>
          <th>fare</th>
          <th>Book</th>
           </tr>
        </thread>
        ';
       while($row=mysqli_fetch_assoc($result)){
        echo '<tbody>
        <tr>
        
        <td>'.$row['date'].'</td>
        <td>'.$row['departure'].'</td>
        <td>'.$row['departure_time'].'</td>
        <td>'.$row['arrival_time'].'</td>
        <td>'.$row['arrival'].'</td>
        <td>'.$row['seats'].'</td>
        <td>'.$row['fare'].'</td>
        <td>
        <a href="home.php" ><button  type="button" class="btn btn-primary" >Back</button></a>
        <a href="book.php"> <button  type="button" class="btn btn-primary" >Book</button></a>
        </td>        
        </tr>
        </tbody>';
       }
      }else{
        echo '<h2>Data not found </h2>';
      }
    }

  }
  ?>
</table>
</div>
  </div>
</div>

</body>
</html>
