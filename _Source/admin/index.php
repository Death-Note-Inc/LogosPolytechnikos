<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//load dependeces
include_once("parts/db-connect.php");



//redurect user if logged, disable on debug
/*if ($user->is_logged_in()) {
  $user->redirect('home.php');
}
*/


//check if login form submitted
if (isset($_POST['log_in'])) {
  echo "login";
 $user_email = trim($_POST['user_name_email']);
 $user_password = trim($_POST['user_password']);
 if ($user->login($user_email, $user_password)) {
    $user->redirect('home.php');
    } else $chyba = true;
  }
?>


<!DOCTYPE html>
<html>
<?php include_once("parts/header.php");?>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../index.php"><b>Logos</b>Polytechnikos</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Přihlaste se prosím</p>
        <?php 
        if (isset($chyba)) {
          echo "Přihlašování se nezdařilo";
        }
        ?>

        <form action="index.php" method="post">
          <div class="input-group mb-3">
            <input type="email" id="user_name_email" name="user_name_email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Heslo">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="log_in" class="btn btn-primary btn-block">Přihlásit se</button>
            </div>
            <!-- /.col -->
          </div>
        </form>



        <p class="mb-1">
          <a href="forgot-password.html">Zapomenuté heslo</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>

