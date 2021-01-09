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
          <h1>Spravovat článek - <?php echo $post->getPostInfo("name");?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Domů</a></li>
            <li class="breadcrumb-item active">Spravovat článek</li>
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

        <?php
        $ID = ($_GET['id']);

        ?>
        
        <form role="form" action="updatePost.php?id=<?php echo $ID ?>" method="post" enctype="multipart/form-data">  <!--DODELAT UPLOAD UPRAVENYCH UDAJU-->
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Název článku</label>
              <input type="text" class="form-control" name="name_post" id="name_post" placeholder="Název článku" value="<?php echo $post->getPostInfo("name");?>" required>
            </div>  
            <div class="form-group">
              <label for="exampleInputEmail1">Autor</label>
              <input type="text" class="form-control" name="name" id="autor" placeholder="<?php echo $post->getPostInfo("author_id");?>" disabled>
            </div>   
            <div class="form-group">
              <label for="exampleInputEmail1">Status</label>
              <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $post->getPostInfo("status");?>" required>
            </div> 
            <div class="form-group">
              <label for="exampleInputEmail1">Vydání</label>
              </br>
              <?php $post->getIssuesForPost(); ?>
            </div> 
            <div class="form-group">
              <label for="exampleInputEmail1">Přidělit recenzenta</label>
              </br>
              <?php $post->getReviewers(); ?>
            </div> 
          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Upravit článek</button>
            <a href="posts.php" class="btn btn-success" role="button">Vrátit se zpět</a>
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
