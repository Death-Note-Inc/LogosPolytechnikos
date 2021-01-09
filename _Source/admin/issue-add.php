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
<!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Přidat vydání</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Domů</a></li>
            <li class="breadcrumb-item active">Přidat vydání</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-outline card-info">


        <form role="form" action="addIssue.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Vložte název vydání</label>
              <input type="text" class="form-control" name="name_issue" id="name_issue" placeholder="Název vydání" required>
            </div>  
            <div class="form-group">
              <label for="exampleInputEmail1">Vložte datum</label>
              <input type="date" class="form-control" name="date_issue" id="date_issue" placeholder="" required>
            </div> 
              <div class="form-group">
              <label for="exampleInputEmail1">Vložte status</label>
              <input type="text" class="form-control" name="status_issue" id="status_issue" placeholder="Status vydání" required>
            </div>  
          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Vytvořit vydání</button>
          </div>
        </form>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>

 <?php include_once("parts/footer.php");?>

</body>
</html>
