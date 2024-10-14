<?php
	extract($_POST);
	$r = "INSERT INTO etudiant
    (nom, prenom, adresse, tel, email, datenaissance)
    VALUES
    ('".$nom."', '".$prenom."', '".$adresse."', '".$tel."', '".$email."',
	 '".$datenaissance."')";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("etudiant-list.php");
?>