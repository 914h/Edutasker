<?php
	extract($_POST);	
    require("../connexion.php");

	$r = "update prof
    set nom = '".$nom."',
    prenom = '".$prenom."',
    tel = '".$tel."',
    email = '".$email."',
    where idprof = ".$id."";
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("prof-list.php");
?>