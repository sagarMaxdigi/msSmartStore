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
      <p>Admin</p>
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
        <span>Customer Report</span>
      </a>
    </li>
    <li <?php echo ($title=="Store")?"class='active'":""?>>
      <a href="store_report.php">
        <i class="fa fa-users"></i>
        <span>Store</span>
      </a>
    </li>
    
    <li <?php echo ($title=="Product")?"class='active'":""?>>
      <a href="products.php">
        <i class="fa fa-users"></i>
        <span>Product</span>
      </a>
    </li>
    <li <?php echo ($title=="Super Category")?"class='active'":""?>>
      <a href="super_category.php">
        <i class="fa fa-users"></i>
        <span>Super Category</span>
      </a>
    </li>
    <li <?php echo ($title=="Category")?"class='active'":""?>>
      <a href="category.php">
        <i class="fa fa-users"></i>
        <span>Category</span>
      </a>
    </li>
    <li <?php echo ($title=="Sub Category")?"class='active'":""?>>
      <a href="sub_category.php">
        <i class="fa fa-users"></i>
        <span>Sub Category</span>
      </a>
    </li>
    <li <?php echo ($title=="Super Banner")?"class='active'":""?>>
      <a href="super_banner.php">
        <i class="fa fa-users"></i>
        <span>Super Banner</span>
      </a>
    </li>
    <li <?php echo ($title=="Main Slider")?"class='active'":""?>>
      <a href="main_slider.php">
        <i class="fa fa-users"></i>
        <span>Main Slider</span>
      </a>
    </li>
    <li <?php echo ($title=="Store Report")?"class='treeview active'":"class='treeview'"?>>
              <a href="#">
                <i class="fa fa-edit"></i> <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu <?php echo ($title=="Store Report")?"menu-open":""?>">
                <li <?php echo ($title=="Store Report")?"class='active'":""?>><a href="store_enquiry_report.php"><i class="fa fa-database"></i>Store Enquiry Report</a></li>
              </ul>
	 </li>
	
    <li class="treeview <?php echo ($title=='Brands' || $title=='Color' || $title=='Size' || $title=='City' || $title=='Area')?'active menu-open':''?> " >
              <a href="#">
                <i class="fa fa-edit"></i> <span>Application Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu"> 
				<li <?php echo ($title=="Brands")?"class='active'":""?>>
				  <a href="brand.php">
					<i class="fa fa-users"></i>
					<span>Brands</span>
				  </a>
				</li>
    <li <?php echo ($title=="Color")?"class='active'":""?>>
      <a href="color.php">
        <i class="fa fa-users"></i>
        <span>Colors</span>
      </a>
    </li>
    <li <?php echo ($title=="Size")?"class='active'":""?>>
      <a href="size.php">
        <i class="fa fa-users"></i>
        <span>Sizes</span>
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
		</ul>
    </li>
    <li <?php echo ($title=="Teacher Applications")?"class='active'":""?>>
      <a href="profile.php">
        <i class="fa fa-users"></i>
        <span>Application Settings</span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->