<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <Meta name="keywords" content ="">
        <Meta name="description" content="">
        <title>RiftRaff</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.timepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="<?php echo base_url(); ?>js/star-rating.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/zoomove.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-slider.min.css">
        <!-- Dropzone.cs -->
        <link href="<?php echo base_url(); ?>admin/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider-21.1.5.min.js"></script>
        <script src="<?php echo base_url(); ?>js/prefixfree.min.js"></script>
        <!--
                        <link href="<?php echo base_url(); ?>css/fine-uploader-new.css" rel="stylesheet">
                        <script src="<?php echo base_url(); ?>js/fine-uploader.js"></script>
        -->
        <!--
                                <script type="text/template" id="qq-template-manual-trigger">
        
                                <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
                    <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
                    </div>
                    <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                        <span class="qq-upload-drop-area-text-selector"></span>
                    </div>
                    <div class="buttons">
                        <div class="qq-upload-button-selector qq-upload-button">
                            <div>Select files</div>
                        </div>
                        <button type="button" id="trigger-upload" class="btn btn-primary">
                            <i class="icon-upload icon-white"></i> Upload
                        </button>
                    </div>
                    <span class="qq-drop-processing-selector qq-drop-processing">
                        <span>Processing dropped files...</span>
                        <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
                    </span>
                    <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                        <li>
                            <div class="qq-progress-bar-container-selector">
                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                            </div>
                            <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                            <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                            <span class="qq-upload-file-selector qq-upload-file"></span>
                            <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                            <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                            <span class="qq-upload-size-selector qq-upload-size"></span>
                            <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                            <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                            <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                            <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                        </li>
                    </ul>
                    <dialog class="qq-alert-dialog-selector">
                        <div class="qq-dialog-message-selector"></div>
                        <div class="qq-dialog-buttons">
                            <button type="button" class="qq-cancel-button-selector">Close</button>
                        </div>
                    </dialog>
        
                    <dialog class="qq-confirm-dialog-selector">
                        <div class="qq-dialog-message-selector"></div>
                        <div class="qq-dialog-buttons">
                            <button type="button" class="qq-cancel-button-selector">No</button>
                            <button type="button" class="qq-ok-button-selector">Yes</button>
                        </div>
                    </dialog>
        
                    <dialog class="qq-prompt-dialog-selector">
                        <div class="qq-dialog-message-selector"></div>
                        <input type="text">
                        <div class="qq-dialog-buttons">
                            <button type="button" class="qq-cancel-button-selector">Cancel</button>
                            <button type="button" class="qq-ok-button-selector">Ok</button>
                        </div>
                    </dialog>
                                </div>
                        </script>
        -->


        <script>
            jssor_1_slider_init = function () {
                var jssor_1_options = {
                    $AutoPlay: true,
                    $AutoPlaySteps: 4,
                    $SlideDuration: 160,
                    $SlideWidth: 200,
                    $SlideSpacing: 10,
                    $Cols: 6,
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,
                        $Steps: 4
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$,
                        $SpacingX: 1,
                        $SpacingY: 1
                    }
                };
                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
                function ScaleSlider() {
                    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                    if (refSize) {
                        refSize = Math.min(refSize, 1400);
                        jssor_1_slider.$ScaleWidth(refSize);
                    } else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
                ScaleSlider();
                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            };
        </script>
        <script>
            jssor_2_slider_init = function () {
                var jssor_2_options = {
                    $AutoPlay: true,
                    $AutoPlaySteps: 4,
                    $SlideDuration: 120,
                    $SlideWidth: 200,
                    $SlideSpacing: 10,
                    $Cols: 6,
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,
                        $Steps: 4
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$,
                        $SpacingX: 1,
                        $SpacingY: 1
                    }
                };
                var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);
                function ScaleSlider() {
                    var refSize = jssor_2_slider.$Elmt.parentNode.clientWidth;
                    if (refSize) {
                        refSize = Math.min(refSize, 1400);
                        jssor_2_slider.$ScaleWidth(refSize);
                    } else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
                ScaleSlider();
                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            };
        </script>
        <style>
            .jssorb03 { position: absolute;}
            .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {position: absolute;width: 21px;height: 21px;text-align: center;line-height: 21px;color: white;font-size: 12px;background: url("/images/b03.png") no-repeat; cursor: pointer;} 
            .jssorb03 div { background-position: -5px -4px; }
            .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
            .jssorb03 .av { background-position: -65px -4px; }
            .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
            .jssora03l, .jssora03r {display: block;position: absolute;top:26px!important;width: 55px;height: 55px; cursor: pointer;background: url ("/images/a03.png") no-repeat;overflow: hidden;}
            .jssora03l { background-position: -3px -33px; }
            .jssora03r { background-position: -63px -33px; }
            .jssora03l:hover { background-position: -123px -33px; }
            .jssora03r:hover { background-position: -183px -33px; }
            .jssora03l.jssora03ldn { background-position: -243px -33px; }
            .jssora03r.jssora03rdn { background-position: -303px -33px; }
        </style>



    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <ul class="list-inline sell">

                        <li class="li-bg"><a href="/index.php/riftraff/add_product">Sell Your Guitar Here</a></li>


                        <li style="vertical-align:middle;"><img class="img-responsive" src="<?php echo base_url(); ?>images/camera1.png"/></li>
                        <li class="text-danger text-uppercase" style="vertical-align:bottom;"><a href="/index.php/riftraff/clearance" class="text-danger"><b>Clearance</b></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <ul class="list-inline sell pull-right"><?php
                        if (!empty($this->session->userdata['logged_in'])) {
                            echo "<strong>Hi,</strong> " . $this->session->userdata['logged_in']['first_name'];
                            echo " ";
                            echo $this->session->userdata['logged_in']['last_name'];
                            ?>
                            <li><a href="/index.php/riftraff/logout"><button type="button" class="btn btn-default" >Logout</button></a></li>
                        <?php } else { ?>
                            <li><button type="button" class="btn btn-default" onclick="openNav()">Login / Register</button></li>
                        <?php } ?>
                        <?php if (!empty($this->session->userdata['logged_in'])) { ?>
                            <li>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle btn-default" type="button" data-toggle="dropdown">My Account</button>
                                    <ul class="dropdown-menu">

                                        <?php if ($this->session->userdata['logged_in']['type'] == 'dealer') { ?>
                                            <li><a href="/index.php/riftraff/dealer_profile">My Profile</a></li>
                                            <li><a href="/index.php/riftraff/edit_dealer_profile">Edit Profile</a></li>
                                        <?php } else if ($this->session->userdata['logged_in']['type'] == 'seller') { ?>
                                            <li><a href="/index.php/riftraff/seller_profile">My Profile</a></li>
                                            <li><a href="/index.php/riftraff/edit_seller_profile">Edit Profile</a></li>
                                        <?php } else { ?>
                                            <li><a href="/index.php/riftraff/buyer_profile">My Profile</a></li>
                                        <?php } ?>
                                        <li><a href="/index.php/riftraff/favorites">Favourites</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                            <li><a href = "/index.php/riftraff/add_to_cart/" >Cart  &nbsp;&nbsp;<i class="fa fa-shopping-cart text-muted" aria-hidden="true" ></i></a> </li>
                        <li><a href = "/index.php/riftraff/contact_us"><strong>Help</strong></a> </li>
                    </ul>
                </div>
            </div>
        </div> 
        <nav class="navbar navbar-default grad" id="custom-nav">
            <div class="container">
                <div class="row navbar1">
                    <div class="col-md-8 col-xs-12 col-sm-8 pull-right" style="padding-right:0;">
                        <div class="input-group" id="adv-search">
                            <input type="text" class="form-control form-control1" placeholder="" />
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn1"><span class="fa fa-search" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>" style="padding:0px 15px;"><img src="<?php echo base_url(); ?>images/logo4.png" class="logo1"></a>
                </div>
                <br>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right navbar-font">
                        <li class="dropdown">
                            <a href="/index.php/riftraff/buy" class="dropdown-toggle" >Buy</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Electric Guitar</a></li>
                                <li><a href="#">Electric Bass</a></li>
                                <li><a href="#">Acoustic Guitar</a></li>
                                <li><a href="#">Acoustic Bass</a></li>
                                <li><a href="#">Guitar Amp</a></li>
                                <li><a href="#">Bass Amp</a></li>
                                <li><a href="#">Acoustic Amp</a></li>
                                <li><a href="#">Pedals</a></li>
                                <li><a href="#">By Brand</a></li>
                            </ul>
                        </li>
                        <!--                        <li class="dropdown">
                        <?php //if (!empty($this->session->userdata['logged_in'])) { ?>
                                                        <a href="/index.php/riftraff/add_product" class="dropdown-toggle" >Sell</a>
                        <?php //} else { ?>
                                                        <a href="javascript:void(0)" class="dropdown-toggle" onclick="openNav()">Sell</a>
                        <?php //}  ?>
                        
                                                </li>-->
                        <!--                        <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trade-In</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Turn your old gear into your dream gear</a></li>
                                                    </ul>
                                                </li>-->
                        <li class="dropdown">
                            <a href="/index.php/riftraff/lessons" class="" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Lessons</a>
                            <!--                            <ul class="dropdown-menu">
                                                            <li><a href="#">Guitars</a></li>
                                                            <li><a href="#">Bass</a></li>
                                                            <li><a href="#">Tube Amps</a></li>
                                                            <li><a href="#">Power Amps</a></li>
                                                            <li><a href="#">Band Instruments</a></li>
                                                        </ul>-->
                        </li>
                        <li class="dropdown">
                            <a href="/index.php/riftraff/repairs" class="" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Repairs</a>
                            <!--                            <ul class="dropdown-menu">
                                                            <li><a href="#">With Guitar Amps</a></li>
                                                            <li><a href="#">With Bass Amps</a></li>
                                                            <li><a href="#">With Drums</a></li>
                                                            <li><a href="#">With PA and Mics</a></li>
                                                            <li><a href="#">Recording Equipment(Not Studio Quality)</a></li>
                                                        </ul>-->
                        </li>
                        <li class="dropdown">
                            <a href="/index.php/riftraff/rentals" class="" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Band Rentals</a>
                            <!--                            <ul class="dropdown-menu">
                                                            <li><a href="#">Guitar</a></li>
                                                            <li><a href="#">Bass</a></li>
                                                            <li><a href="#">Vocals</a></li>
                                                            <li><a href="#">Keyboards</a></li>
                                                            <li><a href="#">Drums</a></li>
                                                            <li><a href="#">Banjo</a></li>
                                                            <li><a href="#">Classical/Nylon</a></li>
                                                            <li><a href="#">Flaminco</a></li>
                                                            <li><a href="#">Ukulele</a></li>
                                                        </ul>-->
                        </li>
                        <li class="dropdown">
                            <a href="/index.php/riftraff/dealer_locater"  aria-haspopup="true" aria-expanded="false">Dealer Locator</a>
                            <!--                            <ul class="dropdown-menu">
                                                            <li><a href="#">By Zip Code</a></li>
                                                            <li><a href="#">By Brand</a></li>
                                                            <li><a href="#">By Service</a></li>
                                                        </ul>-->
                        </li>
                        <li class="dropdown">
                            <a href="/index.php/riftraff/news"  aria-haspopup="true" aria-expanded="false">News & Reviews</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Band Rentals</a></li>
                                <li><a href="#">Touring Rentals</a></li>
                                <li><a href="#">PA/Lighting Rental</a></li>
                            </ul>
                        </li>



                        <li class="dropdown">
                            <a href="/index.php/riftraff/rehersal" class="" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Rehearsal / Studio Spaces</a>
                            <!--                            <ul class="dropdown-menu">
                                                            <li><a href="#">By Brand</a></li>
                                                            <li><a href="#">By Model</a></li>
                                                            <li><a href="#">New Reviews</a></li>
                                                        </ul>-->
                        </li>
<!--                        <li class="dropdown">
                            <a href="/index.php/riftraff/rehersal" class="" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Blogs</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">By Brand</a></li>
                                                            <li><a href="#">By Model</a></li>
                                                            <li><a href="#">New Reviews</a></li>
                                                        </ul>
                        </li>-->
                    </ul>
                </div><!-- /.navbar-collapse --><?php //echo $this->session->flashdata('message');   ?>

            </div><!-- /.container-fluid -->
        </nav>

        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <div class="container">    
                    <div id="loginbox" style="margin-top:-50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                        <div class="panel-info" style="background-color:#fff;" >
                            <div class="panel-heading">
                                <div class="panel-title">Sign In</div>
                                <div style="float:right; position: relative; top:-30px;"><a href="#">Forgot password?</a></div>
                            </div>     
                            <div style="padding-top:30px" class="panel-body" >
                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                <form id="loginform" class="form-horizontal" role="form" action="/index.php/riftraff/login" method="post">
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
                                    </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    <div class="input-group">
                                        <div class="checkbox">
                                            <label><input id="login-remember" type="checkbox" name="remember" value="1"> Remember me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit"  value="Login" class="btn login-btn">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 control">
                                            <div style="border-top: 1px solid#888; padding-top:15px;" >
                                                Don't have an account! 
                                                <a href="#" onClick="$('#loginbox').hide();
                                                        $('#signupbox').show()">
                                                    Sign Up Here
                                                </a>
                                            </div>
                                        </div>
                                    </div>    
                                </form>     
                            </div>                     
                        </div>  
                    </div>
                    <div id="signupbox" style="display:none; margin-top:-50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class=" panel-info" style="background-color:#fff;">
                            <div class="panel-heading">
                                <div class="panel-title">Sign Up</div>
                                <div style="float:right; position: relative; top:-30px"><a id="signinlink" href="#" onclick="$('#signupbox').hide();
                                        $('#loginbox').show()">Sign In</a></div>
                            </div>  
                            <div class="panel-body" >
                                <form id="signupform" class="form-horizontal" role="form" method="post" action="/index.php/riftraff/signup">
                                    <div id="signupalert" style="display:none" class="alert alert-danger">
                                        <p>Error:</p>
                                        <span></span>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="email" class="col-md-3 control-label">Email</label> -->
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" name="email" placeholder="Email Address"required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="email" class="col-md-3 control-label">Email</label> -->
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="username" placeholder="User name"required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="firstname" class="col-md-3 control-label">First Name</label> -->
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="lastname" class="col-md-3 control-label">Last Name</label> -->
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="lastname" class="col-md-3 control-label">Last Name</label> -->
                                        <div class="col-md-12">
                                            <select name="user_type" class="form-control" id="usr" required>
                                                <option value="">Please select user type</option>
                                                <option value="buyer">Buyer</option>
                                                <option value="seller">Seller</option>
                                                <option value="dealer">Dealer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="show_content form-group" style="display:none;">
                                        <div class='col-md-12'><input type='text' placeholder="Store Name" name='store_name' class='form-control'></div>
                                    </div>
                                    <div class="show_content1 form-group" style="display:none;">
                                        <div class='col-md-4'> <select name="country" class="countries form-control" id="countryId">
                                                <option value="">Select Country</option>
                                            </select></div>
                                        <div class='col-md-4'> <select name="state" class="states form-control" id="stateId">
                                                <option value="">Select State</option>
                                            </select></div>
                                        <div class='col-md-4'> <select name="city" class="cities form-control" id="cityId">
                                                <option value="">Select City</option>
                                            </select></div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="password" class="col-md-3 control-label">Password</label> -->
                                        <div class="col-md-12">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <!-- Button -->                                        
                                        <div class="col-md-12">
                                            <button id="btn-signup" type="submit" class="btn login-btn"><i class="icon-hand-right"></i> &nbsp Sign Up</button>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
