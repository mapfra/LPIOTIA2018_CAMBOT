
<?php
//connexion à la bdd
$con = mysqli_connect("localhost","root","","camdog");
// vérification de la connexion 
if (mysqli_connect_errno())
  {
  echo "Erreur de connexion à MySql: " . mysqli_connect_error();
  }

?>

