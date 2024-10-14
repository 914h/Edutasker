<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../connexion.php");
    extract($_POST);

    $nomecole = mysqli_real_escape_string($con, $nomecole);
    $adresse = mysqli_real_escape_string($con, $adresse);
    $tel = mysqli_real_escape_string($con, $tel);
    $email = mysqli_real_escape_string($con, $email);
    $anneedefondation = mysqli_real_escape_string($con, $anneedefondation);
    $annededemarrage = mysqli_real_escape_string($con, $annededemarrage);
    $siteweb = mysqli_real_escape_string($con, $siteweb);
    $type = mysqli_real_escape_string($con, $type);
    $description = mysqli_real_escape_string($con, $description);

    $name = $_FILES['logo']['name'];
    $tmp = $_FILES['logo']['tmp_name'];
    $dossier = 'images/';

    if (!file_exists($dossier)) {
        echo "<br>Error: Upload directory does not exist.";
    } else {
        $name = utf8_decode($name);
        $uploading = move_uploaded_file($tmp, $dossier . $name);

        if ($uploading) {
            $logo = $name;
            $r = "INSERT INTO ecole (idecole, nomecole, adresse, tel, email, anneedefondation, annededemarrage, siteweb, `type`, `description`, logo)
                  VALUES ('$next_id', '$nomecole', '$adresse', '$tel', '$email', '$anneedefondation', '$annededemarrage', '$siteweb', '$type', '$description', '$logo')";

            if (mysqli_query($con, $r)) {
                require("../fonctions.php");
                redirection("ecole-list.php");
            } else {
                echo "<br>Error: Failed to insert record into database.";
            }
        } else {
            echo "<br>Error: Failed to upload file.";
        }
    }
    mysqli_close($con);
}
?>
