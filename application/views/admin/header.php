<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rift Raff Admin</title>


        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo base_url(); ?>admin/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo base_url(); ?>admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>admin/build/css/custom.min.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="<?php echo base_url(); ?>admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="<?php echo base_url(); ?>admin/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link href="<?php echo base_url(); ?>admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="<?php echo base_url(); ?>admin/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- starrr -->
        <link href="<?php echo base_url(); ?>admin/vendors/starrr/dist/starrr.css" rel="stylesheet">

        <!-- Dropzone.cs -->
        <link href="<?php echo base_url(); ?>admin/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



        <!-- 2 -->
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo base_url(); ?>admin" class="site_title"><img src="/images/admin_logo.png" style="height:40px;width:40px;border-radius:50%;border:1px solid #fff;padding:5px;" /><span>Rift Raff Admin</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <?php foreach ($admin_profile as $dd) { ?>


                                    <img src="<?php echo base_url() . $dd->user_image; ?>" alt="..." class="img-circle profile_img">
                                </div>
                                <div class="profile_info">
                                    <span>Welcome,</span>
                                    <h2><?php echo $dd->first_name . "" . $dd->last_name; ?></h2>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- /menu profile quick info -->
                        <div class="clearfix"></div>
                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                
                                <ul class="nav side-menu">

                                    <?php
                                    if (($prod[0]->counter > 0)) {
                                        ?>
                                        <li><a href="/index.php/admin/pending_products"><i class="fa fa-flag-o"></i> <span style = "color:#FEE101;">  <?php echo $prod[0]->counter; ?> Product entries pending </span></a></li>
                                    <?php } if (($user[0]->counter > 0)) {
                                        ?>


                                        <li><a href="/index.php/admin/pending_users"><i class="fa fa-flag-o"></i>  <span style = "color:#FEE101;"> <?php echo $user[0]->counter; ?> User entries  pending <span> </a></li>
                                                        <?php
                                                    }
                                                    ?>
                                                    <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/manage_dealers">Manage Dealers</a></li>
                                                            <!-- <li><a href="/index.php/admin/manage_sellers">Manage Sellers</a></li>-->
                                                            <li><a href="/index.php/admin/manage_user">Manage Consumers</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a><i class="fa fa-th-list"></i> Inventory Management <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/manage_dealer_inventory">Dealer Inventory</a></li>
                                                            <li><a href="/index.php/admin/manage_seller_inventory">Seller Inventory</a></li>
                                                            <li><a href="/index.php/admin/manage_products">Products</a></li>
                                                            <li><a><i class="fa fa-cloud-download"></i> Import Csv <span class="fa fa-chevron-down"></span></a>
                                                                <ul class="nav child_menu">
                                                                    <li><a href="/index.php/admin/view_format">CSV format demo</a></li>
                                                                    <li><a href="/index.php/admin/import">Import</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>


                                                    <li><a><i class="fa fa-table"></i> Attributes <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/manage_cat1">Guitar</a></li>
                                                            <li><a href="/index.php/admin/manage_cat2">Amps & Cabinets</a></li>
                                                            <li><a href="/index.php/admin/manage_cat3">Pedals</a></li>
                                                            <li><a href="/index.php/admin/manage_cat4">Ukulele</a></li>
                                                        </ul>

                                                        <!--   <ul class="nav child_menu">
                                                        <li><a href="/index.php/admin/manage_attribute">Manage Attributes</a></li>
                                                        <li><a href="/index.php/admin/manage_attribute_sets">Manage Attributes Sets</a></li>
                                                        <li><a><i class="fa fa-table"></i> Category <span class="fa fa-chevron-down"></span></a>
                                                              <ul class="nav child_menu">
                                                                <li><a href="/index.php/admin/add_category">Add Category</a></li>
                                                                <li><a href="/index.php/category/manage_category">Manage Category</a></li>
                                                                <li><a href="/index.php/category/sub_category">Add Sub Category</a></li>
                                                                <li><a href="/index.php/category/manage_sub_category">Manage Sub Category</a></li>
                                                              </ul>
                                                        </li>
                                                        <li><a><i class="fa fa-home"></i> Brands <span class="fa fa-chevron-down"></span></a>
                                                          <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/add_brands">Add Brands</a></li>
                                                            <li><a href="/index.php/admin/manage_brands">Manage Brands</a></li>
                                                          </ul>
                                                       </li> 
                                                                          
                                                      </ul>
                                                        -->
                                                    </li>
                                                    <li><a><i class="fa fa-sitemap"></i> Category <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <!--<li><a href="/index.php/admin/add_category">Add Category</a></li>-->
                                                            <li><a href="/index.php/category/manage_category">Manage Category</a></li>
                                                            <!--<li><a href="/index.php/category/sub_category">Add Sub Category</a></li>-->
                                                            <!--<li><a href="/index.php/category/manage_sub_category">Manage Sub Category</a></li>-->
                                                            <!--<li><a href="/index.php/admin/add_brands">Add Brands</a></li>-->
                                                            <li><a href="/index.php/admin/manage_brands">Manage Brands</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="/index.php/admin/manage_services"><i class="fa fa-shield"></i>Manage Services <span class="fa fa-chevron-down"></span></a>

