<?php include('header2.php'); ?>

<style>.qty-wrapper .qty {
        height: 38px;
        width: 46px !important;
        line-height: 38px;
        text-align: center;
        font-size: 18px;
        line-height: 30px;
        font-weight: 500;
        display: block;
        border: none;
        border-right: 1px solid #000;
    }.qty-wrapper .qty-btn {
        cursor: pointer;
        text-align: center;
        position: absolute;
        right: 0;
        width: 27px;
        height: 19px;
        padding: 0;
        color: #000;
        background-color: #FFF;
    }.qty-wrapper .qty-btn {
        cursor: pointer;
        text-align: center;
        position: absolute;
        right: 0;
        width: 27px;
        height: 19px;
        padding: 0;
        color: #000;
        background-color: #FFF;
    }.add-to-cart label {
        float: left;
        margin-right: 5px;
        font-weight: bold;
        color: #666;
        display: none;
    }.qty-wrapper {
        position: relative;
        width: 46px;
        border: 1px solid #000;
    }.product-view .product-shop .qty-wrapper {
        float: left;
    }.qty-wrapper .qty-up-btn {
        top: 0;
        border-bottom: 1px solid #000;
    }.qty-wrapper .qty-down-btn {
        bottom: 0;
    }
    .myy{display:none;}</style>
