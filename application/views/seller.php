<?php include("header.php"); ?>

        <br><br>
        <h4 class="text-center"> You Need To Login For Next Step</h4><br>

        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <div class="container">    
                    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                        <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Sign In</div>
                                <div style="float:right; position: relative; top:-30px;"><a href="#">Forgot password?</a></div>
                            </div>     
                            <div style="padding-top:30px" class="panel-body" >
                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                <form id="loginform" class="form-horizontal" role="form" action="/index.php/riftraff/login" method="post">
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="login-username" type="email" class="form-control" name="username" value="" placeholder="username or email">                                        
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
                    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-info">
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

        <button type="button" class="btn btn-default product" style="display: block; margin: 0px auto;" onclick="openNav()">Get Started</button>

        <br>

<!--
        <div id="jssor_1" style="position: relative; margin: 0 auto; bottom: 0; left: 0px; width:1400px; height: 300px; overflow: hidden; visibility: hidden;">
            <div data-u="loading" style="position: absolute; bottom: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; bottom: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url("images/loading.gif") no-repeat center center;bottom:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; bottom: 30px; left: 0px; width: 1400px; height: 150px; overflow: hidden;">
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/5.jpg" class="img-responsive"/></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/slider1.jpg" class="img-responsive" /></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/slider2.jpg" class="img-responsive"/></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/slider3.jpg" class="img-responsive" /></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/slider4.jpg" class="img-responsive" /></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/7.jpg" class="img-responsive" /></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/9.jpg" class="img-responsive" /></a>
                </div>
            </div>
            <span data-u="arrowleft" class="jssora03l" style="top:26.5px;right:78px;width:55px;height:55px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora03r" style="top:26.5px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
            <h3 style="color:#777;padding-top:45px;">Seller List</h3>
        </div>
-->
        <br><br>

<!--
        <div id="jssor_2" style="position: relative; margin: 0 auto; bottom: 0; left: 0px; width:1400px; height: 300px; overflow: hidden; visibility: hidden;">
            <div data-u="loading" style="position: absolute; bottom: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; bottom: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url("images/loading.gif") no-repeat center center;bottom:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; bottom: 30px; left: 0px; width: 1400px; height: 150px; overflow: hidden;">
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/5.jpg" class="img-responsive"/></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/slider1.jpg" class="img-responsive" /></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/slider2.jpg" class="img-responsive"/></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/slider3.jpg" class="img-responsive" /></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/slider4.jpg" class="img-responsive" /></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/7.jpg" class="img-responsive" /></a>
                </div>
                <div style="display: none;">
                    <a href="#"><img data-u="image" src="<?php echo base_url(); ?>images/9.jpg" class="img-responsive" /></a>
                </div>
            </div>
            <span data-u="arrowleft" class="jssora03l" style="top:26.5px;right:78px;width:55px;height:55px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora03r" style="top:26.5px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
            <h3 style="color:#777;padding-top:45px;">Latest Product Added </h3>
        </div>
-->





       <?php include("footer.php"); ?>

        <script>
            (function () {
                $(function () {
                    var SideBAR;
                    SideBAR = (function () {
                        function SideBAR() {}

                        SideBAR.prototype.expandMyMenu = function () {
                            return $("nav.sidebar").removeClass("sidebar-menu-collapsed").addClass("sidebar-menu-expanded");
                        };

                        SideBAR.prototype.collapseMyMenu = function () {
                            return $("nav.sidebar").removeClass("sidebar-menu-expanded").addClass("sidebar-menu-collapsed");
                        };

                        SideBAR.prototype.showMenuTexts = function () {
                            return $("nav.sidebar ul a span.expanded-element").show();
                        };

                        SideBAR.prototype.hideMenuTexts = function () {
                            return $("nav.sidebar ul a span.expanded-element").hide();
                        };

                        SideBAR.prototype.showActiveSubMenu = function () {
                            $("li.active ul.level2").show();
                            return $("li.active a.expandable").css({
                                width: "100%"
                            });
                        };

                        SideBAR.prototype.hideActiveSubMenu = function () {
                            return $("li.active ul.level2").hide();
                        };

                        SideBAR.prototype.adjustPaddingOnExpand = function () {
                            $("ul.level1 li a.expandable").css({
                                padding: "1px 4px 4px 0px"
                            });
                            return $("ul.level1 li.active a.expandable").css({
                                padding: "1px 4px 4px 4px"
                            });
                        };

                        SideBAR.prototype.resetOriginalPaddingOnCollapse = function () {
                            $("ul.nbs-level1 li a.expandable").css({
                                padding: "4px 4px 4px 0px"
                            });
                            return $("ul.level1 li.active a.expandable").css({
                                padding: "4px"
                            });
                        };

                        SideBAR.prototype.ignite = function () {
                            return (function (instance) {
                                return $("#justify-icon").click(function (e) {
                                    if ($(this).parent("nav.sidebar").hasClass("sidebar-menu-collapsed")) {
                                        instance.adjustPaddingOnExpand();
                                        instance.expandMyMenu();
                                        instance.showMenuTexts();
                                        instance.showActiveSubMenu();
                                        $(this).css({
                                            color: "#000"
                                        });
                                    } else if ($(this).parent("nav.sidebar").hasClass("sidebar-menu-expanded")) {
                                        instance.resetOriginalPaddingOnCollapse();
                                        instance.collapseMyMenu();
                                        instance.hideMenuTexts();
                                        instance.hideActiveSubMenu();
                                        $(this).css({
                                            color: "#FFF"
                                        });
                                    }
                                    return false;
                                });
                            })(this);
                        };

                        return SideBAR;

                    })();
                    return (new SideBAR).ignite();
                });

            }).call(this);
        </script>
        <script>
            jssor_1_slider_init();
        </script>
        <script>
            jssor_2_slider_init();
        </script>
       
