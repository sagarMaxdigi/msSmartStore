<?php
  $qry  = 'select * from notification where 1=1';
  $res  = mysqli_query($con,$qry);
  $qry .= ' and n_status = 0';
  $_res = mysqli_query($con,$qry);
  if($_res)
  {
    $num_rows = mysqli_num_rows($_res);
  }
  
?>
<header class="main-header">
<!-- Logo -->
<a href="index.php" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>MS</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>MS</b>SmartStore</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="fa fa-bell-o"></i>
          <?php
            if(isset($num_rows) && $num_rows > 0)
            {
          ?>
              <span class="label label-warning"><?=$num_rows?></span>
          <?php
            }
          ?>
        </a>
        <ul class="dropdown-menu">
          <?php
            if(isset($num_rows) && $num_rows > 0)
            {
          ?>
              <li class="header">You have <?=$num_rows?> new notifications</li>
          <?php
            }
          ?>
          
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
            <?php
            
              while ($row = mysqli_fetch_assoc($res)) { 
      
                $qry  = "select * from member_wishlist where wishlist_id =".$row['n_ref_id'];
                $_res = mysqli_query($con,$qry);
                $_row = mysqli_fetch_assoc($_res);     

            ?>
              <li class="<?php if($row['n_status']==0) { echo 'bg-info'; } ?>">
                <a href="customer_wishlist.php?member_id=<?=$_row['wishlist_member_id']?>&ref_id=<?=$row['n_ref_id']?>">
                  <i class="fa fa-shopping-cart text-green"></i><?=$row['n_msg']?>
                </a>
              </li>
            <?php

              }
            ?>
             
            </ul>
          </li>
          <li class="footer"><a href="#">View all</a></li>
        </ul>
      </li>
      
      <li class="dropdown user user-menu">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs">Welcome Admin</span>
        </a>
        <ul class="dropdown-menu">
         <li class="user-footer">
            <div class="pull-left">
              <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
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