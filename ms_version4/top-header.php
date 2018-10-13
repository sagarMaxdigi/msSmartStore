<!-- header -->
<div id="header">
    <div class="container">
        <div class="col-md-3">
            <!-- Logo -->
            <div class="header-logo">
                <a class="logo" href="<?=__base_url?>index.php">
                    <img src="./img/logo.jpg" alt="">
                </a>
            </div>
            <!-- /Logo -->
        </div>
<div class="col-md-5">
            <!-- Search -->
            <div class="header-search">
                <form action="search.php" method="post">
                    <input class="input" name="search_qry" type="text" placeholder="Enter your keyword">
                    
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                </form>
                <?php if(isset($error)) echo $error; ?>
            </div>
            <!-- /Search -->
        </div>
        <div class="col-md-3 pull-right">
            <ul class="header-btns">
                <!-- Account -->
                <li class="header-account dropdown default-dropdown">
                    <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                        <div class="header-btns-icon">
                            <i class="fa fa-user-o"></i>
                        </div>

                        <?php
                        if(isset($_SESSION['member_fname']) && $_SESSION['member_fname'] !='')
                            {
                        ?>
                                <strong class="text-uppercase"><?=$_SESSION['member_fname']?>&nbsp;<i class="fa fa-caret-down"></i></strong>
                        <?php
                            }
                            else
                            {
                        ?>
                                <strong class="text-uppercase">My Account&nbsp;<i class="fa fa-caret-down"></i></strong>
                        <?php
                            }
                        ?>
                        
                    </div>
                    
                    <?php /*?><a href="login.php">Login</a> / <a href="register.php">Register</a><?php */?>
                    
                    <ul class="custom-menu">
                        <li><a href="my-account.php"><i class="fa fa-user-o"></i> My Account</a></li>
                        <li><a href="my-wishlist.php"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                        <?php
                        if(isset($_member_id) && $_member_id!="")
                        {
                        ?>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                        <?php
                        }
                        ?>
                        
                        <?php /*?><li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                        <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                        <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
                        <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li><?php */?>
                    </ul>
                </li>
                <!-- /Account -->

                <?php /*?><!-- Cart -->
                <li class="header-cart dropdown default-dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <div class="header-btns-icon">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="qty">3</span>
                        </div>
                        <strong class="text-uppercase">My Cart:</strong>
                        <br>
                        <span>35.20$</span>
                    </a>
                    <div class="custom-menu">
                        <div id="shopping-cart">
                            <div class="shopping-cart-list">
                                <div class="product product-widget">
                                    <div class="product-thumb">
                                        <img src="./img/thumb-product01.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                    </div>
                                    <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="product product-widget">
                                    <div class="product-thumb">
                                        <img src="./img/thumb-product01.jpg" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                    </div>
                                    <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="shopping-cart-btns">
                                <button class="main-btn">View Cart</button>
                                <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- /Cart --><?php */?>

                <!-- Mobile nav toggle-->
                <li class="nav-toggle">
                    <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                </li>
                <!-- / Mobile nav toggle -->
            </ul>
        </div>
        </div>
    </div>
    <!-- header -->