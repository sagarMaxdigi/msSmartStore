<?php
	//include_once("../connection.php");
	//include_once("../functions.php");

	//$teachers=getAllTeacherApplications();
	//$teachers_cnt=count($teachers);

	//$students=getAllStudentApplications();
	//$students_cnt=count($students);
?>
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>

    <div class="pull-left info">
      <p><?php echo $_SESSION['store_name']; ?></p>
      <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
    </div>
  </div>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>

    <li <?php echo ($title=="Customer")?"class='active'":""?>>
      <a href="customer.php">
        <i class="fa fa-users"></i>
        <span>Customer Enquiry</span>
      </a>
    </li>
    <li <?php echo ($title=="Product")?"class='active'":""?>>
      <a href="products.php">
        <i class="fa fa-users"></i>
        <span>Product</span>
      </a>
    </li>
    <li <?php echo ($title=="City")?"class='active'":""?>>
      <a href="city_report.php">
        <i class="fa fa-users"></i>
        <span>City</span>
      </a>
    </li>
    <li <?php echo ($title=="Area")?"class='active'":""?>>
      <a href="area.php">
        <i class="fa fa-users"></i>
        <span>Area</span>
      </a>
    </li>
        <li>
      <a href="change_password.php">
        <i class="fa fa-users"></i>
        <span>Application Settings</span>
      </a>
    </li>

    
  </ul>
</section>
<!-- /.sidebar -->