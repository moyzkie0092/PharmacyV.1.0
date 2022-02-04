    <!-- =====  HEADER START  ===== -->
    <?php
      $userdata="";
      $authenticated="";
      if(!$this->session->has_userdata('authenticated'))
      {
         $userdata = $this->session->userdata('user_data');
         $authenticated =  $this->session->has_userdata('google_authenticated');
      }else{
      $userdata = $this->session->userdata('auth_customer');
      $authenticated  =$this->session->has_userdata('authenticated');
      }
    ?>
    <link rel="stylesheet" href="style.css">
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
                <li class="cart"><a href="cart">My Cart</a></li>
                <?php if(!$authenticated){?>
                <li class="account"><a href="<?php echo base_url();?>login">Login</a></li>
                <li class="account"><a href="signup">Sign-up</a></li>
                <?php } ?>
                <?php if($authenticated) {?>
                <li class="account"><a href="myaccount"><?= $userdata['Full_Name'];  ?></a></li>
                <li class="account"><a href="<?= base_url('logout')?>">Logout</a></li>
                <?php } ?>
                <?php if(!$authenticated) {?>
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
              <div class="cart-item " id="count_item" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true" role="button"></div>
                <div id="cart-dropdown" class="cart-menu collapse collapses">
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
                <li> <a href="home">Home</a></li>
                <li> <a href="customer_view_product">Shop</a></li>
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
  <br>

<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="<?=base_url('assets/images/Moyz.jpg')?>"  alt="">
              </a>
              <h1><?=$userdata['Full_Name']?></h1>
              <p><?=$userdata['Email']?></p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"> <i class="fa fa-calendar"></i> My Order <span class="label label-warning pull-right r-activity">9</span></a></li>
            
              <li><a href="#"> <i class="fa fa-calendar"></i> To Pay <span class="label label-warning pull-right r-activity">9</span></a></li>
              <li><a href="#"> <i class="fa fa-edit"></i> To ship</a></li>
              <li><a href="#"> <i class="fa fa-edit"></i> To Receive</a></li>
          </ul>
      </div>
  </div>
      <div class="panel">
          <div class="panel-body bio-graph-info ">
              <h1>My Profile</h1>
            <form action="">
              <div class="row">
                  <div class="bio-row">
                    <?php if($authenticated){?>
                      <?php if($userdata['User_Name']==NULL){?>
                        <?php $userdata['User_Name']="<input type='text' placeholder ='N/A'>"?>
                      <?php }?>
                      <p><span>User Name</span>: <?=$userdata['User_Name']?></p>
                    <?php } ?>
                  </div>
                  <div class="bio-row">
                      <p><span>Full Name</span>: <?=$userdata['Full_Name']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>:<?=$userdata['Email']?></p>
                  </div>
                  <div class="bio-row">
                         <?php if($userdata['Contact_No']==NULL){?>
                           <?php $userdata['Contact_No']="<input type='Number' placeholder ='N/A'>"?>
                         <?php }?>
                      <p><span>Phone Number </span>: <?=$userdata['Contact_No']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Gender </span>: 
                        <select name="gender" value= "">
                        <?php if($userdata['Gender']==NULL){?>
                           <?php $userdata['Gender']="N/A"?>
                         <?php }?>
                          <option value="" disabled selected hidden><?=$userdata['Gender']?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </p>
                  </div>
                  <div class="bio-row">
                        <?php if($userdata['Age']==NULL){?>
                           <?php $userdata['Age']="N/A"?>
                         <?php }?>
                      <p><span>Age </span>: <?=$userdata['Age']?></p>
                  </div> 
                  <div class="bio-row">
                    <button type="submit" class="btn">Edit</button>
                  </div> 
            </form>
          </div>
        </div>
      </div>
      <div>
     </div>
   </div>
  </div>
 </div>
<div class="footer pt_60">
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-block">
            <div class="content_footercms_right">
              <div class="footer-contact">
                <div class="footer-logo mb_40"> <a href="index.html"> <img src="http://localhost/PharmacyV.1/assets/images/footer-logo.png" alt="HealthCare"> </a> </div>
                <ul>
                  <li>B-14 Collins Street West Victoria 2386</li>
                  <li>(+123) 456 789 - (+024) 666 888</li>
                  <li>Contact@yourcompany.com</li>
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
              <button class="btn add_cart">Subscribe</button>
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
  </div>
  <script src="http://localhost/PharmacyV.1/assets/js/jQuery_v3.1.1.min.js"></script>
  <script src="http://localhost/PharmacyV.1/assets/js/owl.carousel.min.js"></script>
  <script src="http://localhost/PharmacyV.1/assets/js/bootstrap.min.js"></script>
  <script src="http://localhost/PharmacyV.1/assets/js/jquery.magnific-popup.js"></script>
  <script src="http://localhost/PharmacyV.1/assets/js/jquery.firstVisitPopup.js"></script>
  <script src="http://localhost/PharmacyV.1/assets/js/custom.js"></script>
</body>
</html>
<script>
  
$(document).ready(function(){
  
 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"http://localhost/PharmacyV.1/CustomerViewProduct/fetch_product",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

<script>
function load_product_data(page)
 {
  $.ajax({
   url:"http://localhost/PharmacyV.1/CustomerViewProduct/pagination/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#result').html(data.result);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_product_data(page);
 });

 
  load_product_data(1);

</script>

<script>
$(document).ready(function(){
  $("#add").on("click",".add_cart", function(){
  alert("success");
 });
$('.add_cart').click(function()
{
   var product_id = $(this).data("productid");
   var picture = $(this).data("picture");
   var product_name = $(this).data("productname");
   var product_price = $(this).data("price");
   var item_count = $(this).data("item");
   var quantity = 1;
   product_name = (product_name[0] + " " + product_name[1] );
   $.ajax({
    url:"http://localhost/PharmacyV.1/CustomerCart/add",
    method:"POST",
    data:{product_id:product_id,picture:picture, product_name:product_name, product_price:product_price, quantity:quantity},
    success:function(data)
    {
      alert("Product Added into Cart");
     $('#cart_detail').html(data);
     $(count_item).html(item_count);
     $('#' + product_id).val('');
    }
   });

});
 $('#cart_detail').load("http://localhost/PharmacyV.1/CustomerCart/load");
 $('#count_item').load("http://localhost/PharmacyV.1/CustomerCart/count_item");
 
 
 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this?"))
  {
   $.ajax({
    url:"http://localhost/PharmacyV.1/CustomerCart/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
     alert("Product removed from Cart");
     $('#cart_detail').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

});
</script>