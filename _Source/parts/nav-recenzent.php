 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">Logos Polytechnikos</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block"><?php echo $user->getUserInfo("name") ." ". $user->getUserInfo("surname"); ?></a>
        <a href="#" class="d-block"><?php echo $user->getUserInfo("role") ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="home.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Homepage
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Články
                <i class="fas fa-angle-left right"></i>

                <span class="badge badge-info right"><?php echo($post->getTotalCount())?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="posts.php" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Přidělené články</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Vydání
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="issues.php" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Seznam vydání</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="?logout=true" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Odhlásit se
              </p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>