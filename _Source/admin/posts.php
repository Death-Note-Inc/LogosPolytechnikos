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
          <h1>Spravovat články</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Domů</a></li>
            <li class="breadcrumb-item active">Spravovat články</li>
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
            <th>Recenzent</th>
            <th>Posudky</th>
            <th>Akce</th>
          </tr>
          <?php           
            if ($user->getUserInfo("role") == "autor") {
              $userID = $user->getUserInfo("id");
              $post->getAllPostUser($userID); 
            }
            if ($user->getUserInfo("role") == "recenzent") {
              $userID = $user->getUserInfo("id");
              $post->getAllPostReviewer($userID); 
            }
            if ($user->getUserInfo("role") == "redaktor") {
              $post->getAllPost();
            }
            if ($user->getUserInfo("role") == "administrator") {
              $post->getAllPost();
            }
            if ($user->getUserInfo("role") == "sefredaktor") {
              $post->getAllPostView();
            }

            if ( isset($_GET['success']) && $_GET['success'] == 1 )
            {
                // treat the succes case ex:
                $message = "Článek byl úspěšně upraven.";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
          ?> 
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
