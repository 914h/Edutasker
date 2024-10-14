<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../connexion.php");

    // Secure the input data
    $idecole = mysqli_real_escape_string($con, $_POST['idecole']);
    $nomecole = mysqli_real_escape_string($con, $_POST['nomecole']);
    $adresse = mysqli_real_escape_string($con, $_POST['adresse']);
    $tel = mysqli_real_escape_string($con, $_POST['tel']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $anneedefondation = mysqli_real_escape_string($con, $_POST['anneedefondation']);
    $annededemarrage = mysqli_real_escape_string($con, $_POST['annededemarrage']);
    $siteweb = mysqli_real_escape_string($con, $_POST['siteweb']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    
    // Handle file upload
    $logo = null;
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'images/';
        $logo = utf8_decode(basename($_FILES['logo']['name']));
        $upload_file = $upload_dir . $logo;
        
        if (!move_uploaded_file($_FILES['logo']['tmp_name'], $upload_file)) {
            die("Error uploading file.");
        }
    }

    // Update query with conditional logo update
    if ($logo) {
        $r = "UPDATE ecole SET
              nomecole = '$nomecole',
              adresse = '$adresse',
              tel = '$tel',
              email = '$email',
              anneedefondation = '$anneedefondation',
              annededemarrage = '$annededemarrage',
              siteweb = '$siteweb',
              type = '$type',
              description = '$description',
              logo = '$logo'
              WHERE idecole = '$idecole'";
    } else {
        $r = "UPDATE ecole SET
              nomecole = '$nomecole',
              adresse = '$adresse',
              tel = '$tel',
              email = '$email',
              anneedefondation = '$anneedefondation',
              annededemarrage = '$annededemarrage',
              siteweb = '$siteweb',
              type = '$type',
              description = '$description'
              WHERE idecole = '$idecole'";
    }

    if (mysqli_query($con, $r)) {
        require("../fonctions.php");
        redirection("ecole-list.php");
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Invalid request method.";
}
?>
