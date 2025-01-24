<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Kq.css">

    <title>booking system</title>   
</head>

<body>

<nav class="navbar navbar-expand-lg bg-info navbar-info px-3">

  <div class="container">
    <a class="navbar-brand" href="#">Ｔ_Ｅˣᵖ </a>
    <button class="navbar-toggler"type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggle-icon"></span></button>
    
    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link " href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="contact.php">CONTACT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="adminlogin.php">ADMIN</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

<section>
 <img src="images/Travel_ease.jpeg" class="img-fluid">


  <div class="container ">

       <div class="text-box">
                <h1> Ｔｒａｖｅｌ＿Ｅａｓｅ Ｅｘｐｒｅｓｓ </h1>
                <p>"𝖩𝗈𝗎𝗋𝗇𝖾𝗒 𝗂𝗇 𝖢𝗈𝗆𝖿𝗈𝗋𝗍, 𝖠𝗋𝗋𝗂𝗏𝖾 𝗐𝗂𝗍𝗁 𝖤𝖺𝗌𝖾."</p>
                
           <a href="login.php" ><button" type="button" class="btn btn-primary" >Get Started</button></a>    
        </div>
  </div>

</section>

<section  class="p-3 mb-2 bg-info text-dark">
 
<?php include('message.php');  ?>


  <h2>Give your FeedBack</h2>
  
  <div class="form">
  <form action="feedback.php"  method="post">
    <div class="container-fluid"> 
       <label for="exampleFormControlInput1" class="form-label">Enter Your Name</label>
  <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Kuot"name="name"> 
    </div>
    <div>
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Kuotq@example.com" name="email">
</div>

<div class="container-fluid">
  <label for="exampleFormControlTextarea1" class="form-label">Enter Your Feed Back</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="message" placeholder="Your Message......."></textarea>
</div>
<br>
<div class="col-12">
    <button class="btn btn-primary text-center" type="submit" name="submit">Submit</button>
  </div>
  </form>
  </div>
</section>
<section class="p-5">
  <div class="container">
    <div class="row text-center">
      <div class="col-md">
      <h4 class="card-title mb-3">ABOUT US</h4>
      <p>Welcome to TravelEase Express! We are dedicated to providing comfortable and convenient travel experiences for all our passengers. 
        Our mission is to make every journey a pleasant and memorable one.</p>
            <p>At TravelEase Express, we prioritize safety, reliability, and customer satisfaction. 
              With a fleet of modern buses and a team of professional drivers, we ensure that you reach your destination smoothly and on time.</p>
            <p>Our services cater to various travel needs, whether it's daily commuting, long-distance travel, or special trips. 
              We continuously strive to improve our services and enhance the travel experience for our customers.</p>
            
            <h3>Our Mission</h3>
            <p>To provide safe, reliable, and comfortable travel solutions that meet the needs of our diverse customer base.</p>
            
            <h3>Our Vision</h3>
            <p>To be the leading bus transportation company known for exceptional customer service and innovative travel solutions.</p></p>

      </div>
    
    
    <div class="col-md">
    <h4 class="card-title mb-3">ADDRESS</h4><br>
    <i class="bi bi-geo-alt">Nairobi,mwoi avenue</i><br>
    <i class="bi bi-telephone">(+254)791900911</i><br>
    <i class="bi bi-envelope">TravelEaseExpress.pk</i>

    </div>
      
    <div class="col-md">
    <h4 class="card-title mb-3">CONTACT US</h4>
    <i class="bi bi-facebook"></i>
    <i class="bi bi-twitter"></i>
    <i class="bi bi-instagram"></i>
    <i class="bi bi-youtube"></i>
    </div>
    
    </div>
  </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>