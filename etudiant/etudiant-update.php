<?php
	extract($_POST);	require("../connexion.php");

	$r = "update etudiant
    set nom = '".$nom."',
    prenom = '".$prenom."',
    tel = '".$tel."',
    email = '".$email."',
    adresse = '".$adresse."',
    datenaissance = '".$datenaissance."',
    where idetudiant = ".$id."";
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("etudiant-list.php");
?>