<?php

header( 'Access-Control-Allow-Origin: *'); // autorise l'application à accéder à l'API

if(isset($_POST['cmd']))
{
	require('classe.php');
	$cb=new cambot($_POST);
}