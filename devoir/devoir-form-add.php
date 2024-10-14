<?php
session_start();

if (!isset($_SESSION['v_session']) || ($_SESSION['user_type'] !== 'professor' && $_SESSION['user_type'] !== 'admin')) {
    header("Location: ../auth.php");
    exit();}

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
require ("../head.php");
require ("../connexion.php");
$r = "SELECT MAX(iddevoir) AS max_id FROM devoirs";
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
$next_id = $data['max_id'] + 1;
mysqli_close($con);
?>
<link rel="stylesheet" href="ddd.css">
<div class="main">
    <div class="container">
        <form method="POST" action="devoir-add.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Formulaire etudiant</legend>
                <div class="row">
                    <div class="col-md-6">
                    <label for="nom">Id devoir</label>
                    <input type="text" id="nom" name="idprof" value="<?php echo $next_id; ?>" class="form-control"
                        disabled>
                    <input type="text" id="nom" name="idprof" value="<?php echo $next_id; ?>" class="form-control"
                        hidden>


                        <label for="idecole">idecole</label>
                        <select id="idecole" name="idecole" class="form-control">
                            <option value="" disabled selected>Choose L'ecole ...</option>
                            <?php
                            require ("../connexion.php");
                            $r1 = "SELECT * FROM ecole;";
                            $res1 = mysqli_query($con, $r1);
                            while ($data = mysqli_fetch_assoc($res1)) {
                                echo "<option value='" . $data["idecole"] . "'>" . $data["idecole"] . " - " . $data["nomecole"] . "</option>";
                            }
                            ?>
                        </select>


                        <label>idprof</label>
                        <select id="idprof" name="idprof" class="form-control">
                        <option value="" disabled selected>Choose Le prof ...</option>
                            <?php
                            require ("../connexion.php");
                            $nom_escaped = mysqli_real_escape_string($con, $nom);
                            $r1 = "SELECT * FROM prof ";
                            $res1 = mysqli_query($con, $r1);
                            while ($data = mysqli_fetch_assoc($res1)) {
                                echo "<option value='" . $data["idprof"] . "'>" . $data["idprof"] . " - " . $data["nom"] . " " . $data["prenom"] . "</option>";
                            }
                            ?>
                        </select>
                        <label>idgroup</label>
                        <select id="idgroup" name="idgroup" class="form-control">
                        <option value="" disabled selected>Choose Le group ...</option>
                            <?php
                            require ("../connexion.php");
                            $r1 = "SELECT * FROM `group`;";
                            $res1 = mysqli_query($con, $r1);
                            while ($data = mysqli_fetch_assoc($res1)) {
                                echo "<option value='" . $data["idgroupe"] . "'>" . $data["idgroupe"] . " - " . $data["nom"] . "</option>";
                            }
                            ?>
                        </select>


                    </div>
                    <div class="col-md-6">

                        <label>matiere</label>
                        <select id="matiere" name="matiere" class="form-control">
                        <option value="" disabled selected>Choose La matiere ...</option>
                            <?php
                            require ("../connexion.php");
                            $r1 = "SELECT *
                            FROM `profgrp`
                            ORDER BY `profgrp`.`matiere` ASC";
                            $res1 = mysqli_query($con, $r1);
                            while ($data = mysqli_fetch_assoc($res1)) {
                                echo "<option value='" . $data["matiere"] . "'>" . $data["matiere"] . "</option>";
                            }
                            ?>
                        </select>
                        
                        <label>description </label>
                        <input type="text" name="description" class="form-control" placeholder="ajouter un description ...">
                        <label>deadline </label>
                        <input type="date" name="deadline" class="form-control">
                        <label>pdf</label>
                        <input type="file" name="pdf_path" accept="application/pdf" class="form-control">

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Enregistrer
                        </button>

                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
