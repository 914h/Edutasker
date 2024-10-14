<?php
$id = $_GET['id'];
$r = "select * from `group` where idgroupe = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<link rel="stylesheet" href="dd.css">
<div class="main">
<div class="container" style="margin-top:100px">
    <form method="POST" action="group-update.php">
        <fieldset>
            <legend>Formulaire Service</legend>
            <div class="row">
                <div class="col-md-6">
                    <label>Id etudiant</label>
                    <input type="text" name="idgroupe" value="<?php echo $data['idgroupe']; ?>" class="form-control">
                    <input type="text" name="idgroupe" value="<?php echo $data['idgroupe']; ?>" hidden>

                    <label>Nom</label>
                    <input type="text" name="nom" value="<?php echo $data['nom']; ?>" class="form-control">

                    <label>abservation</label>
                    <input type="text" name="abservation" value="<?php echo $data['abservation']; ?>"
                        class="form-control">

                        <label>cycle</label>
                    <input type="text" name="cycle" value="<?php echo $data['cycle']; ?>"
                        class="form-control">

                   </div>
                <div class="col-md-6">
                <label>filiere</label>
                    <input type="text" name="filiere" value="<?php echo $data['filiere']; ?>"
                        class="form-control">
                    <label>numgroupe</label>
                    <input type="text" name="numgroupe" value="<?php echo $data['numgroupe']; ?>"
                        class="form-control">
                        <label>idecole	</label>
                    <input type="text" name="idecole" value="<?php echo $data['idecole']; ?>"
                        class="form-control">

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </div>
</div>

</fieldset>
</form>
</div>
</div>
