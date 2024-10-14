<?php
require("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $iddevoir = $_POST['iddevoir'];
    $idecole = $_POST['idecole'];
    $idprof = $_POST['idprof'];
    $idgroup = $_POST['idgroup'];
    $matiere = $_POST['matiere'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];

    // Handle file upload if a new file is selected
    if ($_FILES["pdf_path"]["size"] > 0) {
        // Define upload directory
        $targetDirectory = "uploads/";

        // Check if the directory exists or create it
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0755, true); // Create the directory recursively
        }

        $targetFilePath = $targetDirectory . basename($_FILES["pdf_path"]["name"]);

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($_FILES["pdf_path"]["tmp_name"], $targetFilePath)) {
            $pdf_path = $targetFilePath;
        } else {
            echo "Error uploading file.";
            exit();
        }
    } else {
        // If no new file is selected, retain the existing file path
        $pdf_path = $_POST['old_pdf_path'];
    }

    // Prepare the update query
    $updateQuery = "UPDATE devoirs SET idecole=?, idprof=?, idgroup=?, matiere=?, description=?, deadline=?, pdf_path=? WHERE iddevoir=?";
    if ($stmt = $con->prepare($updateQuery)) {
        // Bind parameters
        $stmt->bind_param("sssssssi", $idecole, $idprof, $idgroup, $matiere, $description, $deadline, $pdf_path, $iddevoir);

        // Execute the update query
        if ($stmt->execute()) {
            // Redirect after successful update
            header("Location: devoir-list.php");
            exit();
        } else {
            echo "Error executing update query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing update statement: " . $con->error;
    }

    $con->close();
} else {
    // Redirect if the form was not submitted via POST
    header("Location: devoir-list.php");
    exit();
}
?>
