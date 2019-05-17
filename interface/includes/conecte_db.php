<?php
//Connexion à la base de données
try{
	$db = new PDO('mysql:host=127.0.0.1;dbname=cambot', 'root',''); 
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //active les erreurs PDO
	$db->exec('SET NAMES utf8');// mettre toute la base en utf-8
}catch(PDOException $e){
	die('Erreur: ' .$e->getMessage());
}
?>  