<?php
require ("../head.php");
require ("../connexion.php");
$r = "SELECT MAX(idprof) AS max_id FROM prof";
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
$next_id = $data['max_id'] + 1;
mysqli_close($con);
?>
<link rel="stylesheet" href="dd.css">
<div class="main">
    <div class="container">
    <form method="POST" action="prof-add.php">
        <fieldset>
            <legend>Formulaire etudiant</legend>
            <div class="row">
                <div class="col-md-6">
                    <label for="nom">Id prof</label>
                    <input type="text" id="nom" name="idprof" value="<?php echo $next_id; ?>" class="form-control"
                        disabled>
                    <input type="text" id="nom" name="idprof" value="<?php echo $next_id; ?>" class="form-control"
                        hidden>

                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control">

                    <label for="Prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" class="form-control">

                </div>
                <div class="col-md-6">
                    <label for="adresse">email</label>
                    <input type="text" id="email" name="email" class="form-control">
                    <label for="adresse">tel</label>
                    <input type="text" id="tel" name="tel" class="form-control">
                    <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>

                </div>
            </div>



            
        </fieldset>

    </form>
</div>
</div>
