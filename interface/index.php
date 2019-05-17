<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>CAM DOG</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }
    @media (max-width: 559px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }
    @media (min-width: 560px) and (max-width: 740px) {

      html,
      body,
      header,
      .view {
        height: 700px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .view {
        height: 600px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
    }

  </style>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">
      <!-- Brand -->
     
        <div class="text-center white-text mx-5 wow fadeIn">
        <H1><strong>CAM DOG </strong></H1></div>
  
      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
 
      </div>
    </div>
  </nav>

  <div class="view">
    <video class="video-intro" poster="https://mdbootstrap.com/img/Photos/Others/background.jpg" playsinline autoplay
      muted loop>
      <source src="https://mdbootstrap.com/img/video/Lines-min.mp4" type="video/mp4">
    </video>
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
      <div class="text-center white-text mx-10== wow fadeIn">
      <div class="card" style="width:500px!important;">
        <h5 class="card-header info-color white-text text-center py-4" style="background-color: #3F729B!important">
          <strong>Connexion</strong>
        </h5>
        <div class="card-body px-lg-5 pt-0">
          <form method="POST" action="" class="text-center" style="color:#757575;">
            <div class="md-form">
              <input placeholder="Email" name="login" id="login" type="email" id="materialLoginFormEmail" class="form-control">
            </div>
            <div class="md-form">
              <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" id="materialLoginFormPassword" class="form-control">
            </div>
            <input name="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"></input>
          </form>
        </div>
      </div>
      </div>
    </div>
    </div>
</body>

<?php
    if (isset($_POST['submit'])){     
      include("cnx.php");
      session_start();
      $usermail=$_POST['login'];
      $password=$_POST['mdp'];
      $query = mysqli_query($con, "SELECT user_mail FROM user WHERE user_mail='$usermail' and user_mdp='$password'");
  if (mysqli_num_rows($query) != 0){
       $_SESSION['mail_user']=$usermail;
       echo "<script language='javascript' type='text/javascript'> location.href='accueil.php' </script>";   
  }
  else{ echo "<script type='text/javascript'>alert('Email ou mot de passe incorrect')</script>";
     }
    }
 ?>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Time Counter -->
  <script type="text/javascript">
    // Set the date we're counting down to
    var countDownDate = new Date();
    countDownDate.setDate(countDownDate.getDate() + 30);

    // Update the count down every 1 second
    var x = setInterval(function () {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("time-counter").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("time-counter").innerHTML = "EXPIRED";
      }
    }, 1000);

  </script>
</body>

</html>
