<?php
require('connexion.php');
session_start();

if (!isset($_SESSION['v_session']) || $_SESSION['user_type'] !== 'student') {
    header("Location: auth.php");
    exit();
}

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"><link rel="icon" type="image/png" sizes="16x16"  href="images/ico.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard Prof</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="popo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>

<body>
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
                            <a class="nav-link active" href="dashboard-admin.php"><i class="fa-solid fa-city"></i>
                                Accueil</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link " href="#"><i class="fa-solid fa-city"></i> Mes
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
                            <a class="nav-link " href="./ratt/ratt-list-eleve.php"><i class="fa-solid fa-city"></i>
                                Mes Ratts</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                <a class="nav-link" href="#" ><?php echo $nom . " "  . $prenom ?> <i class="fa-solid fa-caret-down"></i></a>
                </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><i class="fa-solid fa-lock"></i> Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="heaad">
        <h1>Welcome to Student Dashboard Mr. <?php echo $prenom?><br>heres some details about the work !</></h1>  
        </div>
        <div class="details">
            <div class="cards">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"> <i class="fa-solid fa-book-open  fa-2xl"></i></h1>
                        <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de ecoles existe dans la base de
                            données</h6>
                        <p class="card-text">
                            <?php
                            require ("connexion.php");
                            $r1 = "SELECT COUNT(*) AS count FROM devoirs";
                            $res1 = mysqli_query($con, $r1);
                            $row1 = mysqli_fetch_assoc($res1);
                            $table1_count = $row1['count'];
                            ?>
                            Nombre des devoirs : <?php echo $table1_count; ?>
                        </p>
                        <a href="#" class="card-link">Afficher détails</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> <i class="fa-solid fa-book  fa-2xl"></i></h3>
                        <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de Ratt existe dans la base de
                            données</h6>
                        <p class="card-text">
                            <?php
                            require ("connexion.php");
                            // Query to get the total number of orders
                            $r1 = "SELECT COUNT(*) AS count FROM etudiant";
                            $res1 = mysqli_query($con, $r1);
                            $row1 = mysqli_fetch_assoc($res1);
                            $total_count = $row1['count'];
                            ?>
                        </p>
                        <p>
                            Nombre des etudiant total : <?php echo $total_count; ?><br>
                        </p>
                        <a href="#" class="card-link">Afficher détails</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> <i class="fa-solid fa-person-shelter fa-2xl"></i></h3>
                        <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de prof existe dans la base de données
                        </h6>
                        <p class="card-text">
                            <?php
                            require ("connexion.php");
                            $r1 = "SELECT COUNT(*) AS count FROM prof";
                            $res1 = mysqli_query($con, $r1);
                            $row1 = mysqli_fetch_assoc($res1);
                            $table1_count = $row1['count'];
                            ?>
                            Nombre de profs : <?php echo $table1_count; ?>
                        </p>
                        <a href="#" class="card-link">Afficher détails</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> <i class="fa-solid fa-user-group fa-2xl"></i></h3>
                        <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de group existe dans la base de données
                        </h6>
                        <p class="card-text">
                            <?php
                            require ("connexion.php");
                            $r1 = "SELECT COUNT(*) AS count FROM `group`";
                            $res1 = mysqli_query($con, $r1);
                            $row1 = mysqli_fetch_assoc($res1);
                            $table1_count = $row1['count'];
                            ?>
                            Nombre de group : <?php echo $table1_count; ?>
                        </p>
                        <a href="#" class="card-link">Afficher détails</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> <i class="fa-solid fa-user-minus fa-2xl"></i></h3>
                        <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de Paiement existe dans la base de
                            données</h6>
                        <p class="card-text">
                            <?php
                            require ("connexion.php");
                            $r1 = "SELECT COUNT(*) AS count FROM etudiantgrp";
                            $res1 = mysqli_query($con, $r1);
                            $row1 = mysqli_fetch_assoc($res1);
                            $table1_count = $row1['count'];
                            ?>
                            Nombre de mes abbsence : <?php echo $table1_count; ?>
                        </p>
                        <a href="#" class="card-link">Afficher détails</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> <i class="fa-solid fa-user-check fa-2xl"></i></h3>
                        <h6 class="card-subtitle mt-3 mb-3 text-muted">Le nombre de Client existe dans la base de
                            données</h6>
                        <p class="card-text">
                            <?php
                            require ("connexion.php");
                            $r1 = "SELECT COUNT(*) AS count FROM profgrp";
                            $res1 = mysqli_query($con, $r1);
                            $row1 = mysqli_fetch_assoc($res1);
                            $table1_count = $row1['count'];
                            ?>
                            Nombre de profgrp : <?php echo $table1_count; ?>
                        </p>
                        <a href="#" class="card-link">Afficher détails</a>
                    </div>
                </div>

            </div>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>