<?php
$id = $_GET['id'];
require("../connexion.php");
$r = "SELECT * FROM ecole WHERE idecole = '" . mysqli_real_escape_string($con, $id) . "'";
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?>
<link rel="stylesheet" href="ddea.css">

<body>
    <div class="container" style="margin-top:100px">
    <form method="POST" action="ecole-update.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Formulaire Ecole</legend>
            <div class="row">
                <div class="col-md-6">
                    <label>idecole</label>
                    <input type="text" name="idecole" value="<?php echo htmlspecialchars($data['idecole']); ?>" class="form-control" disabled>
                    <input type="hidden" name="idecole" value="<?php echo htmlspecialchars($data['idecole']); ?>">

                    <label>nomecole</label>
                    <input type="text" name="nomecole" value="<?php echo htmlspecialchars($data['nomecole']); ?>" class="form-control">

                    <label>Adresse</label>
                    <input type="text" name="adresse" value="<?php echo htmlspecialchars($data['adresse']); ?>" class="form-control">

                    <label>Telephone</label>
                    <input type="text" name="tel" value="<?php echo htmlspecialchars($data['tel']); ?>" class="form-control">

                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" class="form-control">

                    <label>Site web</label>
                    <input type="text" name="siteweb" value="<?php echo htmlspecialchars($data['siteweb']); ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Annee de fondation</label>
                    <input type="date" name="anneedefondation" value="<?php echo htmlspecialchars($data['anneedefondation']); ?>" class="form-control">

                    <label>Annee de demarrage</label>
                    <input type="date" name="annededemarrage" value="<?php echo htmlspecialchars($data['annededemarrage']); ?>" class="form-control">

                    <label>Description</label>
                    <input type="text" name="description" value="<?php echo htmlspecialchars($data['description']); ?>" class="form-control">

                    <label>Type</label>
                    <input type="text" name="type" value="<?php echo htmlspecialchars($data['type']); ?>" class="form-control">

                    <label>Logo</label>
                    <input type="file" name="logo" class="form-control" accept="image/*" onchange="updatePreview(this, 'image-preview')">
                    <img id="image-preview" src="images/<?php echo htmlspecialchars($data['logo']); ?>" alt="Preview" style="max-width: 200px; max-height: 200px;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </fieldset>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function updatePreview(input, targetId) {
        let file = input.files[0];
        let reader = new FileReader();

        reader.onload = function () {
            let img = document.getElementById(targetId);
            img.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

</body>
