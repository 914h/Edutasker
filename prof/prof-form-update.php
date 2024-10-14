<?php
$id = $_GET['id'];

$r = "select * from prof where idprof = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<link rel="stylesheet" href="dd.css">
<div class="main">
<div class="container" style="margin-top:100px">
    <form method="POST" action="prof-update.php">
        <fieldset>
            <legend>Formulaire Service</legend>
            <div class="row">
                <div class="col-md-6">
                    <label>Id etudiant</label>
                    <input type="text" name="idprof" value="<?php echo $data['idprof']; ?>" class="form-control" disabled>
                    <input type="text" name="idprof" value="<?php echo $data['idprof']; ?>" hidden>

                    <label>Nom</label>
                    <input type="text" name="nom" value="<?php echo $data['nom']; ?>" class="form-control">

                    <label>prenom</label>
                    <input type="text" name="prenom" value="<?php echo $data['prenom']; ?>"
                        class="form-control">

                   </div>
                <div class="col-md-6">
                <label>tel</label>
                    <input type="text" name="tel" value="<?php echo $data['tel']; ?>"
                        class="form-control">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $data['email']; ?>"
                        class="form-control">

                        <label>Photo</label>
                        <?php           
                        $photo = $data['photo'];
                        echo "<br><img src='../prof/images/$photo' width=150 height=150><br>"?>

                </div>
                <br><button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>

            </div>
</div>

</fieldset>
</form>
</div>
</div>
