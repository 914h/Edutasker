<?php
require("../fonctions.php");
require("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "uploads/";

    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0755, true); 
    }

    $targetFilePath = $targetDirectory . basename($_FILES["pdf_path"]["name"]);

    if (file_exists($targetFilePath)) {
        echo "File already exists.";
        exit();
    }

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowedTypes = array('pdf');
    if (!in_array($fileType, $allowedTypes)) {
        echo "Only PDF files are allowed.";
        exit();
    }

    if (move_uploaded_file($_FILES["pdf_path"]["tmp_name"], $targetFilePath)) {
        $insertQuery = "INSERT INTO devoirs (idprof, idecole, idgroup, matiere, `description`, deadline, pdf_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $con->prepare($insertQuery)) {
            $stmt->bind_param("sssssss", $idprof, $idecole, $idgroup, $matiere, $description, $deadline, $pdf_path);

            $idprof = $_POST['idprof'];
            $idecole = $_POST['idecole'];
            $idgroup = $_POST['idgroup'];
            $matiere = $_POST['matiere'];
            $description = $_POST['description'];
            $deadline = $_POST['deadline'];
			$pdf_path = $targetFilePath;
            if ($stmt->execute()) {
                header("Location: devoir-list-prof.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement.";
        }
    } else {
        echo "Error uploading file.";
    }

    $con->close();
}
?>
