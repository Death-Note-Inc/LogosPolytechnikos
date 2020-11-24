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
    <?php include_once("parts/nav.php");?>
</div>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Posudky - článek 123</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Domů</a></li>
            <li class="breadcrumb-item active">Posudky</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
       <div class="callout callout-danger">
                  <h5>Petr napsal:</h5>

                  <p>Kolego, opravte si název, máte tam chybu</p>
                </div>
      <div class="callout callout-warning">
                  <h5>Josef napsal:</h5>

                  <p>Až na pár chyb dobré</p>
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
