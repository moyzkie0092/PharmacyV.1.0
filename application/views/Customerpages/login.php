<body>
<!-- =====  LODER  ===== -->
 <div class="loder"></div>
 <div class ="  text-center" style="color:white;background-color:#c71334">PharmacyOnlineShop is on Alpha ; Some wording and feature are not finish.Thank you</div>
  <div class="wrapper">
    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <ul class="header-top-left">
                <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> <img src="<?php base_url()?>assets/images/English-icon.gif" alt="img"> English <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#"><img src="<?php base_url()?>assets/images/English-icon.gif" alt="img"> English</a></li>
                    <li><a href="#"><img src="<?php base_url()?>assets/images/French-icon.gif" alt="img"> French</a></li>
                    <li><a href="#"><img src="<?php base_url()?>assets/images/German-icon.gif" alt="img"> German</a></li>
                  </ul>
                </li>
                <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> USD <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                    <li><a href="#">USD</a></li>
                    <li><a href="#">EUR</a></li>
                    <li><a href="#">AUD</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="header-top-right text-right">
              <li class="cart"><a href="send">My Cart</a></li>
              <?php if(!$this->session->has_userdata('authenticateds')){?>
                <li class="account"><a href="<?= base_url('My_controller/login_page')?>">Login</a></li>
                <li class="account"><a href="<?=base_url('My_controller/signup_page')?>">Sign-up</a></li>
                <?php } ?>
                <?php if($this->session->has_userdata('authenticateds')) {?>
                <li class="account"><a href="myaccount"><?= $this->session->userdata('user_data')['Full_Name'];  ?></a></li>
                <li class="account"><a href="<?= base_url('logout')?>">Logout</a></li>
                <?php } ?>
                <?php if(!$this->session->has_userdata('authenticateds')) {?>
                <li class="account"><a href="myaccount">My Account</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <nav class="navbar">
            <div class="navbar-header mtb_20"> <a class="navbar-brand" href="home"> <img alt="HealthCared" src="<?= base_url();?>assets/images/logo.png"> </a> </div>
            <div class="header-right pull-right mtb_50">
              <button class="navbar-toggle pull-left" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
              <div class="shopping-icon">
                <div class="cart-item " id="count_item" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true" role="button">Item : <span class="cart-qty"></span></div>
                <div id="cart-dropdown" class="cart-menu collapse">
                 <ul>
                    <li id="cart_detail">
                      
                    </li>
                  </ul>
                </div>
              </div>
              <div class="main-search pull-right">
                <div class="search-overlay">
                  <!-- Close Icon -->
                  <a href="javascript:void(0)" class="search-overlay-close"></a>
                  <!-- End Close Icon -->
                  <div class="container">
                    <!-- Search Form -->
                    <form role="search" id="searchform" action="/search" method="get">
                      <label class="h5 normal search-input-label">Enter keywords To Search Entire Store</label>
                      <input value="" name="q" placeholder="Search here..." type="search">
                      <button type="submit"></button>
                    </form>
                    <!-- End Search Form -->
                  </div>
                </div>
                <div class="header-search"> <a id="search-overlay-btn"></a> </div>
              </div>
            </div>
            <div class="collapse navbar-collapse js-navbar-collapse pull-right">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="<?=base_url('My_controller/home')?>">Home</a></li>
                <li> <a href="<?=base_url('My_controller/view_product')?>">Shop</a></li>
                <li> <a href="blog_page.html">Blog</a></li>
                <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Collection </a>
                  <ul class="dropdown-menu mega-dropdown-menu row">
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">Women's</li>
                        <li><a href="#">Unique Features</a></li>
                        <li><a href="#">Image Responsive</a></li>
                        <li><a href="#">Auto Carousel</a></li>
                        <li><a href="#">Newsletter Form</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Good Typography</a></li>
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">Man's</li>
                        <li><a href="#">Unique Features</a></li>
                        <li><a href="#">Image Responsive</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Auto Carousel</a></li>
                        <li><a href="#">Newsletter Form</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Good Typography</a></li>
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">Children's</li>
                        <li><a href="#">Unique Features</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Image Responsive</a></li>
                        <li><a href="#">Auto Carousel</a></li>
                        <li><a href="#">Newsletter Form</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Good Typography</a></li>
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li id="myCarousel" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="item active"> <a href="#"><img src="<?= base_url();?>assets/images/menu-banner1.jpg" class="img-responsive" alt="Banner1"></a></div>
                            <!-- End Item -->
                            <div class="item"> <a href="#"><img src="<?= base_url();?>assets/images/menu-banner2.jpg" class="img-responsive" alt="Banner1"></a></div>
                            <!-- End Item -->
                            <div class="item"> <a href="#"><img src="<?= base_url();?>assets/images/menu-banner3.jpg" class="img-responsive" alt="Banner1"></a></div>
                            <!-- End Item -->
                          </div>
                          <!-- End Carousel Inner -->
                        </li>
                        <!-- /.carousel -->
                      </ul>
                    </li>
                  </ul>
                </li>
                <!-- <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages </a>
                  <ul class="dropdown-menu">
                    <li> <a href="contact_us.html">Contact us</a></li>
                    <li> <a href="cart_page.html">Cart</a></li>
                    <li> <a href="checkout_page.html">Checkout</a></li>
                    <li> <a href="product_detail_page.html">Product Detail Page</a></li>
                    <li> <a href="single_blog.html">Single Post</a></li>
                  </ul>
                </li> -->
                <li> <a href="about.html">About us</a></li>
              </ul>
            </div>
            <!-- /.nav-collapse -->
          </nav>
        </div>
      </div>
      <div class="header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-3">
              <div class="category">
                <div class="menu-bar" data-target="#category-menu,#category-menu-responsive" data-toggle="collapse" aria-expanded="true" role="button">
                  <h4 class="category_text">Top category</h4>
                  <span class="i-bar"><i class="fa fa-bars"></i></span></div>
              </div>
              <div id="category-menu-responsive" class="navbar collapse " aria-expanded="true" style="" role="button">
                <div class="nav-responsive">
                  <ul class="nav  main-navigation collapse in">
                    <li><a href="#">Pharmacy</a></li>
                    <li><a href="#">Health</a></li>
                    <li><a href="#">Beauty</a></li>
                    <li><a href="#">Vitamins</a></li>
                    <li><a href="#">Sweating</a></li>
                    <li><a href="#">Coughs & Colds</a></li>
                    <li><a href="#">Hair Loss</a></li>
                    <li><a href="#">Weight Loss</a></li>
                    <li><a href="#">Antifungals</a></li>
                    <li><a href="#">Pain Relief</a></li>
                    <li><a href="#">Stop Smoking</a></li>
                    <li><a href="#">Skin Conditions</a></li>
                    <li><a href="#">Top Brands</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9">
              <div class="header-bottom-right offers">
              	<div class="marquee"><span><i class="fa fa-circle" aria-hidden="true"></i>It's Sexual Health Week!</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Our 5 Tips for a Healthy Summer</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Sugar health at risk?</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>The Olay Ranges - What do they do?</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Body fat - what is it and why do we need it?</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Can a pillow help you to lose weight?</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- =====  HEADER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 ">
          <div id="category-menu" class="navbar collapse mb_40 hidden-sm-down in" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
              <ul class="nav  main-navigation collapse in ">
                <li><a href="#">Pharmacy</a></li>
                <li><a href="#">Health</a></li>
                <li><a href="#">Beauty</a></li>
                <li><a href="#">Vitamins</a></li>
                <li><a href="#">Sweating</a></li>
                <li><a href="#">Coughs & Colds</a></li>
                <li><a href="#">Hair Loss</a></li>
                <li><a href="#">Weight Loss</a></li>
                <li><a href="#">Antifungals</a></li>
                <li><a href="#">Pain Relief</a></li>
                <li><a href="#">Stop Smoking</a></li>
                <li><a href="#">Skin Conditions</a></li>
                <li><a href="#">Top Brands</a></li>
              </ul>
            </div>
          </div>
          <br>
           <div class="left_banner left-sidebar-widget mt_30 mb_50"> <a href="#"><img src="<?= base_url();?>assets/images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
          <!-- contact  -->
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="panel-login">
                <div class="panel-heading">
                  <div class="row mb_20">
                    <div class=" text-center">
                      <a href="" class="" id="login-form-link">Login</a>
                    </div>
                    <!-- <div class="col-xs-6">
                      <a href="#" id="register-form-link">Register</a>
                    </div> -->
                  </div>
                  <hr>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                    <?php if($this->session->flashdata('statuss')):?>
                        <div class="alert alert-success alert-dismissible text-center " role="alert" id="hide">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <i class="icon fa fa-cheack"></i> <?= $this->session->flashdata('statuss');?>
                        </div>
                        <?php unset($_SESSION['statuss']);?>
                    <?php  endif; ?>
                      <form id="login-form" action="<?=base_url('My_controller/login');?>" method="POST">
                        <div class="form-group">
                          <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
                          <span  class="text-danger"><?php echo form_error('email');?></span>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                          <span  class="text-danger"><?php echo form_error('password');?></span>
                        </div>
                        <div class="form-group text-center">
                          <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                          <label for="remember"> Remember Me</label>
                        </div>
                      
                     
                        <div class=" text-center mb-3 ">
                        <button type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control md-6 btn btn-login" >Log-in</button>
                          <p>- OR -</p>
                          <a href="#" class="btn  btn-block ">
                            <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
                          </a>

                          <a href="<?=$data?>" class=" btn-block btn">
                             <i class="fa fa-google mr-2"></i> Sign in using Google+
                          </a>
                        </div>
                     
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="text-center">
                                <a href="<?=base_url('My_controller/forgotpass_page')?>" tabindex="5" class="forgot-password">Forgot Password/Account Recovery</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Single Blog  -->
  <!-- End Blog   -->
  <!-- =====  CONTAINER END  ===== -->
  <!-- =====  FOOTER START  ===== -->
  <div class="footer pt_60">
    <div class="container">
      <div class="row">
        <div class="col-md-3 footer-block">
          <div class="content_footercms_right">
            <div class="footer-contact">
            <div class="footer-title ptb_20">Address</div>
                <ul>
                  <li>136 velasco ext,barangay maligaya camelot street caloocan city </li>
                  <li>(+63) 998 7654 321 - (+63) 912 345 6789</li>
                  <li>Pharmacy2020@gmail.com</li>
                </ul>
                <div class="social_icon">
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-2 footer-block">
          <h6 class="footer-title ptb_20">Categories</h6>
          <ul>
            <li><a href="#">Medicines</a></li>
            <li><a href="#">Healthcare</a></li>
            <li><a href="#">Mother & Baby</a></li>
            <li><a href="#">Vitamins</a></li>
            <li><a href="#">Toiletries</a></li>
            <li><a href="#">Skincare</a></li>
          </ul>
        </div>
        <div class="col-md-2 footer-block">
          <h6 class="footer-title ptb_20">Information</h6>
          <ul>
            <li><a href="contact.html">Specials</a></li>
            <li><a href="#">New Products</a></li>
            <li><a href="#">Best Sellers</a></li>
            <li><a href="#">Our Stores</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
        </div>
        <div class="col-md-2 footer-block">
          <h6 class="footer-title ptb_20">My Account</h6>
          <ul>
            <li><a href="#">Checkout</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">My Orders</a></li>
            <li><a href="#">My Credit Slips</a></li>
            <li><a href="#">My Addresses</a></li>
            <li><a href="#">My Personal Info</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="ptb_20">SIGN UP OUR NEWSLETTER</h6>
          <p class="mt_10 mb_20">For get offers from our favorite brands & get 20% off for next </p>
          <div class="form-group">
            <input class="mb_20" type="text" placeholder="Enter Your Email Address">
            <button class="btn">Subscribe</button>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom mt_60 ptb_10">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="copyright-part">@ 2017 All Rights Reserved HealthCare</div>
          </div>
          <div class="col-sm-6">
            <div class="payment-icon text-right">
              <ul>
                <li><i class="fa fa-cc-paypal "></i></li>
                <li><i class="fa fa-cc-stripe"></i></li>
                <li><i class="fa fa-cc-visa"></i></li>
                <li><i class="fa fa-cc-discover"></i></li>
                <li><i class="fa fa-cc-mastercard"></i></li>
                <li><i class="fa fa-cc-amex"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- =====  FOOTER END  ===== -->
  <a id="scrollup">Scroll</a>