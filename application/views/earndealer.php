<?php include('header2.php'); ?>
<style>
    .rift-raff-nav .open > a, .rift-raff-nav .open > a:focus, .rift-raff-nav .open > a:hover {background-color: #3e9cc5;border-color: #337ab7;border-radius: 18px;color: #fff;} 
    .rift-raff-nav > li > a{background:none;font-size:16px;font-weight:600;color:#000;}
    .rift-raff-nav > li > a{padding:10px 30px!important;}
    .rift-raff-nav li:focus, .rift-raff-nav li:hover{background-color: #3e9cc5; border-color: #337ab7; border-radius: 18px;color: #fff;}
    .nav>li>a:hover{background:transparent;color:#fff;}
  

    </style>	
   
    
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
        <?php //echo "<pre>";
        //print_r($con);?>
               <table class="col-md-12 col-sm-12 col-xs-12 table-bordered table-striped table-condensed cf text-center">
            <thead class="cf">
                <tr>
                    <th colspan="2">Item</th>
                    <th>Qty </th>
                    <th>Unit Price</th>

<!--                    <th>Pickup method</th>-->
                    <th>Shipping Details</th>
                    <th>Subtotal</th>
					<th>Status</th>

                   
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($con as $c) {
                    ?>
                    <tr>
                        <td><?php echo $c->product_name; ?></td>
                        <td><img src="<?php echo $c->product_img; ?>" style="height:80px;width:80px;"/></td>
                        <td><?php echo $c->quantity; ?> </td>
                        <td><?php echo "$" . $c->unit_price; ?></td>
                        <!--<td ><?php // if ($c->shipping_method == 'local_pickup') { echo "Local pickup";} else { echo "Shipping" ;}   ?></td>-->
                        <td ><?php echo "$" . $c->shipping_charges; ?></td>

                        <td ><?php echo "$" . $dd = ($c->sub_total); ?></td>
                        <td ><?php if($c->status == 0) { echo "Payment Done" ;} else { echo "Payment Pending";}  ?></td>

                    </tr>
                    <?php
                    $total += $dd;
                }
                ?>
<!--
                <tr>
                    <td colspan="7"><p class="text-right" style='padding-right: 10em;'><strong>Grand Total: </strong> <?php echo "$" . $total; ?><p></td>
                </tr>
-->
            </tbody>
        </table>
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
