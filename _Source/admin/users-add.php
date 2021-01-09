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
          <h1>Přidat nového uživatele</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Domů</a></li>
            <li class="breadcrumb-item active">Přidat uživatele</li>
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
        
        <form role="form" action="usersAdd.php" method="post" enctype="multipart/form-data">  <!--DODELAT UPLOAD UPRAVENYCH UDAJU-->
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Jméno</label>
              <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Jméno" value="" required>
            </div>  
            <div class="form-group">
              <label for="exampleInputEmail1">Příjmení</label>
              <input type="text" class="form-control" name="user_surname" id="user_surname" placeholder="Příjmení" required>
            </div>   
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" value="" required>
            </div> 
            <div class="form-group">
              <label for="exampleInputEmail1">Heslo</label>
              <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Heslo" value="" required>
            </div> 
            <div class="form-group">
              <label for="exampleInputEmail1">Role</label>
              <select name="role" id="role" class="form-control">
                <option value="autor">Autor</option>
                <option value="redaktor">Redaktor</option>
                <option value="recenzent">Recenzent</option>
                <option value="administrator">Administrátor</option>
              </select>
            </div>
          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Přidat uživatele</button>
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
