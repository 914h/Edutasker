<?php
$id = $_GET['id'];
$r = "select * from devoirs where iddevoir = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<link rel="stylesheet" href="styles.css">
<body>
<div class="container" style="margin-top: 100px;">
	<form method="POST" action="#">
		<div class="row">
			<div class="datadelete col-6">
				<fieldset>
					<legend>Service à supprimer</legend>
					<label>Id</label>
					<input type="text" name="iddevoir" value="<?php echo $data['iddevoir']; ?>" class="form-control"
						disabled>
					<input type="text" name="iddevoir" value="<?php echo $data['iddevoir']; ?>" hidden>
					<label>idprof</label>
					<input type="text" name="idprof" value="<?php echo $data['idprof']; ?>" class="form-control"
						disabled>
					<label>idgroup</label>
					<input type="text" name="idgroup" value="<?php echo $data['idgroup']; ?>" class="form-control"  disabled>

					<label>matiere</label>
					<input type="text" name="matiere" value="<?php echo $data['matiere']; ?>" class="form-control" disabled>
					<label>description</label>
					<input type="text" name="description" value="<?php echo $data['description']; ?>" class="form-control" disabled>


				</fieldset>
			</div>
			<div class="cledelete col-6">
				<i class="fa-solid fa-key"></i>
				<h2>Suppression</h2>
				<label>Entrez la clé de la suppression</label>
				<input type="password" name="cledelete" class="form-control"
					style="width: 300px;text-align: center; margin: auto;" autofocus>

				<div class="container mt-3">
					<div class="alert alert-warning" role="alert">
						<i class="fa-solid fa-triangle-exclamation"></i><br>Les données supprimées ne seront plus
						récupérables. Êtes-vous sûr de vouloir continuer ?
					</div>
					<button type="submit" class="btn btn-danger"><i class="fas fa-trash-can"></i> Supprimer </button>
				</div>

			</div>
		</div>

	</form>
</div>

</body>
<?php
extract($_POST);
if (isset($cledelete)) {
	if ($cledelete != "123") {
		echo "<div class='alert alert-info' role='alert'><center>
        <h4><i class='fa-solid fa-triangle-exclamation'></i> Clé de suppression incorrecte...</h4></center></div>";
	} else {
		$r = "delete from client where idl = '" . $id . "'";
		$re = "ALTER TABLE client AUTO_INCREMENT = 0";
		require("../connexion.php");
		mysqli_query($con, $r);
		mysqli_query($con, $re);
		mysqli_close($con);
		require("../fonctions.php");
		redirection("client-list.php");
	}
}
?>