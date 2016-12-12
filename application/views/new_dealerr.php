<?php include('header2.php'); ?>
<style>
    .rift-raff-nav .open > a, .rift-raff-nav .open > a:focus, .rift-raff-nav .open > a:hover {background-color: #3e9cc5;border-color: #337ab7;border-radius: 18px;color: #fff;} 
    .rift-raff-nav > li > a{background:none;font-size:16px;font-weight:600;color:#000;}
    .rift-raff-nav > li > a{padding:10px 30px!important;}
    .rift-raff-nav li:focus, .rift-raff-nav li:hover{background-color: #3e9cc5; border-color: #337ab7; border-radius: 18px;color: #fff;}
    .nav>li>a:hover{background:transparent;color:#fff;}
    .dealer-panel1 ul.tabss li{float:left;padding:4px 10px;border-radius:5px;background:#c0d8f0;border-style:solid;border-width:2px;border-color:#747eb6 #747eb6 transparent #747eb6}
    .dealer-panel1 ul.tabss li a{ font-size: 18px;font-family: "Arial";color: rgb(0, 0, 0);padding:0px 10px;font-weight:500;}
    .left-bar p, .left-bar ul li a{padding-left:10px;}  .dealer-bg{background:#ffd687;/*width:95%;*/padding-bottom:20px;}.dealer-panel .panel-heading{background:#fff;padding:20px;border-top-left-radius:1em;border-top-right-radius:1em; font-size: 22px;}.dealer-panel .panel-heading span{font-size: 18px;}div.panel-body1{padding:0px;}div.dealer-panel1{margin-bottom:0px;}div.dealer-panel1, div.dealer-panel3{background:#fff!important;border-top-left-radius:1em;border-top-right-radius:1em;}.dealer-panel1 .panel-heading, .dealer-panel3 .panel-heading{border-radius:0.5em;margin:5px;background: #6bc8f1;background: -webkit-linear-gradient( #6bc8f1,#3299d4); background: -o-linear-gradient(#6bc8f1,#3299d4); background: -moz-linear-gradient(#6bc8f1,#3299d4); background: linear-gradient(#6bc8f1,#3299d4);font-size:22px;font-weight:600;}.dealer-panel1 .panel-heading ul li a, .dealer-panel3 ul li a, .dealer-panel1 .panel-heading a{color:#000;text-decoration:none;}.dealer-panel3 .panel-heading{color:#fff;}.dealer-panel3 div.head-color{color:#ff0000;}.dealer-panel3 h3{margin:0px;}.dealer-panel3 h3{margin:0px;} .dealer-panel3  h4{margin:5px 0px;}.dealer-panel3 p{font-size:12px;}.panel3{border-radius:0px!important;}/ .dealer-border{background:#fffee2;} /.dealer-border .dealer-div{border-right:1px solid #aaa;background:#fff;}.dealer-border .dealer-div .card-block p,.dealer-border .dealer-div .rating{font-size:11px;}.right-bar h3{ font-size: 14px;font-family: "Arial";color: rgb(0, 0, 0);font-weight: bold;position:relative;}.right-bar h3:after{height:2px;border-top:2px solid #000;width:100%;content:' ';position:absolute;top:17px;left:0;}.right-bar .space h2{margin:0px;font-size:20px;}.right-bar .space h4{margin:0px;font-size:13px;}.right-bar .space p{font-size:12px;line-height:1.1;}.visit{font-size: 14px;font-family: "Arial";color: rgb(255, 255, 255); font-weight: bold;width:100%;}.bg-h3{background:#56b6e6;background:linear-gradient(#5fbeea , #40a3dc);padding:0.5px 0px 3px ;}.bg-h3{margin-top:13px;}.ad img{margin-bottom:10px;width:100%;}.ad{background:#fff;}.see-more a, .view a{color:#98999b;font-family: "Arial",sans-serif;font-size:16px;}.see-more a:hover{text-decoration:none;color:#98999b;}.view a:focus, .view a:hover{color:#206fbf;text-decoration:none;}.left-text h4, .left-text p, .left-text ul li a{ font-size: 16px;font-family: "Arial";color: rgb(0, 0, 0);}.right-bar .space h2 span{color:#000;font-size:14px;text-decoration:line-through;padding-left:20px;}.dealer-panel3 iframe{height:150px;}.panel{box-shadow:none!important;}.left-bar{background:#e6e6e6;padding-top:10px;word-wrap:break-word;}
    .tabss > .active, .tabss > .active:hover, .tabss > .active:focus{background:#fff!important;}




    @media (min-width: 992px) {
        .left-bar{position: absolute!important;top: 0; left: 0;bottom: 0; z-index: 1000; display: block; background-color: #CCCCCC;}
    }
    @media (max-width:1366px){ .ad img {width: 88%;}.dealer-panel3 iframe{height:138px;} .right-bar h2{font-size:17px;} .right-bar .space h4{margin:3px 0px;font-size:12px;} .right-bar .space p{font-size:11px;} .see-more a, .view a{font-size:14px;} .right-bar .space h2 span{font-size:12px;} .left-bar{padding-bottom:55px;} .right-bar  div.space{padding-left:4px;padding-right:0px;}}
    @media (max-width:1280px){ .right-bar h2{font-size:15px;} .right-bar .space h2 span{font-size:11px;} .left-text h4, .left-text p, .left-text ul li a{font-size:14px;} .see-more a, .view a{font-size:12px;} .dealer-panel3 iframe{height:125px;} .left-bar{padding-bottom:75px;}  .ad img {margin-bottom: 20px;} .right-bar div.space{padding-left:4px;padding-right:0px;}.dealer-panel .panel-heading{font-size:19px;} .dealer-panel .panel-heading span{font-size:16px;}}
    @media (max-width:1024px){ .dealer-panel .panel-heading{font-size:18px;} .dealer-panel .panel-heading span{font-size:16px;} .dealer-panel3 iframe{height:90px;} .dealer-panel1 .panel-heading, .dealer-panel3 .panel-heading{font-size:18px;} .left-text h4, .left-text p, .left-text ul li a, .visit{font-size:12px;} .right-bar div.space{padding-left:4px;padding-right:0px;} .right-bar .space h2{font-size:13px;} .right-bar .space h2 span{font-size:10px;} .right-bar .space h4{font-size:11px;} .rating-container .clear-rating{display:none!important;} .right-bar .space p{font-size:10px;margin-bottom:0px;} .left-bar{padding-bottom:0px;} .zero{padding:0px 3px!important;font-size:12px;}
                               @media (max-width:980px){.ad img{width:33%;float:left;} .ad img:nth-child(2){margin:0px 3px;} div.ad{padding:0px;} .dealer-panel3 iframe{height:100px;} .right-bar h2{font-size:18px;} .right-bar .space h4{font-size:12px;} .right-bar .space p{font-size:13px;} .dealer-border .dealer-div.third{border-right:none;} .left-text h4, .left-text p, .left-text ul li a, .visit{font-size:15px;}}
                               @media (max-width:768px){ .dealer-panel3 iframe {height:100px;}.ad img{width:33%;float:left;} .ad img:nth-child(2){margin:0px 2px;} .right-bar .space h2{font-size:18px;} .right-bar .space h4{font-size:12px;} .right-bar .space p{font-size:9.8px;} .dealer-border .dealer-div{padding:0px 5px;} .dealer-border .dealer-div.third{border-right:none;} .left-text h4, .left-text p, .left-text ul li a, .visit{font-size:15px;} .dealer-bg .dealer-panel1 .panel-body .right-bar{padding:0px;} div.ad{padding:0px;} .dealer-panel .panel-heading span{font-size:16px;}}
                               @media (max-width:480px){ .dealer-panel1 ul.tabss, .dealer-panel1 ul.tabss li{float:none!important;} .dealer-border .dealer-div.third{border-right:1px solid #aaa;} .dealer-border .dealer-div.second{border-right:none;} .right-bar .space p {font-size: 12.8px;} .right-bar .space h4 { font-size: 14px;}  .right-bar .space h2 {font-size: 22px;margin:10px 0px;} .right-bar .space h2 span { font-size: 14px;} div.ad{padding:0px;} .ad img:nth-child(2){margin:0px 1px;}.dealer-panel .panel-heading span{float:none!important;}}
                               .img-holder1{height:305px;overflow:hidden;position:relative;width: 100%;}
                               .img-holder1 img{position:absolute;top:0;right:0;bottom:0;left:0;margin:auto;}
                               @media (min-width:320px) and (max-width:360px)
                               { .img-holder1{height:89px;}}
                               @media (min-width:361px) and (max-width:480px)
                               { .img-holder1{height:125px;}}
                               @media (min-width:481px) and (max-width:767px)
                               { .img-holder1{height:184px;}.dealer-panel1 ul.tabss, .dealer-panel1 ul.tabss li{float:none!important;}}
                               @media (min-width:768px) and (max-width:1023px)
                               { .img-holder1{height:173px;}}
                               @media (min-width:1024px) and (max-width:1279px)
                               { .img-holder1{height:175px;}}
                               @media (min-width:1280px) and (max-width:1365px)
                               { .img-holder1{height:222px;}}
                               @media (min-width:1366px)and (max-width:1919px)
                               { .img-holder1{height:239px;}}

    </style>	
    <script>
        $(document).ready(function () {
            $('.tabss li a').click(function (e) {

                $('.tabss li').removeClass('active');

                var $parent = $(this).parent();
                if (!$parent.hasClass('active')) {
                    $parent.addClass('active');
                }
                e.preventDefault();
            });
        });
    </script>
    <img src="/images/dealer/d/header.jpg" class="img-responsive" style="width:100%;"/>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-5">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-7">
                <ul class="nav navbar-nav rift-raff-nav"><br>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                        <ul class="dropdown-menu">
                            <?php if ($this->session->userdata['logged_in']['type'] == 'dealer') { ?>
                                <li><a href="/index.php/riftraff/dealer_profile">Profile</a></li>
                                <?php if ($this->session->userdata['logged_in']['complete_profile'] == 0) { ?>
                                    <li><a href="/index.php/riftraff/dealer_account">My Dashboard</a></li>
                                <?php } else { ?>
                                    <li><a href="/index.php/riftraff/edit_dealer_profile">My Dashboard</a></li>
                                <?php } ?>
                                <li><a href="/index.php/riftraff/dealer_services">Add services</a></li> 

                            <?php } else if ($this->session->userdata['logged_in']['type'] == 'seller') { ?>
                                <li><a href="/index.php/riftraff/seller_profile">Profile</a></li>
                                <?php if ($this->session->userdata['logged_in']['complete_profile'] == 0) { ?>
                                    <li><a href="/index.php/riftraff/seller_account">My Dashboard</a></li>
                                <?php } else { ?>
                                    <li><a href="/index.php/riftraff/edit_seller_profile">My Dashboard</a></li>
                                <?php } ?>



                                <?php
                            } else {
                                
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                        <ul class="dropdown-menu">
                            <li><a href="/index.php/riftraff/product_list">Product list </a></li>
                            <li><a href="/index.php/riftraff/add_product">Add Product </a></li>
                            <li><a href="/index.php/riftraff/import">Import </a></li>
                            <li><a href="/index.php/riftraff/earnDealer">Payment Process </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12"><br>
            <div class="col-md-3 col-sm-12 col-xs-12 pull-right ad">
                <div class="panel ">
                    <img src="/images/dealer/d/ad1.jpg" class="img-responsive center-block" />
                    <img src="/images/dealer/d/ad2.1.jpg" class="img-responsive center-block" />
                    <img src="/images/dealer/d/ad2.1.jpg" class="img-responsive center-block"/>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12 pull-left dealer-bg"><br>
                <?php foreach ($dealer_info as $d) { ?>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="panel dealer-panel">
                                <div class="panel-heading"><strong><?php echo $d->business_name; ?>    </strong>       <span class="pull-right "><?php echo $d->phone_num; ?><br><?php echo $d->email_address; ?></span></div>
                                <div class="panel-body panel-body1">
                                    <div class="img-holder1">
                                        <img src="<?php echo base_url() . $d->dealer_pic; ?>" class="img-responsive" width="100%" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="panel dealer-panel3">
                                <div class="panel-heading">Location</div>
                                <div class="panel-body" style="padding:1px;">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13724.412840880841!2d76.73941244999999!3d30.68737205!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1476907703113" width="94%" frameborder="0" style="border:0;border-radius:0px!important;display:block;margin:0px auto;" allowfullscreen></iframe>
                                    <div class="col-md-12 clo-sm-12 col-xs-12 padding">
                                        <?php foreach ($dealer_info as $d) { ?> 
                                            <div class="col-md-6 col-sm-6 col-xs-6 zero" style="border-right:1px solid #000;">
                                                <strong>Address</strong><br>
                                                <?php echo $d->street; ?> <?php echo $d->unit; ?>,
                                                <?php echo $d->city; ?>, <?php echo $d->state; ?> <br>
                                                <?php echo $d->zipcode; ?>

                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 zero">
                                                <strong>Hours</strong><br>
                                                <?php echo $d->fday; ?> - <?php echo $d->tday; ?>   <br>
                                                <?php echo $d->ftime; ?> - <?php echo $d->ttime; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel dealer-panel1" style="background:#fff;">
                        <div class="panel-heading">
                            <a href="javascript:void(0)" onclick="openCity('tab1')"><i>“The Largest Guitar Shop in the Valley”</i></a>
                            <ul class="list-inline pull-right tabss" style="margin-bottom:0px;">
                                <li class="active"><a href="javascript:void(0)" onclick="openCity('tab1')">Inventory</a></li>
                                <li><a href="javascript:void(0)" onclick="openCity('tab2')">About</a></li>
                                <li><a href="javascript:void(0)" onclick="openCity('tab3')">Policy</a></li>
                            </ul>
                        </div>
                    <?php } ?> 
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php foreach ($dealer_info as $d) { ?>
                                    <div class="col-md-3 col-sm-12 col-xs-12 left-bar" style="padding:0px;margin:0px 5px;overflow-Y:auto;">
                                        <div class="bg-h3" style="margin:0px;"><h3 class="visit text-center" style="margin-top:15px;">VISIT OUR STORE</h3></div>

                                        <div class="left-text" style="padding:0px 15px;">
                                            <br>
                                            <h4><strong>Services:</strong></h4>
                                            <p>Buy Instrurments<br>
                                                Sell Instruments<br>
                                                <?php foreach ($dealer_services as $dd) { ?>
                                                    <?php echo $dd->type; ?><br>
                                                <?php } ?>

                                            </p>
                                            <h4><strong>Languages Spoken:</strong></h4>
                                            <p><?php $ff = explode(",",$d->languages_spoken) ;
                                                    foreach($ff as $g)
                                                    {?>
                                             <?php echo $g; ?> <br>
                                                
                                                   <?php }
                                                    ?>
                                                </p>
                                        <?php } ?>
                                        <h4><strong>Inventory:</strong></h4>
                                        <ul>
                                            <?php foreach ($cattt as $d) { 
                                                 
                                                ?>
                                                
                                                <li><a href=""><?php echo $d['name']; ?></a></li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-offset-3 col-md-9 col-sm-12 col-xs-12 right-bar" >
                                    <div class="row">
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12 right-bar">
                                            <h3 style="color:#f80a0a;margin-top:10px;" class="text-uppercase">Hot Sale Items!</h3>
                                            <?php foreach ($all as $n) {  if($n['original_price'] != 0) { ?>
                                            <div class="col-md-4 col-sm-4 col-xs-12 padding">
                                                <div class="col-md-5 col-sm-5 col-xs-12" style="border:1px solid #d8dadb;padding:10px;"><img src="<?php if (!empty($n['img'])) {
                                                    echo base_url() . $n['img'][0];
                                                } else {
                                                    echo "/images/no-image-icon-6.png";
                                                } ?>" class="img-responsive" width="100%"></div>
                                                <div class="col-md-7 col-sm-7 col-xs-12 space ">
                                                    <h2 style="color:#ff0000;"><?php echo "$".$n['sale_price']; ?> <span><?php echo  "$".$n['original_price'];?></span></h2>
                                                    <h4> <strong><?php echo $n['name'];?> </strong></h4>
                                                    <p> <?php echo $n['desc'];?> </p>
                                                </div>
                                            </div>
                                            <?php }} ?>
<!--                                            <div class="col-md-4 col-sm-4 col-xs-12 padding ">
                                                <div class="col-md-5 col-sm-5 col-xs-12" style="border:1px solid #d8dadb;padding:10px;"><img src="/images/dealer/d1.jpg" class="img-responsive" width="100%"></div>
                                                <div class="col-md-7 col-sm-7 col-xs-12 space">
                                                    <h2 style="color:#ff0000;">$850 <span>$1200</span></h2>
                                                    <h4> <strong>Fender Telecaster</strong></h4>
                                                    <p> Red, beautiful cherry wood, polished, like new. 6 strings, pickups inlaid pearl frets. </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 padding">
                                                <div class="col-md-5 col-sm-5 col-xs-12" style="border:1px solid #d8dadb;padding:10px;"><img src="/images/dealer/d1.jpg" class="img-responsive" width="100%"></div>
                                                <div class="col-md-7 col-sm-7 col-xs-12 space">
                                                    <h2 style="color:#ff0000;">$850 <span>$1500</span></h2>

                                                    <h4><strong> Fender Telecaster </strong></h4>
                                                    <p> Red, beautiful cherry wood, polished, like new. 6 strings, pickups inlaid pearl frets. </p>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="city" id="tab1">
                                        <h3>INVENTORY</h3>
                                        <div class="row">
                                            <div class="cl-md-12 col-sm-12 col-xs-12">
                                                <?php $i = 0; if ($all == 0) {
                                                    ?>
                                                    <div class="row">
                                                        <h3>No results found !!!</h3>
                                                    </div>
                                                    <?php
                                                } else {
                                                    $nn = count($all);
                                $k = 0;
                                                    foreach ($all as $n) {
                                                        ?>
                                                        <div class="col-md-2 col-sm-4 col-xs-6 dealer-border padding">
                                                            <div style="" class="dealer-div">
                                                                <a href="/index.php/riftraff/product_view/<?php echo $n['id'] ?>"><img src="<?php if (!empty($n['img'])) {
                                                    echo base_url() . $n['img'][0];
                                                } else {
                                                    echo "/images/no-image-icon-6.png";
                                                } ?>" class="img-responsive center-block"/></a>
                                                                <div class="card-block">
                                                                    <p ><b> <?php echo $n['name']; ?></b></p>
                                                                    <input id="input-21e" value="5" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >
                                                                    <div class="text-danger rate text-right" ><sup>$</sup><?php echo $n['price']; ?><sup>99</sup></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                  <?php
                                    $i++;
                                    $nn--;
                                    if (($i > 5) && ($nn > 0)) {
                                        $i = 0;
                                        ?>
                                    </div>
                                            </div>
                                    <div class = "row">
                                        <div class="cl-md-12 col-sm-12 col-xs-12">


                                        <?php
                                    } else {
                                        
                                    }
                                                         }
                                                    ?>

<?php }
?>

                                            </div>
                                        </div>
                                        <?php if ($all != 0) {
                                                    ?>
                                        <span class="pull-left see-more"><a href="">(see more)</a></span>
                                        <span class="pull-right view"><a href="">Preview <a>|<a href=""> Next</a> <span style="height:15px;width:15px;border-radius:50%;background:#206fbf;">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                                        <?php } ?>
                                                    </div>
                                                    <div class="city" id="tab2">
                                                        <h3>About</h3>
                                                        <div class="row">
<?php foreach ($dealer_info as $n) { ?>
                                                                <p class="" style="padding:0px 10px;"><?php echo $n->description; ?></p>
<?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="city" id="tab3">
                                                        <h3>Policy</h3>
                                                        <div class="row">
                                                            <p class="" style="padding:0px 10px;">Policy text</p>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>


                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
<?php include("footer.php"); ?>
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                                                    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>


                                                    <script>
                                openCity("tab1")
                                function openCity(cityName) {
                                    var i;
                                    var x = document.getElementsByClassName("city");
                                    for (i = 0; i < x.length; i++) {
                                        x[i].style.display = "none";
                                    }
                                    document.getElementById(cityName).style.display = "block";
                                }
                                                    </script>