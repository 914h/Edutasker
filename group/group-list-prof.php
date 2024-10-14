<?php
session_start();
if (!isset($_SESSION['v_session']) || ($_SESSION['user_type'] !== 'professor' && $_SESSION['user_type'] !== 'admin')) {
    header("Location: auth.php");
    exit();
}

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
require ("../connexion.php");require('../head.php');

$r = "SELECT * FROM `group`";
$res = mysqli_query($con, $r);
if ($res) {
    $nbr_client = mysqli_num_rows($res);
} else {
   
    echo "Query failed: " . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard OPTIRENT</title>
    <link rel="stylesheet" href="dde.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <a class="nav-link active" href="../dashboard-prof.php"><i class="fa-solid fa-city"></i>
                            Dasboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="../group/group-list.php"><i class="fa-solid fa-city"></i> Liste des
                            groups</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../etudiant/etudiant-list.php"><i class="fa-solid fa-city"></i> Liste
                            des Etudiants</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="../devoir/devoir-list-prof.php"><i class="fa-solid fa-city"></i>
                            Add Devoir</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><?php echo 'Prof. ' . $prenom . " " . $nom ?> <i
                                class="fa-solid fa-caret-down"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fa-solid fa-lock"></i> Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="tables">
            <div class="entete-list">
                <h1 class="display-4">Liste des groups</h1>
                <span class="nbr"></span>
            </div>
            <table id="example" class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>id groupe</th>
                        <th>Nom</th>
                        <th>filiere</th>
                        <th>Students</th>
                        <th class="colm"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($res)) {
                        $id = $data['idgroupe'];
                        echo "<tr>";
                        echo "<td>" . $data['idgroupe'];
                        echo "<td>" . $data['nom'];
                        echo "<td>" . $data['filiere'];
                        echo "<td>" . '20 eleves';
                    }
                    mysqli_close($con);
                    ?>
                </tbody>

            </table>
        </div>

    <div class="west">

    </div>
    </div>
    </body>
    </html>