<style>
    .loader {
        border: 3px solid #fff;
        border-radius: 50%;
        border-top: 3px solid #555;
        width: 40px;
        height: 40px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<div class="ny myy" style="z-index:99;position:fixed;height:100%;width:100%;background:rgba(0,0,0,0.1);top:0;right:0;bottom:0;left:0;">
    <div style="position:absolute;top:20em;right:0;bottom:0;left:50%;z-index:999;display:block;">
        <div class="loader"></div>
    </div>
</div>
<div class="container cart-area" >

    <div class="col-md-5 col-sm-5 col-xs-12">
            <!-- <img src="images/7.jpg" class="img-responsive"/> -->
        <section class="con-width main">
            <div class="column">
                <?php
                //print_r($images); foreach($images as $i){
                //}
                ?>
                <input type="hidden" name="product_img" id = "product_img" value="<?php
                if (!empty($images[0])) {
                    echo base_url() . $images[0]->image_path;
                } else {
                    echo '/images/no-image-icon-6.png';
                }
                ?>">
                <div class="item1 my">
                    <figure class="zoo-item" zoo-scale="3" zoo-image="<?php
                    if (!empty($images[0])) {
                        echo base_url() . $images[0]->image_path;
                    } else {
                        echo '/images/no-image-icon-6.png';
                    }
                    ?>">Loading...</figure>
                </div>
            </div>		
        </section>
        <div class="row">
<?php if (!empty($images)) {
    ?>
                <?php foreach ($images as $i) { ?>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <img  src="<?php echo base_url() . $i->image_path; ?>" class="img-responsive show" style="border:1px solid #000;padding:10px"/>
                    </div>
    <?php
    }
} else {
    ?>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <img  src="/images/no-image-icon-6.png" class="img-responsive show" style="border:1px solid #000;padding:10px"/>
                </div>
<?php } ?>

        </div>
<?php if (isset($this->session->userdata['logged_in'])) { ?>
            <a href="javascript:void(0)"><button class="btn btn-fefault cart cart_page" type="button" onclick="">
                    <i class="fa fa-shopping-cart"></i> &nbsp;&nbsp;Add To Cart</button>
            </a>
            <a href="#"><button class="btn btn-fefault cart" type="button">
                    <i class="fa fa-shopping-cart"></i> &nbsp;&nbsp;Buy Now</button>
            </a>
<?php } else { ?>
            <a href="#"><button class="btn btn-fefault cart" type="button" onclick="openNav()">
                    <i class="fa fa-shopping-cart"></i> &nbsp;&nbsp;Add To Cart</button>
            </a>
            <a href="#"><button class="btn btn-fefault cart" type="button" onclick="openNav()">
                    <i class="fa fa-shopping-cart"></i> &nbsp;&nbsp;Buy Now</button>
            </a>
            <?php } ?>
    </div>
    <div class="col-md-7 col-sm-7 col-xs-12 product-info">
        <input type="hidden" name = "pname" id = "pname" value="<?php echo $main[0]->product_name; ?>">
        <h3><?php echo $main[0]->product_name; ?></h3>
        <span>
            <?php
            foreach ($content as $c) {

                if ($c->attribute_id == 'cost_price') {
//                    echo "<pre>";
//                    print_r($c);
//                    echo "ho";
                    ?>
                    <span> <?php echo '$ ' . $c->attribute_value; ?></span>
                    <input type="hidden" name = "unit_price" id = "unit_price" value="<?php echo $c->attribute_value; ?>">
        <?php
    }
}
?>
<!--<span> Rs.749</span>-->
<!--<label><strike> Rs.2097</strike></label>-->
        </span>
        <br><br>
        <div class="pro-text">
            <?php
            //print_r($content);
            foreach ($content as $c) {
                if ($c->attribute_id == 'product_desc') {
                    ?>
                    <p> <?php echo $c->attribute_value; ?></p>
                    <?php
                }
            }
            foreach ($shipping as $dd) {
                if ($dd->shipping_method != '') {
                    ?>
                    <input type="hidden" name="shipping_method" id="shipping_method" value="<?php echo $dd->shipping_method; ?>">
        <!--<h4>Pickup Method: </h4><span> <?php //if($dd->shipping_method == 'local_pickup') { echo "Local Pickup" ; } else {  echo "By shipping"; }    ?></span>-->
    <?php }
}
?>
<!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>-->
        </div>
        <div class="add-to-cart">
            <div class="qty-wrapper">
                <label for="qty">Qty:</label>

                <input type="hidden" name="pid" id="pid" value="<?php echo $this->uri->segment(3); ?>">
                <input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                <!--            <div id="qty_up_btn" class="qty-btn qty-up-btn">+</div>
                            <div id="qty_down_btn" class="qty-btn qty-down-btn">-</div>-->
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 tab-slider">
        <ul class="nav nav-tabs">
            <!--<li role="presentation" class="active"><a  data-toggle="tab" href="#Description">Description</a></li>-->
            <li role="presentation" class="active"><a  data-toggle="tab" href="#Info">Additional Info</a></li>
            <!--<li role="presentation"><a  data-toggle="tab" href="#Reviews">Reviews</a></li>-->
            <!--<li role="presentation"><a  data-toggle="tab" href="#Tags">Tags</a></li>-->  
            <!--<li role="presentation"><a  data-toggle="tab" href="#Tab">Custom Tab</a></li>-->
        </ul>
        <div class="tab-content">
            <div id="Description" class="tab-pane fade">
                <h3>HOME</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div id="Info" class="tab-pane fade in active">
                <h3>INFO</h3>
                <table class="table table-bordered">
<?php
foreach ($content as $attribute) {
    if (($attribute->attribute_type == 'text') and ( $attribute->attribute_code != 'product_desc') and ( $attribute->attribute_code != 'cost_price')) {
        ?>
                            <tr>
                                <th><?php echo $attribute->attribute_label; ?></th>
                                <td><?php echo $attribute->attribute_value; ?></td>
                            </tr>
        <?php
    }
}
?>


                </table>
            </div>
            <div id="Reviews" class="tab-pane fade">
                <h3>Write Your Own Review</h3>
                <form>
                    <div class="form-group required">
                        <label for="Name" class="label1">Your Name:</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group required">
                        <label for="Summary" class="label1">Review Summary:</label>
                        <input type="text" class="form-control" id="Summary	">
                    </div>
                    <div class="form-group required">
                        <label for="comment" class="label1">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div id="Tags" class="tab-pane fade">
                <h3>Tags</h3>
                <form>
                    <label for="Name" class="label1">Your Name:</label>
                    <div class="form-group form-inline required">
                        <input type="text" class="form-control" id="name">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>
            <div id="Tab" class="tab-pane fade">
                <h3></h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
    </div>
</div>

<!--- popup code ----->

<div id="shipPopup" class="overlay" style="background-color:rgba(0,0,0,0.6);">
    <div class="overlay-content">
        <div class="container">    
            <div id="shipTypeBox" style="margin-top:-50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
               <a href="javascript:void(0)" class="closebtn" onclick="closeShip()" style="font-size:30px;top:-12px;right:12px;">&times;</a>
    
                <div class="panel-info" style="background-color:#fff;" >
                     
                    <!--                    <div class="panel-heading">
                                            <div class="panel-title">Please Choose Pickup Method</div>
                                           
                                        </div>     -->
                    <div style="padding:30px 0px 40px 0px;" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <p>Your Product has successfully added</p><br>
                        <button type="button" class="btn btn-primary shop" style="background-color: #000;border: none;border-radius: 0px;font-size: 13px;outline: 3px solid #a7a7a7;">Continue Shopping</button>
                        <button type="button" class="btn btn-primary active cartt" style="margin-left:10px;background-color: #000;border: none;border-radius: 0px;font-size: 13px;outline: 3px solid #a7a7a7;">Go to Cart</button>
                    </div>                     
                </div>  
            </div>

        </div>
    </div>
</div>

<!-- end ------------->
<?php include('footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        // $(".container").addClass('loader');
        $(".qty_up_btn").click(function () {
            //alert('hi');
            var dd = $("#qty").val();
            dd = dd++;
            $("#qty").val(dd);
        });
        $(".shop").click(function (){
            window.location.href = "/index.php/riftraff/buy";
        });
         $(".cartt").click(function (){
            window.location.href = "/index.php/riftraff/add_to_cart";
        });
        $(".qty_down_btn").click(function () {
            var dd = $("#qty").val();
            dd = dd--;
            $("#qty").val(dd);
        });
        $(".show").click(function () {
            var red = $(this).attr('src');
            $(".zoo-item").attr('zoo-image', red);
            $('.zoo-img').css('background-image', 'url("' + red + '")');
        });

        $(".cart_page").click(function () {
            // alert('dfdf');
            $(".ny").removeClass('myy');
            var qty = $('#qty').val();
            var pid = $('#pid').val();
            var product_name = $('#pname').val();
            var product_img = $('#product_img').val();
            var shipping_method = $("#shipping_method").val();
            var unit_price = $("#unit_price").val();
            var param = "qty=" + qty + "&pid=" + pid;
            var params = "qty=" + qty + "&pid=" + pid + "&product_name=" + product_name + "&product_img=" + product_img + "&unit_price=" + unit_price + "&shipping_method=" + shipping_method;
           // alert(params);

            $.ajax({
                type: 'POST',
                url: "/index.php/riftraff/fetch_quantity",
                dataType: 'html',
                data: params,
                success: function (response) {
                    $(".ny").addClass('myy');
                    console.log(response);
                    //alert(response);
                    if (response == 0)
                    {
                        alert("The requested quantity for this product is not available");
                    } else if (response == 'sucess')
                    {
                        document.getElementById("shipPopup").style.height = "100%";

                    } else
                    {
                        alert("There is some error please wait!!!");
                    }

                    //var result =  JSON.parse(response);
                    // console.log(result['all']['4']);

                    // console.log(result);
                    // console.log(result['all']['4'].length);
//                    if (response != 0)
//                    {
//                        $(".myshow").empty();
//                        $(".myshow").html(response);
//                    } else
//                    {
//                        $(".myshow").empty();
//                        $(".myshow").html("<h4>No results found!!</h4>");
//
//                    }
                }

            });
        });
    });

</script>