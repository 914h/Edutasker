<?php
require ("../head.php");
require ("../connexion.php");
$r = "SELECT MAX(idgroupe) AS max_id FROM `group`";
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
                    <input type="text" id="nom" name="idprof" class="form-control"
                        disabled>
                    <input type="text" id="nom" name="idprof" class="form-control"
                        hidden>

                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control">

                    <label>abservation</label>
                    <input type="text" name="abservation"
                        class="form-control">
                        <label>cycle</label>
                    <input type="text" name="cycle" 
                        class="form-control">
                </div>
                <div class="col-md-6">
                <label>filiere</label>
                    <input type="text" name="filiere"
                        class="form-control">
                    <label>numgroupe</label>
                    <input type="text" name="numgroupe" 
                        class="form-control">
                        <label>idecole	</label>
                    <input type="text" name="idecole" 
                        class="form-control">

                    <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>

                </div>
            </div>



            
        </fieldset>

    </form>
</div>
</div>
