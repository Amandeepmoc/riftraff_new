<br>
<div class="container-fluid padding">
    <div class="col-md-12 col-xs-12 col-sm-12 text-left" style="background: #f9faf2;border:1px solid #e6e7d9;">
        <div class="col-md-2 col-sm-2 col-xs-6">
            <ul class="bottom-list">
                <li> <a href="/index.php/riftraff/buy">Buy  </a></li>
                <li> <a href="/index.php/riftraff/seller">Sell </a> </li>
                <li><a href="#">Trade-In</a> </li>
                <li><a href="/index.php/riftraff/dealer_locater">Dealer-Locator  </a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            <ul class="bottom-list">
                <li><a href="#"> News & Reviews </a></li>
                <li><a href="/index.php/riftraff/rentals"> Brand Rentals </a></li>
                <li><a href="/index.php/riftraff/lessons"> Lessons </a></li>
                <li><a href="/index.php/riftraff/repairs">Repairs</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            <ul class="bottom-list">
                <li> <a href="/index.php/riftraff/rehersal">Rehearsal  </a></li>
                <li> <a href="/index.php/riftraff/rehersal">Studio Spaces </a></li>
                <li> <a href="#">About </a></li>
                <li> <a href="#">Help  </a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            <ul class="bottom-list">
                <li> <a href="/sitemap.xml">Sitemap  </a></li>
                <li> <a href="/index.php/riftraff/seller">Sell  </a></li>
                <li><a href="#">Trade-In </a></li>
                <li><a href="/index.php/riftraff/dealer_locater">Dealer-Locator </a> </li>
            </ul>

        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            <ul class="bottom-list">
                <li> <a href="#"><i class="fa fa-facebook-official facebook" aria-hidden="true"></i> Facebook </a> </li>
                <li> <a href="#"><i class="fa fa-twitter-square Twitter" aria-hidden="true"></i> Twitter  </a></li>
                <li><a href="#"><i class="fa fa-pinterest-square Pinterest" aria-hidden="true"></i> Pinterest</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-2 padding"><br>
            <div class="col-md-12 bg1">
                <P><i class="fa fa-envelope signup" aria-hidden="true"></i>&nbsp;&nbsp; Sign up for great deals</P>
                <br>
                <div class="input-group">
                    <input type="email" class="form-control form-control1" placeholder="Email Address" />
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn2">GO</button>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>



<!--<nav class='sidebar sidebar-menu-collapsed'> 
    <a href='#' id='justify-icon'>
        <span class='fa fa-expand'></span>
    </a>
    <ul class='level1'>
        <li class='active'> 
            <a class='expandable' href='#' title='Dashboard'>
                <span class='fa fa-cog  collapsed-element'></span>
                <span class='expanded-element'>Settings</span>
            </a>
            <ul class='level2'>
                <li> <a href='#' title='Traffic'>Setting 1</a></li>
                <li> <a href='#' title='Conversion rate'>Setting 2</a></li>
                <li> <a href='#' title='Purchases'>Setting 3</a></li>
            </ul>
        </li>
        <li> <a class='expandable' href='#' title='Account'>
                <span class='fa fa-bell-o collapsed-element'></span>
                <span class='expanded-element'>Notification</span>
            </a>
        </li>
    </ul>
</nav>-->

<img class="img-responsive" src="<?php echo base_url(); ?>images/footer.jpg" style="width:100%;"/>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!-- Dropzone.js -->
<script src="<?php echo base_url(); ?>admin/vendors/dropzone/dist/dropzone.js"></script>

<script src="<?php echo base_url(); ?>js/index.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/nicEdit.js"></script>
<!-- <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.timepicker.js"></script>

<!--<script type="text/javascript">
    bkLib.onDomLoaded(function () {
        nicEditors.allTextAreas()
    });
