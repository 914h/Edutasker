<?php
$id = $_GET['id'];
$r = "select * from `devoirs` where iddevoir = '" . $id . "'";
require("../connexion.php");
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
require("../head.php");
?><link rel="stylesheet" href="styles.css">
<body>
<div class="main">
    <div class="container" style="margin-top:100px">
        <form method="POST" action="devoir-update.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Formulaire Service</legend>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $id = $_GET['id'];
                        $r = "select * from `devoirs` where iddevoir = '" . $id . "'";
                        require ("../connexion.php");
                        $res = mysqli_query($con, $r);
                        $data = mysqli_fetch_assoc($res);
                        mysqli_close($con);
                        require ("../head.php");
                        ?>

                        <label>Id Devoir</label>
                        <input type="text" name="iddevoir" value="<?php echo $data['iddevoir']; ?>" class="form-control"
                            disabled>
                        <input type="text" name="iddevoir" value="<?php echo $data['iddevoir']; ?>" hidden>

                        <label for="idecole">idecole</label>
                        <select id="idecole" name="idecole" class="form-control">
                            <?php
                            require ("../connexion.php");
                            $r1 = "SELECT * FROM ecole;";
                            $res1 = mysqli_query($con, $r1);
                            while ($row = mysqli_fetch_assoc($res1)) {
                                $selected = ($row["idecole"] == $data['idecole']) ? "selected" : ""; // Check if option matches the database value
                                echo "<option value='" . $row["idecole"] . "' " . $selected . ">" . $row["idecole"] . " - " . $row["nomecole"] . "</option>";
                            }
                            mysqli_close($con);
                            ?>
                        </select>

                        <?php
                        $id = $_GET['id'];
                        $r = "select * from `devoirs` where iddevoir = '" . $id . "'";
                        require ("../connexion.php");
                        $res = mysqli_query($con, $r);
                        $data = mysqli_fetch_assoc($res);
                        mysqli_close($con);
                        require ("../head.php");
                        ?>

                        <label>idprof</label>
                        <select id="idprof" name="idprof" class="form-control">
                            <?php
                            require ("../connexion.php");
                            $r1 = "SELECT * FROM prof;";
                            $res1 = mysqli_query($con, $r1);
                            while ($row = mysqli_fetch_assoc($res1)) {
                                $selected = ($row["idprof"] == $data['idprof']) ? "selected" : ""; // Check if option matches the database value
                                echo "<option value='" . $row["idprof"] . "' " . $selected . ">" . $row["idprof"] . " - " . $row["nom"] . " " . $row["prenom"] . "</option>";
                            }
                            mysqli_close($con);
                            ?>
                        </select>

                        <?php
                        $id = $_GET['id'];
                        $r = "select * from `devoirs` where iddevoir = '" . $id . "'";
                        require ("../connexion.php");
                        $res = mysqli_query($con, $r);
                        $data = mysqli_fetch_assoc($res);
                        mysqli_close($con);
                        require ("../head.php");
                        ?>
                        <label>idgroup</label>
                        <select id="idgroup" name="idgroup" class="form-control">
                            <?php
                            require ("../connexion.php");
                            $r1 = "SELECT * FROM `group`;";
                            $res1 = mysqli_query($con, $r1);
                            while ($row = mysqli_fetch_assoc($res1)) {
                                $selected = ($row["idgroupe"] == $data['idgroup']) ? "selected" : ""; // Check if option matches the database value
                                echo "<option value='" . $row["idgroupe"] . "' " . $selected . ">" . $row["idgroupe"] . " - " . $row["nom"] . "</option>";
                            }
                            mysqli_close($con);
                            ?>
                        </select>



                    </div>
                    <?php
                    $id = $_GET['id'];
                    $r = "select * from `devoirs` where iddevoir = '" . $id . "'";
                    require ("../connexion.php");
                    $res = mysqli_query($con, $r);
                    $data = mysqli_fetch_assoc($res);
                    mysqli_close($con);
                    require ("../head.php");
                    ?>
                    <div class="col-md-6">
                        <label>matiere</label>
                        <input type="text" name="matiere" value="<?php echo $data['matiere']; ?>" class="form-control">
                        <label>description</label>
                        <input type="text" name="description" value="<?php echo $data['description']; ?>"
                            class="form-control">
                        <label>deadline </label>
                        <input type="date" name="deadline" value="<?php echo $data['deadline']; ?>"
                            class="form-control">
                        <label>pdf_path</label>
                        <!-- Hidden input to store existing file path -->
                        <input type="hidden" name="old_pdf_path" value="<?php echo $data['pdf_path']; ?>">

                        <!-- Display existing file path -->


                        <!-- File input for uploading new PDF -->
                        <input type="file" name="pdf_path" id="pdf_path" accept="application/pdf" class="form-control">

                        <p>Existing PDF: <?php echo $data['pdf_path']; ?></p>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Enregistrer
                        </button>
                    </div>
                </div>
    </div>

    </fieldset>
    </form>
</div>
</body>