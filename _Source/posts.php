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
          <h1>Spravovat články</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Domů</a></li>
            <li class="breadcrumb-item active">Přidat článek</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <tr>
            <th>Autor</th>
            <th>Název</th>
            <th>Vydání</th>
            <th>Status</th>
            <th>Počet verzí</th>
            <th>Akce</th>
          </tr>
          <?php $post->getAllPost("all"); ?>
          <tr>
            <td>Jan Žádník</td>
            <td>Testovací článek 123</td>
            <td>1/2020</td>
            <td>Nově podaný</td>
            <td>3 <a href="post-history.php">(historie verzí)<a></td>
            <td><button class="btn-xs btn-primary">Upravit</button> <button class="btn-xs btn-danger">Odstranit</button></td>
          </tr>
          <tr>
            <td>Jan Žádník</td>
            <td>Testovací článek 123</td>
            <td>1/2020</td>
            <td>Nově podaný</td>
            <td>3 <a href="post-history.php">(historie verzí)<a></td>
            <td><button class="btn-xs btn-primary">Upravit</button> <button class="btn-xs btn-danger">Odstranit</button></td>
          </tr>
          
        </table>

        
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>

</div>

<?php include_once("parts/footer.php");?>

</body>
</html>
