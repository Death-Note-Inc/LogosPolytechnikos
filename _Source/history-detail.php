<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//load dependeces
include_once("parts/db-connect.php");

//redirtect user if not logged in
if (!$user->is_logged_in()) {
    $user->redirect('index.php');
}

//check the logout button
if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
    $user->log_out();
    $user->redirect('index.php');
    
}

?>


<!DOCTYPE html>
<html>
<?php include_once("parts/header.php");?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include_once("parts/nav-".$user->getUserInfo("role").".php");?>
</div>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Historie článku - článek 123</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Domů</a></li>
            <li class="breadcrumb-item"><a href="home.php">Články</a></li>
            <li class="breadcrumb-item">Historie verzí</li>
            <li class="breadcrumb-item active">Historie článku článek 123</li>

          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <button class="btn btn-danger">Zavřít</button>
      <button class="btn btn-primary">Přepsat současnou verzi verzí z 12.3.2020</button><br><br>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Současná verze
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  Lorem ipsum, <del style='background-color:#ffcccc'>dolor sit amet</del>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
      <div class="col-md-6">
        <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Verze ze dne 12.3.2020
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                Lorem ipsum, <ins style='background-color:#ccffcc'>ahoj</ins>
              <!-- /.card-body -->
      </div>
        
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>

</div>

<?php include_once("parts/footer.php");?>

</body>
</html>
