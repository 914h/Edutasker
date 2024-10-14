<?php
require("../head.php");
require("../connexion.php");

// Get the next ID for the new record
$r = "SELECT MAX(idecole) AS max_id FROM ecole";
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
$next_id = $data['max_id'] + 1;
mysqli_close($con);
?>
<link rel="stylesheet" href="dd.css">
<div class="main">
    <div class="container" style="margin-top: 20px;">
        <form method="POST" action="ecole-add.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Formulaire ecole</legend>
                <div class="row">
                    <div class="col-md-6">
                        <label for="idecole">ID ecole</label>
                        <input type="text" id="idecole" name="idecole" value="<?php echo $next_id; ?>" class="form-control" disabled>
                        <input type="hidden" id="idecole" name="idecole" value="<?php echo $next_id; ?>">

                        <label for="nomecole">Nom ecole</label>
                        <input type="text" id="nomecole" name="nomecole" class="form-control" placeholder="Ajouter Un nom d'ecole" required >

                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Ajouter un address" required>

                        <label for="tel">Tel</label>
                        <input type="text" id="tel" name="tel" class="form-control" placeholder="Ajouter un num tel"  required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Ajouter un email"  required>

                        <label for="anneedefondation">Annee de fondation</label>
                        <input type="date" id="anneedefondation" name="anneedefondation" class="form-control" placeholder="Ajouter un Annee de fondation"  required>
                    </div>
                    <div class="col-md-6">
                        <label for="annededemarrage">Annee de demarrage</label>
                        <input type="year" id="annededemarrage" name="annededemarrage" class="form-control" placeholder="Ajouter un Annee de demarrage"  required>

                        <label for="siteweb">Site web</label>
                        <input type="text" id="siteweb" name="siteweb" class="form-control" placeholder="Ajouter un Siteweb" >

                        <label for="type">Type</label>
<select id="type" name="type" class="form-control" required>
    <option value="" disabled selected>Select type...</option>
    <option value="public">Public</option>
    <option value="private">Private</option>
</select>



                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" placeholder="Ajouter un Description" class="form-control">

                        <label for="logo">Logo</label>
                        <input type="file" id="logo" name="logo" class="form-control" accept="image/*" onchange="updatePreview(this, 'image-preview')" required>
                        <img id="image-preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enregistrer</button>
            </fieldset>
        </form>
    </div>
</div>
<script>
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
