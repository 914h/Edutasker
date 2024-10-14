<?php
session_start();
require('connexion.php'); // Including the database connection

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input
    $username = $con->real_escape_string($username);
    $password = $con->real_escape_string($password);
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['v_session'] = 1;
        $_SESSION['user_type'] = 'admin';
        $_SESSION['nom'] = $username;
        $_SESSION['prenom'] = $password;
        header("Location: dashboard-admin.php");
        exit();
    }
    // Query to check if the user is a student
    $sql_student = "SELECT * FROM etudiant WHERE nom = '$username' AND prenom = '$password'";
    $result_student = $con->query($sql_student);

    // Query to check if the user is a professor
    $sql_prof = "SELECT * FROM prof WHERE nom = '$username' AND prenom = '$password'";
    $result_prof = $con->query($sql_prof);

    if ($result_student->num_rows > 0) {
        $_SESSION['v_session'] = 1;
        $_SESSION['user_type'] = 'student';
        $_SESSION['nom'] = $username;
        $_SESSION['prenom'] = $password;
        header("Location: dashboard-eleve.php");
        exit();
    } elseif ($result_prof->num_rows > 0) {
        $_SESSION['v_session'] = 1;
        $_SESSION['user_type'] = 'professor';
        $_SESSION['nom'] = $username;
        $_SESSION['prenom'] = $password;
        header("Location: dashboard-prof.php");
        exit();
    } else {
        $error_message = "Echec de connexion...";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title> 
    <link rel="stylesheet" href="popo-auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="logo2.png"
          class="img-fluid mb-5" width="80%" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-6 mb-0">
        <form action="auth.php" method="post">
          <!-- Username input -->
          <div class="form-outline mb-4">
            <input type="text" id="username" name="username" class="form-control form-control-lg"
              placeholder="Enter your username" />
            <label class="form-label" for="username">Username </label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="password">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                class="link-danger">Register</a></p>
          </div>

          <?php
          if (isset($error_message)) {
              echo '<div class="alert alert-danger mt-3">'.$error_message.'</div>';
          }
          ?>
          
        </form>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
