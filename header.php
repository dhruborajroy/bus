<?php  
session_start();
session_regenerate_id();
require('./inc/constant.inc.php');
require('./inc/connection.inc.php');
require('./inc/function.inc.php');
require_once("./inc/smtp/class.phpmailer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Aduca -  Education HTML Template</title>

    <!-- Google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"> -->

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="images/favicon.png">

    <!-- inject:css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/line-awesome.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/fancybox.css">
    <link rel="stylesheet" href="css/tooltipster.bundle.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- end inject -->
</head>
<body>

<!-- start cssload-loader 
<div class="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
<header class="header-menu-area">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-widget">
                        <ul class="header-action-list">
                            <li><a href="#"><span class="la la-phone mr-2"></span>123-456-789</a> </li>
                            <li><a href="#"><span class="la la-envelope-o mr-2"></span>contact@aduca.com</a></li>
                        </ul>
                    </div><!-- end header-widget -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="header-widget d-flex align-items-center justify-content-end">
                        <div class="header-right-info">
                            <ul class="header-social-profile">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div><!-- end header-right-info -->
                        <div class="header-right-info">
                            <!--<div class="shop-cart">
                                <ul>
                                    <li>
                                        <p class="shop-cart-btn d-flex align-items-center">
                                            <i class="la la-shopping-cart"></i>
                                            <span class="product-count ml-1">2</span>
                                        </p>
                                        <ul class="cart-dropdown-menu">
                                            <li>
                                                <a href="shopping-cart.html" class="cart-link">
                                                    <img src="images/small-img.jpg" alt="product">
                                                </a>
                                                <p class="cart-info">
                                                    <a href="shopping-cart.html">
                                                        The Complete Financial Analyst Course 2019
                                                    </a>
                                                    <span class="cart__author">Josh Purdila</span>
                                                    <span class="cart__price">
                                                           $22.99 <span class="before-price">$55.99</span>
                                                    </span>
                                                </p>
                                            </li>
                                            <li>
                                                <a href="shopping-cart.html" class="cart-link">
                                                    <img src="images/small-img.jpg" alt="product">
                                                </a>
                                                <p class="cart-info">
                                                    <a href="shopping-cart.html">
                                                        The Complete Financial Analyst Course 2019
                                                    </a>
                                                    <span class="cart__author">Josh Purdila</span>
                                                    <span class="cart__price">
                                                           $22.99 <span class="before-price">$55.99</span>
                                                    </span>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="cart-total">Total: $44.99<span class="before-price">$110.99</span></p>
                                            </li>
                                            <li>
                                                <a class="theme-btn w-100 text-center" href="shopping-cart.html">go to Cart</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- end shop-cart -->
                        </div><!-- end header-right-info -->
                        <div class="header-right-info">
                            <ul class="header-action-list">
                                <li><a href="login.php">Login</a></li>
                                <li>or</li>
                                <li><a href="signup.php">Register</a></li>
                            </ul>
                        </div><!-- end header-right-info -->
                    </div><!-- end header-widget -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-top -->
    <div class="header-menu-content">
        <div class="container-fluid">
            <div class="main-menu-content">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-box">
                            <a href="index.php" class="logo"><img src="images/logo.png" alt="logo"></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-10">
                        <div class="menu-wrapper">
                            <!--<div class="contact-form-action">
                                <form method="post">
                                    <div class="input-box">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="search" placeholder="Search for anything">
                                            <span class="la la-search search-icon"></span>
                                        </div>
                                    </div>
                                </form>
                            </div>-->
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <?php  if(!isset($_SESSION['USER_LOGIN'])){?>
                                        <li><a href="signup.php">Register</a></li>
                                    <?php }?>
                                    <li><a href="verify-ticket.php">Verify Ticket</a></li>
                                    <li><a href="contact.php">contact</a></li>                                    
                                    <?php  if(isset($_SESSION['USER_LOGIN'])){?>
                                    <?php }?>
                                    <li class="theme-btn">
                                        <?php  if(!isset($_SESSION['USER_LOGIN'])){?>
                                            <a href="login.php" class="text-white">login</a>
                                        <?php  }else{ ?>
                                            <a href="dashboard.php" class=""> Hi! <?php echo $_SESSION['USER_NAME']?></a>
                                            <ul class="dropdown-menu-item">
                                                <li><a href="logout.php">logout</a></li>
                                            </ul>  
                                        <?php }?>                                                                     
                                    </li><!-- end logo-right-button -->
                                </ul><!-- end ul -->
                            </nav><!-- end main-menu -->
                            <!-- <div class="logo-right-button">
                                <a href="login.php" class="theme-btn">Login</a>
                            </div>end logo-right-button -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-10 -->
                </div><!-- end row -->
            </div>
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-content -->
</header><!-- end header-menu-area -->
<!--======================================
        END HEADER AREA
======================================-->
