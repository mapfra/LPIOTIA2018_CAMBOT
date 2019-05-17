<?php
session_start();
session_destroy();// destruction de toutes les données associées à la session courante
header("Location: index.php");
?>