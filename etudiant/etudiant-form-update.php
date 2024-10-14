<?php
$id = $_GET['id'];
$r = "select * from etudiant where idetudiant = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<link rel="stylesheet" href="dd.css">
<div class="main">
<div class="container" style="margin-top:100px">
    <form method="POST" action="etudiant-update.php">
        <fieldset>
            <legend>Formulaire Service</legend>
            <div class="row">
                <div class="col-md-6">
                    <label>Id etudiant</label>
                    <input type="text" name="idetudiant" value="<?php echo $data['idetudiant']; ?>" class="form-control">
                    <input type="text" name="idetudiant" value="<?php echo $data['idetudiant']; ?>" hidden>

                    <label>Nom</label>
                    <input type="text" name="nom" value="<?php echo $data['nom']; ?>" class="form-control">

                    <label>prenom</label>
                    <input type="text" name="prenom" value="<?php echo $data['prenom']; ?>"
                        class="form-control">

                    <label>adresse</label>
                    <input type="text" name="adresse" value="<?php echo $data['adresse']; ?>"
                        class="form-control">
                        </div>
                <div class="col-md-6">
                <label>tel</label>
                    <input type="text" name="tel" value="<?php echo $data['tel']; ?>"
                        class="form-control">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $data['email']; ?>"
                        class="form-control">

                    <label>datenaissance</label>
                    <input type="date" name="datenaissance" value="<?php echo $data['datenaissance']; ?>"
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
