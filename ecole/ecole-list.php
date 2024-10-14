<?php
session_start();
if (!isset($_SESSION['v_session']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../auth.php");
    exit();
}require('../head.php');

require ("../connexion.php");
$r = "select * from ecole";
$res = mysqli_query($con, $r);
$nbr_cabinet = mysqli_num_rows($res);?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard OPTIRENT</title>
    <link rel="stylesheet" href="ddee.css">
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
          <img src="../logo2.png" width="200px" id="img" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
          <li class="nav-item">
              <a class="nav-link active" href="../dashboard-admin.php"><i class="fa-solid fa-city"></i> Dasboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../ecole/ecole-list.php"><i class="fa-solid fa-city"></i> Ecoles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../etudiant/etudiant-list.php"><i class="fa-solid fa-city"></i> etudiant</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../prof/prof-list.php"><i class="fa-solid fa-city"></i> Profs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../group/group-list.php"><i class="fa-solid fa-city"></i> Groups</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../paiement/paiement-list.php"><i class="fa-solid fa-city"></i> Plans</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../devoir/devoir-list.php"><i class="fa-solid fa-city"></i> Devoirs</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link" href="logout.php" >Admin <i class="fa-solid fa-caret-down"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="fa-solid fa-lock"></i> Déconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
                <div class="container page" id="page" style="margin-top: 100px;">
                    <div class="entete-list">
                        <h1 class="display-4">Liste des ecoles</h1>
                        <span class="nbr"></span>
                    </div>

                    <a href="ecole-form-add.php" class="btn btn-success ttip" data-bs-toggle="tooltip" title="Ajouter une cabinet"
                        >
                        Ajouter
                    </a>

                    <!-- Modal Structure -->
                    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModalLabel">Formulaire cabinet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form content will be loaded here -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="cabinet-print.php" class="btn btn-secondary" data-bs-toggle="tooltip"
                        title="Imprimer tous les cabinets"><i class="fa-solid fa-print"></i></a>
                    <br>
                    <br>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>idecole</th>
                                <th>Nom ecole</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>anneedefondation</th>
                                <th>annededemarrage</th>
                                <th>siteweb</th>
                                <th>type</th>
                                <th>description</th>
                                <th>logo</th>
                                <th>Edit </th>
                                <th>Delete </th>
                                <th class="colm"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_assoc($res)) {
                                $photo = $data['logo'];
                                $id = $data['idecole'];
                                echo "<tr>";
                                echo "<td>" . $data['idecole'];
                                echo "<td>" . $data['nomecole'];
                                echo "<td>" . $data['adresse'];
                                echo "<td>" . $data['tel'];
                                echo "<td>" . $data['email'];
                                echo "<td>" . $data['anneedefondation'];
                                echo "<td>" . $data['annededemarrage'];
                                echo "<td>" . $data['siteweb'];
                                echo "<td>" . $data['type'];
                                echo "<td>" . $data['description'];
                                echo "<td> <img src='../ecole/images/$photo' width=90> </td>";
                                echo "<td>  <a href=ecole-form-update.php?id=" . urlencode($id) . " class='btn btn-primary' data-bs-toggle='tooltip' title='Modifier cette ligne'>Edit</a>";
                                echo "<td>  <a href=ecole-form-delete.php?id=" . urlencode($id) . " class='btn btn-danger' data-bs-toggle='tooltip' title='Supprimer cette ligne'><i class='fa-solid fa-trash-can iconrouge'></i></a>";

                            }
                            mysqli_close($con);
                            ?>
                        </tbody>
                    </table>

                </div>


            </div>

        <div class="west">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#addCabinetBtn').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: 'ecole-form-add.php',
                    method: 'GET',
                    success: function (response) {
                        $('#formModal .modal-body').html(response);
                        $('#formModal').modal('show');
                    },
                    error: function () {
                        alert('Failed to load form.');
                    }
                });
            });
        });
    </script>
</body>