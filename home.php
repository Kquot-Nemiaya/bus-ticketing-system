<?php
include 'db_conn.php';
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    
    session_unset();
    session_write_close();
    $url = "index.php";
    header("Location: $url");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="home.css">
    <title>HOME</title>
    <style>
    body{
        background-image:url("images/Travel_ease.jpeg");
        background-position: cover; 
  background-repeat: no-repeat; 
  background-size: cover; 
  height: 80vh;

    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info navbar-info px-3">
  <div class="container">
    <a class="navbar-brand" href="#" style="color:white;">𝗧𝗥𝗔𝗩𝗘𝗟_𝗘𝗔𝗦𝗘 𝗘𝗫𝗣𝗥𝗘𝗦𝗦 </a>
    <button class="navbar-toggler"type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggle-icon"></span></button>
    
    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav ms-auto">
        
       
        <li class="nav-item">
          <a class="nav-link " href="logout.php" href="#" style="color:white;">𝗟𝗢𝗚𝗢𝗨𝗧</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<div class="container text-center">
<h4 style="color:green; font-weight:bold;">ᵂᵉˡᶜᵒᵐᵉ ᵗᵒ ᴬᶜᶜᵒᵘⁿᵗ <br><?php echo $username;?></h4></div>
</div>

<div class="container">
  <div class="jumbotron">
    
    <div class="card text-center bg-primary">
      <h2 style="color:white;">Book your ticket</h2>
    </div>

<div class="card text-center">
  <div class="card-body bg-info">

    <form  action="search.php" method="post">
  <div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
    <div>
                          <img src="images/city-icon.png">
                      </div>
                                <div ><p class="tofromcitycss"> From </p>
                                <select name="departure" > 
                      <option value='' disabled='disabled' selected> </option>

                      <option value="Nairobi" >Nairobi</option> 
                      <option value="kampala">Kampala</option>  
                      <option value="1Juba" >Juba</option>                
                      <option value="Tanzania"  >Tanzania</option>
                      <option value="Ethiopia"  >Ethiopia</option>

                              
                                </select>
                                
                                
  </div>
    </div>
    <div class="col">
   <div style="padding-left:10px;">
                                        <img src="images/city-icon.png">
                                    </div>
                                    <div ><p class="tofromcitycss"> To </p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
              <select name="arrival" >
                  <option value='' disabled='disabled' selected> </option>

                      <option value="Nairobi" >Nairobi</option> 
                      <option value="Kampala" >Kampala</option>  
                      <option value="Juba"  >Juba</option>               
                      <option value="Tanzania"   >Tanzania</option>
                      <option value="Ethiopia"  >Ethiopia</option>
                              
                                </select>
                
    </div>
    </div>
    <div class="col">
    <div style="padding-left:10px;">
                          <img src="images/calr-icon.png">
                      </div>
                      <div class="search"><p class="tofromcitycss">Date</p>
                      <input  type="date" name="date" style="cursor: pointer;font-size: 16px;padding: 0 20px;"></div>
              
    </div>
    <div class="col">
    <button name="submit" class="btn btn-primary">Search</button>
    </div>
  </div>
</div>
    
  </form>
 
  </div>



  </div>
    
  </div>
  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
