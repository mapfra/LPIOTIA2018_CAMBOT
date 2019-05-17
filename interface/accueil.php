<?php
session_start();
ini_set("display_errors",0);error_reporting(0);
if(!isset($_SESSION)){
  session_start();
}

if (isset($_SESSION['mail_user'])) {

}else{
  header ('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>CAM DOG</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
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
	   #boutonControl{
		display:none;
	  }
    }
    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .view {
        height: 600px;
      }
	  #boutonControl{
		display:none;
	  }
    }
	 @media (min-width: 800px) and (max-width: 1200px) {
	  #boutonControl{
		display:none;
	  }
	  #iframevideo{
		width:820px;
	  }
	  #boutonControl2{
		  display:block;
	  }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
	   #boutonControl{
		display:none;
	  }
    }
}
  </style>
</head>
<body style="background-color:#6292A9">
  <!--------------------------------------------------------------------------Header-------------------------------->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">
	  <!--Affichage de l'email de l'utilisateur connecté -->	
      <a class="navbar-brand" href="" target="_blank">
        <strong> <?php echo $_SESSION['mail_user'];?></strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav-flex-icons">
         <li class="nav-item active">
			<!--bouton déconnexion appellant le fichier logout.php qui empêchera  l'utilisateur de revenir en arrière-->
            <a href="logout.php" class="nav-link" href="#">Déconnexion
              <span class="sr-only">(current)</span>
            </a>
         </li>
        </ul>
      </div>
    </div>
  </nav><!--Fin header------>

  <div class="view">
   
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <div class="text-center white-text mx-5 wow fadeIn">

        <h1 class="display-4 mb-4">
          <strong> CAM - DOG</strong>
        </h1>
        <h4 class="mb-4 d-none d-md-block">
          <strong></strong>
        </h4>
        <p class="border border-light my-4">
        </p>
        <div class="container" >
		<!--DIV contenant l'iframe réccupérant la vidéo (http://10.0.4.124/-->
        <div class="row">
          <div style="background-color: black;opacity: 0.6;" class="col-md-8"> 
				<iframe  id="iframevideo" src="http://10.0.4.124/html/" width="755px" height="500px" style="margin-left:-12px" ></iframe>
          </div>
           <div class="col-md-4">
					 
                     <div style="margin-left:10px" id="boutonControl" style="display:block;" class="row">
                           <div class="row">
						   <!--bouton avancer , qui lors d'un clic applera la fonction forward()-->
                             <div class="col-md-6">
                               <center><button type="button" id="avancer" onclick ="forward()" class="btn btn-light-rounded px-4">
                               <i  class="fas fa-caret-up fa-9x" aria-hidden="true"></i>
                               </button></center>
                             </div>
							 <!--bouton reculer , qui lors d'un clic applera la fonction -->
                             <div class="col-md-6">
                               <center><button type="button" id="reculer" onclick ="backward()"class="btn btn-light-rounded px-4">
                              <i class="fas fa-caret-down fa-9x" aria-hidden="true"></i>
                               </button></center>
                             </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                            <button type="button" class="btn btn-light-rounded px-4">
                             <i class="fas fa-pause fa-6x"></i>
                            </button>
                            </div> 
                          <div class="col-md-4">
                            <button type="button" class="btn btn-light-rounded px-4">
                             <i class="fas fa-circle-notch fa-6x"></i>
                             </button>
                          </div>
                          </div>
						  <div class="row">
						   <!--bouton droite , qui lors d'un clic applera la fonction right()-->
                            <div class="col-md-6">
                            <button type="button" id="droite" onclick ="rihgt()"class="btn btn-light-rounded px-4">
							 <i class="fas fa-arrow-circle-left fa-6x"></i>
                            </button>
                            </div> 
							<!--bouton gauche , qui lors d'un clic applera la fonction left()-->
                            <div class="col-md-4">
                            <button type="button" id="gauche" onclick ="left()" class="btn btn-light-rounded px-4">
                             <i class="fas fa-arrow-circle-right fa-6x"></i>
                             </button>
                          </div>
                          </div>
                  </div>
				  <script>
				  document.getElementById("avancer").onclick = function(){

				   $.post("http://api.cambot.ml/index.php",{cmd:"forward"},function(data){
					   alert(data);
				   });
				};


				 document.getElementById("gauche").onclick = function(){

				   $.post("http://api.cambot.ml/index.php",{cmd:"left"},function(data){
					   alert(data);
				   });
				};

				 document.getElementById("tourner").onclick = function(){

				   $.post("http://api.cambot.ml/index.php",{cmd:"backward"},function(data){
					   alert(data);
				   });
				};

				 document.getElementById("droite").onclick = function(){

				   $.post("http://api.cambot.ml/index.php",{cmd:"right"},function(data){
					   alert(data);
				   });
				};
				  </script>
             </div>
			 </div>
           </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <!--Footer-->
  <footer class="page-footer text-center font-small wow fadeIn">  
  <div class="row" style="background-color:white">
	<div class="col-md-6">
   <div style="background-color: white; width: 50%; height: 18%;width:100%; ">
            <table class="table text-dark" style="50%;background-color:;">
               <thead>
                <tr style="background-color:orange">
                  <th scope="col">Distance parcourue en mm</th>
                  <th scope="col">Distance parcourue en cm</th>
                  <th scope="col">Distance parcourue en m</th>
				 <!-- <th scope="col" style="background-color:orange;">Distance Max</th>-->
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php
					//ouverture du fichier contenant les valeurs des distance + écriture
					$fop = fopen('distance.csv', 'r');
					if($fop === false)
					{// Ouverture du fichier échouée
					}
					else{
					   $delimiter = ';';//séparateur de cellules
					   while(($a = fgetcsv($fop, 0, $delimiter)) !== false) // Récupération d'une ligne
					 {
					foreach($a as $val){ // Parcours en boucle des cellules de la ligne	 
			    ?>
				  <td><?php echo $val; ?></td>
				<?php }?>
                </tr>
				<?php
				   }
				   fclose($fop);
				}
				?>
				
				</tbody>
            </table>
      </div>
	  </div>
	  <div class="col-md-6">
		<!-- div contenant l'image du graphique généré grace au fichier graphDistance.php-->
	    <div style="padding-top:10%;width:200px!important"> 
		<?php echo "<img src='graphDistance.php' />";?></div>
		</div>
	  </div>
    <div class="footer-copyright py-3">
Yvan - Kevin -Emilie
    </div>
  </footer>
  <!--/.Footer-->

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

</body>

</html>