<!-- <li><a><i class="fa fa-shield"></i> Services <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="/index.php/admin/manage_lessons">Manage Lessons</a></li>
                                                 <li><a href="/index.php/admin/manage_repairs">Manage Repairs</a></li>
                                                 <li><a href="/index.php/admin/manage_rentals">Manage Rentals</a></li>
                                                 <li><a href="/index.php/admin/manage_reharsal">Manage Rehersal Space Option</a></li>
                        </ul>
                     </li>   -->
                                                    <li><a><i class="fa fa-newspaper-o"></i> News and Reviews <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/manage_reviews">Manage Reviews</a></li>
                                                            <li><a href="/index.php/admin/add_reviews">Add Reviews</a></li>
                                                        </ul>
                                                    </li>  


                                                    <li><a><i class="fa fa-bullhorn"></i> Manage Adds <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/manage_clearance_adds">Manage Clearance Adds</a></li>

                                                        </ul>
                                                    </li>
<!--                                                    <li><a><i class="fa fa-cloud-download"></i> Import Csv <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/view_format">View Csv format</a></li>
                                                            <li><a href="/index.php/admin/import">Import</a></li>
                                                        </ul>
                                                    </li>-->
													<li><a><i class="fa fa-money"></i> Manage Payment <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/manage_payment">Checkout Products </a></li>
                                                            <li><a href="/index.php/admin/manage_payment_with_dealer"> Products with dealers </a></li>

                                                        </ul>
                                                    </li>
                                                    <li><a><i class="fa fa-trash-o"></i> Trash Basket <span class="fa fa-chevron-down"></span></a>
                                                        <ul class="nav child_menu">
                                                            <li><a href="/index.php/admin/manage_dealers_trash">Dealers</a></li>

                                                        </ul>
                                                    </li>

                                                    <!--   -->


                                                    <!--
                                                                                                                              <li><a><i class="fa fa-bullhorn"></i> excel sheet download<span class="fa fa-chevron-down"></span></a>
                                                                                                                                <ul class="nav child_menu">
                                                                                                                                  <li><a href="/index.php/Category/manage_excelsheet">Manage excel sheet</a></li>
                                                                                                                                  
                                                                                                                                </ul>
                                                                                                                             </li>
                                                                                                        
                                                    -->

                                                    <!--   -->

                                                    </ul>
                                                    </div>

                                                    </div>
                                                    <ul>

                                                    </ul>
                                                    <!-- /sidebar menu -->


                                                    </div>
                                                    </div>

                                                    <!-- top navigation -->
                                                    <div class="top_nav">
                                                        <div class="nav_menu">
                                                            <nav>
                                                                <div class="nav toggle">
                                                                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                                                                </div>

                                                                <ul class="nav navbar-nav navbar-right">

                                                                    <li class="">
                                                                        <a href="javascript:0;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                            <?php foreach ($admin_profile as $dd) { ?>
                                                                                <img src="<?php echo base_url() . $dd->user_image; ?>" alt=""><?php echo $dd->first_name; ?>
                                                                            <?php } ?>
                                                                            <span class=" fa fa-angle-down"></span>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                                                            <li><a href="/index.php/admin/admin_profile"> Profile</a></li>
                                                                            <!--                                                                            <li>
                                                                                                                                                            <a href="javascript:;">
                                                                                                                                                                <span class="badge bg-red pull-right">50%</span>
                                                                                                                                                                <span>Settings</span>
                                                                                                                                                            </a>
                                                                                                                                                        </li>-->
                                                                            <li><a href="javascript:;">Help</a></li>
                                                                            <li><a href="/index.php/admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                                                        </ul>
                                                                    </li>

                                                                    <li role="presentation" class="dropdown">


                                                                    </li>
                                                                    <!--                                                                    <li class="dropdown messages-menu">
                                                                                                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                                                                                <i class="fa fa-th-list"></i>
                                                                                                                                                <span class="label label-success"><?php //echo $prod[0]->counter;
                                                                            ?></span>
                                                                                                                                            </a>-->
                                                                    <!--					<ul class="dropdown-menu">
                                                                                                              <li class="header">You have 4 messages</li>
                                                                                                                    <li>
                                                                                                                     inner menu: contains the actual data 
                                                                                                                    <ul class="menu">
                                                                                                                            <li> start message 
                                                                                                                            <a href="#">
                                                                                                                              <h4>
                                                                                                                                    Support Team
                                                                                                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                                                                                              </h4>
                                                                                                                              <p>Why not buy a new awesome theme?</p>
                                                                                                                            </a>
                                                                                                                            </li>
                                                                                                                       end message 
                                                                                                                            <li>
                                                                                                                                    <a href="#">
                                                                                                                                      <h4>
                                                                                                                                            AdminLTE Design Team
                                                                                                                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                                                                                                      </h4>
                                                                                                                                      <p>Why not buy a new awesome theme?</p>
                                                                                                                                    </a>
                                                                                                                            </li>
                                                                                                                            <li>
                                                                                                                                    <a href="#">
                                                                                                                                      <h4>
                                                                                                                                            Developers
                                                                                                                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                                                                                                                      </h4>
                                                                                                                                      <p>Why not buy a new awesome theme?</p>
                                                                                                                                    </a>
                                                                                                                            </li>
                                                                                                                            <li>
                                                                                                                                    <a href="#">
                                                                                                                                      <h4>
                                                                                                                                            Sales Department
                                                                                                                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                                                                                                      </h4>
                                                                                                                                      <p>Why not buy a new awesome theme?</p>
                                                                                                                                    </a>
                                                                                                                            </li>
                                                                                                                            <li>
                                                                                                                                    <a href="#">
                                                                                                                                      <h4>
                                                                                                                                            Reviewers
                                                                                                                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                                                                                                      </h4>
                                                                                                                                      <p>Why not buy a new awesome theme?</p>
                                                                                                                                    </a>
                                                                                                                            </li>
                                                                                                                    </ul>
                                                                                                                    </li>
                                                                                                              <li class="footer"><a href="#">See All Messages</a></li>
                                                                                                            </ul>-->
                                                                    <!--                                                                    </li>
                                                                                                                                        <li class="dropdown notifications-menu">
                                                                                                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                                                                                <i class="fa fa-user"></i>
                                                                                                                                                <span class="label label-warning"><?php //echo $user[0]->counter;
                                                                            ?></span>
                                                                                                                                            </a>-->
                                                                    <!--					<ul class="dropdown-menu">
                                                                                                              <li class="header">You have 10 notifications</li>
                                                                                                              <li>
                                                                                                                     inner menu: contains the actual data 
                                                                                                                    <ul class="menu" style="width: auto; position: relative; overflow: hidden; height: 200px;" >
                                                                                                                      <li>
                                                                                                                            <a href="#">
                                                                                                                              <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                                                                                            </a>
                                                                                                                      </li>
                                                                                                                      <li>
                                                                                                                            <a href="#">
                                                                                                                              <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                                                                                              page and may cause design problems
                                                                                                                            </a>
                                                                                                                      </li>
                                                                                                                      <li>
                                                                                                                            <a href="#">
                                                                                                                              <i class="fa fa-users text-red"></i> 5 new members joined
                                                                                                                            </a>
                                                                                                                      </li>
                                                                                                                      <li>
                                                                                                                            <a href="#">
                                                                                                                              <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                                                                                            </a>
                                                                                                                      </li>
                                                                                                                      <li>
                                                                                                                            <a href="#">
                                                                                                                              <i class="fa fa-user text-red"></i> You changed your username
                                                                                                                            </a>
                                                                                                                      </li>
                                                                                                                    </ul>
                                                                                                              </li>
                                                                                                              <li class="footer"><a href="#">View all</a></li>
                                                                                                            </ul>
                                                                                                      </li>
                                                                                                    </ul>-->
                                                            </nav>
                                                        </div>
                                                    </div>
                                                    <!-- /top navigation -->