</script>-->
<?php
if ($this->session->flashdata('message') == 'You are Registered Successfully') {
    echo "<script>$(document).ready(function() { alert('You are sucessfully registered please login after admin approval')});</script>";
} else if ($this->session->flashdata('message') == 'Successfully Login') {
    echo "<script>$(document).ready(function() { alert('You have sucessfully logged in !!')});</script>";
} else if ($this->session->flashdata('message') == 'Invalid Email or Password') {
    echo "<script>$(document).ready(function() { alert('Invaild Email or password!!')});</script>";
} else if ($this->session->flashdata('message') == 'Please login First') { echo "<script>$(document).ready(function() { alert('Please login first')});</script>"; }
else if ($this->session->flashdata('message') == 'Successfully added') { echo "<script>$(document).ready(function() { alert('You have Successfully added this product in favourites')});</script>"; }
else if ($this->session->flashdata('message') == 'You have already add this product') { echo "<script>$(document).ready(function() { alert('You have already add this product')});</script>"; }
else {
    
}
?>
<script>
    function openNav() {
        document.getElementById("myNav").style.height = "100%";
    }

    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }
    function openShip() {
        document.getElementById("shipPopup").style.height = "100%";
    }

    function closeShip() {
        document.getElementById("shipPopup").style.height = "0%";
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#usr").change(function () {
            var usr = $(this).val();
            if (usr == "dealer")
            {
                $(".show_content").show();
            } else
            {
                $(".show_content").hide();
            }
            if (usr == "buyer")
            {
                $(".show_content1").show();
            } else
            {
                $(".show_content1").hide();
            }
        });
    });
</script>
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
<script src="<?php echo base_url(); ?>js/zoomove.min.js"></script>
<script>
    $('.zoo-item').ZooMove({
        cursor: 'true',
        scale: '1',
    });
</script>
<script>

    function ajaxCall() {
        this.send = function (data, url, method, success, type) {
            type = type || 'json';
            var successRes = function (data) {
                success(data);
            }

            var errorRes = function (e) {
                console.log(e);
                //alert("Error found \nError Code: "+e.status+" \nError Message: "+e.statusText);
                //$('#loader').modal('hide');
            }
            $.ajax({
                url: url,
                type: method,
                data: data,
                success: successRes,
                error: errorRes,
                dataType: type,
                timeout: 60000
            });

        }

    }

    function locationInfo() {
        var rootUrl = "http://iamrohit.in/lab/php_ajax_country_state_city_dropdown/api.php";
        var call = new ajaxCall();
        this.getCities = function (id) {
            $(".cities option:gt(0)").remove();
            var url = rootUrl + '?type=getCities&stateId=' + id;
            var method = "post";
            var data = {};
            $('.cities').find("option:eq(0)").html("Please wait..");
            call.send(data, url, method, function (data) {
                $('.cities').find("option:eq(0)").html("Select City");
                if (data.tp == 1) {
                    $.each(data['result'], function (key, val) {
                        var option = $('<option />');
                        option.attr('value', val).text(val);
                        option.attr('cityid', key);
                        $('.cities').append(option);
                    });
                    $(".cities").prop("disabled", false);
                } else {
                    alert(data.msg);
                }
            });
        };

        this.getStates = function (id) {
            $(".states option:gt(0)").remove();
            $(".cities option:gt(0)").remove();
            var url = rootUrl + '?type=getStates&countryId=' + id;
            var method = "post";
            var data = {};
            $('.states').find("option:eq(0)").html("Please wait..");
            call.send(data, url, method, function (data) {
                $('.states').find("option:eq(0)").html("Select State");
                if (data.tp == 1) {
                    $.each(data['result'], function (key, val) {
                        var option = $('<option />');
                        option.attr('value', val).text(val);
                        option.attr('stateid', key);
                        $('.states').append(option);
                    });
                    $(".states").prop("disabled", false);
                } else {
                    alert(data.msg);
                }
            });
        };

        this.getCountries = function () {
            var url = rootUrl + '?type=getCountries';
            var method = "post";
            var data = {};
            $('.countries').find("option:eq(0)").html("Please wait..");
            call.send(data, url, method, function (data) {
                $('.countries').find("option:eq(0)").html("Select Country");
                console.log(data);
                if (data.tp == 1) {
                    $.each(data['result'], function (key, val) {
                        var option = $('<option />');
                        option.attr('value', val).text(val);
                        option.attr('countryid', key);
                        $('.countries').append(option);
                    });
                    $(".countries").prop("disabled", false);
                } else {
                    alert(data.msg);
                }
            });
        };

    }

    $(function () {
        var loc = new locationInfo();
        loc.getCountries();
        $(".countries").on("change", function (ev) {
            var countryId = $("option:selected", this).attr('countryid');
            if (countryId != '') {
                loc.getStates(countryId);
            } else {
                $(".states option:gt(0)").remove();
            }
        });
        $(".states").on("change", function (ev) {
            var stateId = $("option:selected", this).attr('stateid');
            if (stateId != '') {
                loc.getCities(stateId);
            } else {
                $(".cities option:gt(0)").remove();
            }
        });
    });



</script>
</body>
</html>
