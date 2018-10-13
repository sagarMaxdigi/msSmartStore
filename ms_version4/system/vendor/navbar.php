<header class="main-header">
<!-- Logo -->
<a href="index.php" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>MS</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>MS</b> SmartStore</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs">Welcome <?php echo $_SESSION['store_name'] ?></span>
        </a>
        <ul class="dropdown-menu">
         <li class="user-footer">
            <div class="pull-left">
              <a href="store_edit.php?store_id=<?php echo $_SESSION['store_id'] ?>" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
</header>