
<body class="hold-transition sidebar-mini layout-fixed">
<div class="loder"></div>
  <div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <p class="brand-text font-weight-light text-center ">Pharmacy</p>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://icons.iconarchive.com/icons/aha-soft/free-large-boss/512/Admin-icon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php if($this->session->has_userdata('admin_authenticated')){ ?>
          <a href="#" class="d-block"><?=  $this->session->userdata('auth_admin')['Full_Name']; ?></a>
          <?php } ?>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item ">
            <a href="<?=base_url('My_controller/admin_dashboard')?>" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>
                  Orders
                  <span class="badge badge-success right">2</span>
              </p>
            </a>
        </li>
          <li class="nav-item">
               <a href="<?=base_url('My_controller/display_product')?>" class="nav-link  active ">  
                  <i class="nav-icon fas fa-capsules"></i>
                  <p>
                    Products
                    <span class="badge badge-success right">2</span>
                 </p>
              </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link  ">
              <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Add Stock
              </p>
            </a>
        </li>
          <li class="nav-item">
            <a href="<?=base_url('My_controller/display_category')?>" class="nav-link ">
                <i class="nav-icon fas fa-baby-carriage"></i>
                <p>
                  Product Category
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url('My_controller/display_supplier')?>" class="nav-link ">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Supplier
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  User Details
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link ">
                    <i class="far fa-user nav-icon"></i>
                    <p>Customer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-user-nurse nav-icon"></i>
                    <p>Staff</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-ambulance nav-icon"></i>
                    <p>Delievery</p>
                  </a>
                </li>
              </ul>
        </li>
        <li class="nav-item">
            <a href="<?=base_url('My_controller/logout_admin')?>" class="nav-link  ">
               <i class=" nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Log-out
              </p>
            </a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!---Start Modal-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header " style="background-color:#335f8f!important">
        <h3 class="modal-title text-white" id="exampleModalLabel">ADD PRODUCT</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark">
        <form action="<?= base_url('My_controller/addproduct')?>" method="POST" enctype="multipart/form-data">
          <div class="card-body ">
          <div class="form-group ">
              <label >Product Image</label>
              <input type="file" name="p_image" class="form-control"  placeholder="Enter..." required>
            </div>
            <div class="form-group ">
              <label >Product Name</label>
              <input type="text" name="p_name" class="form-control"  placeholder="Enter..." required>
            </div>
            <div class="form-group">
              <label >Stock</label>
              <input type="text" name="p_stock" class="form-control"  placeholder="Enter..."  required>
            </div>
            <div class="form-group">
              <label >Price</label>
              <input type="text" name="p_price" class="form-control" placeholder="Enter..." required>
            </div>
            <div class="form-group">
              <label >Date Manufacture</label>
              <input type="date" id="p_date" name="p_date" class="form-control"  required>
            </div>
            <div class="form-group">
              <label >Date Expired</label>
              <input type="date" id="p_date_exp" name="p_date_exp" class="form-control"  required>
            </div>
            <div class="form-group">
              <label>Product Detail</label>
              <textarea class="form-control" name="p_detail" rows="3" placeholder="Enter ..." required></textarea>
            </div>
            <div class="form-group">
              <label>Category</label>
              <select class="form-control "  name="p_category" required>
                <option value="" disabled selected hidden>Select Category</option>
                <?php foreach($category as $row){ ?>
                <option value="<?=$row->Category_id?>"><?=$row->Category_Name?></option>
               <?php } ?>
              </select>
            </div>
            <div class="form-group" >
              <label>Supplier</label>
              <select class="form-control " name="p_supplier" required>
                <option value="" disabled selected hidden>Select Supplier</option>
                <?php foreach($supplier as $row){ ?>
                  <option value="<?=$row->Supplier_id?>"><?=$row->Name?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <!---End modal-->

 <!---- Start Editmodal--->
 <div class="modal fade" id="edit" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  text-center" style="background-color:#335f8f!important">
        <h3 class="modal-title  text-white" id="">EDIT PRODUCT</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark">
        <form action="<?= base_url('My_controller/update_product')?>" method="POST" >
          <div class="card-body ">
          <div class="form-group ">
              <label >Product_ID</label>
              <input type="number"   id="e_id" name="e_id" class="form-control"  readonly>
            </div>
            <div class="form-group ">
              <label >Product Name</label>
              <input type="text"  id="e_name" name="e_name" class="form-control"  placeholder="Enter..." required>
            </div>
            <div class="form-group">
              <label >Stock</label>
              <input type="number" id="e_stock" name="e_stock" class="form-control"  placeholder="Enter..."  required>
            </div>
            <div class="form-group">
              <label >Price</label>
              <input type="number" id="e_price" name="e_price" class="form-control" placeholder="Enter..." required>
            </div>
            <div class="form-group">
              <label >Date Manufacture</label>
              <input type="date" id="e_date" name="e_date" class="form-control"  required>
            </div>
            <div class="form-group">
              <label >Date Expired</label>
              <input type="date" id="e_date_exp" name="e_date_exp" class="form-control"  required>
            </div>
            <div class="form-group">
              <label>Category</label>
              <select class="form-control " id="e_category"  name="e_category" required>
                <option disabled selected hidden>Select Category</option>
               <?php foreach($category as $row){ ?>
                <option ><?=$row->Category_Name?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group" >
              <label>Supplier</label>
              <select class="form-control " id="e_supplier" name="e_supplier"  required>
                <?php foreach($supplier as $row){ ?>
                  <option ><?=$row->Name?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-success ">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <!---End modal-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
         <div class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#add">
          <i class="fas fa-cart-plus nav-icon"></i>
           Add new
          </div>
          <?php
             $flashdata="";
             $unsetflash_data="";
             if($this->session->flashdata('a_status_danger'))
             {
                $flashdata=$this->session->flashdata('a_status_danger');
                $unsetflash_data="a_status_danger";
                $alert_danger = 'class="alert alert-danger alert-dismissible text-center"';
             }else{
                $flashdata=$this->session->flashdata('a_status_success');
                $alert_danger = 'class="alert alert-success alert-dismissible text-center"';
                $unsetflash_data="a_status_success";
             }
          ?>
          <?php if($flashdata){?>
            <div <?=$alert_danger?> role="alert" id="hide">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
               <i class="icon fa fa-cheack"></i> <?=$flashdata;?>
            </div>
            <?php unset($_SESSION[$unsetflash_data]);?>
          <?php }?>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="product" class="table table-bordered  table-hover ">
            <thead style="font-size: 11.4px"  class="bg-dark">
            <tr>
              <th>Picture</th>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Date Manufacture</th>
              <th>Date Exp</th>
              <th>Remaining Days</th>
              <th>Product Category</th>
              <th>supplier</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data->result() as $row) { ?>
             <?php 
                if($row->Stock < 20)
                {
                    $Stock = "<span class='badge  badge-pill  badge-danger'>$row->Stock pcs</span>";
                }else{
                    $Stock = "<span class='badge  badge-pill  badge-success'>$row->Stock pcs</span>";
                }
                
                $r_days=" ";
                $exp = "";
                if( $row->r_days > 0 && $row->r_days <=30 ){
                  $r_days = "<span class='badge  badge-pill  badge-warning'>$row->r_days Days</span>";
                }elseif($row->r_days <= 0)
                {
                  $r_days = "<span class='badge  badge-pill  badge-danger'>Expired</span>";
                }else{
                  $r_days = "<span class='badge  badge-pill  badge-success'>$row->r_days Days</span>";
                }
             ?>
            <tr class="text-center ">
              <td>  
                <img  style="width:36px;" alt="Avatar" class="" src="<?=base_url('assets/images/product/')?><?=$row->Picture?>">
              </td>
              <td ><?= $row->Product_id?></td>
              <td class="text"><?= $row->Product_Name?></td>
              <td><?=$Stock?></td>
              <td><span class="badge  badge-pill  badge-warning "><?=$row->Price.' Php'?></span></td>
              <td><?=$row->Date_Manufacture?></td>
              <td><?=$row->Date_Exp?></td>
              <td><?=$r_days?></td>
              <td><?= $row->Category_Name?></td>
              <td><?= $row->Name?></td>
              <td>
                <button class="btn btn-sm btn-primary editbtn" data-toggle="modal" data-target="#edit">
                  <span class="fas fa-pencil-alt"></span>

                  </button>
                  <button class="btn btn-sm btn-info ">
                <span class="far fa-eye"></span>
               
                </button>
                <a href="<?=base_url('My_controller/delete_product')?>?Product_id=<?=$row->Product_id?>" class="btn btn-sm btn-danger">
                  <span class="fas fa-trash"></span>
                
                </a>
              </td>
            </tr>
            <?php }?>
            </tbody>
            <tfoot style="font-size: 11.4px"class="bg-dark">
            <tr>
              <th>Picture</th>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Date Manufacture</th>
              <th>Date Exp</th>
              <th>Remaining Days</th>
              <th>Product Category</th>
              <th>supplier</th>
              <td>Action</td>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

                      