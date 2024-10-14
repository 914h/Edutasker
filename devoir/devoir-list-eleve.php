<?php
require('../connexion.php');
session_start();
if (!isset($_SESSION['v_session']) || $_SESSION['user_type'] !== 'student') {
    header("Location: auth.php");
    exit();
}
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

$r = "
    SELECT d.iddevoir, p.nom AS nomprof, g.nom AS nomgroup, d.matiere, d.description, d.deadline, d.pdf_path
    FROM `devoirs` d
    JOIN `prof` p ON d.idprof = p.idprof
    JOIN `group` g ON d.idgroup = g.idgroupe
    JOIN `etudiantgrp` eg ON d.idgroup = eg.idgroup
    JOIN `etudiant` et ON eg.idetudiant = et.idetudiant
    WHERE et.nom = '$nom' AND et.prenom = '$prenom'
";

$res1 = mysqli_query($con, $r);
if (!$res1) {
    die('Query failed: ' . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard OPTIRENT</title>
    <link rel="stylesheet" href="ee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="main">
<nav class="navbar navbar-expand-lg custom-navbar fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="logo2.png" width="200px" id="img" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="../dashboard-eleve.php"><i class="fa-solid fa-city"></i>
                                Accueil</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link " href="./group/group-list.php"><i class="fa-solid fa-city"></i> Mes
                                groups</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#"><i class="fa-solid fa-city"></i> Mes Notes</a>
                        </li><li class="nav-item">
                            <a class="nav-link " href="#"><i class="fa-solid fa-city"></i> Mes Abssences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./devoir/devoir-list-eleve.php"><i class="fa-solid fa-city"></i> Mes Devoirs</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link " href="../ratt/ratt-list-eleve.php"><i class="fa-solid fa-city"></i>
                                Mes Ratts</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                <a class="nav-link" href="logout.php" ><?php echo $nom . " "  . $prenom ?> <i class="fa-solid fa-caret-down"></i></a>
                </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php"><i class="fa-solid fa-lock"></i> Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="west">
        <div class="container page" id="page">
            <div class="entete-list">
                <h1 class="display-4">Liste des Devoirs</h1>
                <span class="nbr"></span>
            </div>

            <!-- Update the link to trigger the modal -->

            <table id="example" class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Devoir</th>
                        <th>M.Prof</th>
                        <th>Group</th>
                        <th>matiere</th>
                        <th>description</th>
                        <th>pdf</th>
                        <th>deadline</th>

                        <th class="colm"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($res1)) {
                        echo "<tr>";
                        echo "<td>" . $data['iddevoir'] . "</td>";
                        echo "<td>" . $data['nomprof'] . "</td>";
                        echo "<td>" . $data['nomgroup'] . "</td>";
                        echo "<td>" . $data['matiere'] . "</td>";
                        echo "<td>" . $data['description'] . "</td>";
                        $pdfName = basename($data['pdf_path']);
                        echo "<td><a href='" . $data['pdf_path'] . "' target='_blank'>" . $pdfName . "</a></td>";
                        echo "<td>" . $data['deadline'] . "</td>";

                        echo "</tr>";
                    }
                    mysqli_close($con);
                    ?>
                </tbody>
            </table>

        </div>

    </div>
</div>
</div>
</main>
</div>


<!-- Add this at the end of your HTML body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pzjw8f+21dsfeFt7KaCU8fR2F0QjFqEPiA8FrtgxQjv4Yjz8QM6PvxCKOx8/bQVJ
