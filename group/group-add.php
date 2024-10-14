<?php
	extract($_POST);
	$r = "INSERT INTO prof
    (nom, prenom, tel, email)
    VALUES
    ('".$nom."', '".$prenom."','".$tel."', '".$email."',
	 '".$datenaissance."')";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("prof-list.php");
?>